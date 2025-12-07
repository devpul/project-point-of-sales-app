<?php

namespace App\Http\Controllers\Transaksi;

use App\Models\Customers;
use App\Models\Outlets;
use App\Models\ProductStock;
use App\Models\SaleItems;
use App\Models\Sales;
use App\Models\Products;
use App\Models\Shifts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class TransaksiController extends Controller
{
    public function validateTransaction(Request $request, $action = null)
    {
        try {

            $rules_store = [
                // products
                'product_id'        =>  'required|exists:products,id',

                // 'invoice_code'      =>  'required|string',
                'customer_id'       =>  'required|exists:customers,id',
                'outlet_id'         =>  'required|exists:outlets,id',
                // 'shift_id'          =>  'required|exists:shifts,id',
                // 'discount'          =>  'nullable|numeric|min:0',
                'method'            =>  'required|in:cash,qris',
                'paid_amount'       =>  'required|numeric|min:0',
                'status'            =>  'required|in:pending,paid,cancel,refund',
                'receipt_method'    =>  'required|in:print,email',
                'description'       =>  'nullable|string',

                'qty'               =>  'required|string',
            ];

            $rules_update = [];

            $rules = [
                'rules_store'   =>  $rules_store,
                'rules_update'   =>  $rules_update,
            ];

            if (isset($rules[$action])) return $request->validate($rules[$action]);

            return back()->with('error', 'Terjadi Kesalahan Pada Server.');

        } catch (ValidationException $e) {
            return back()->withErrors($e->validator);
        }
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $userId = Auth::user()->id;

        $validated = $this->validateTransaction($request, 'rules_store');
        if (! is_array($validated)) return $validated;
    
        // SHIFT WOII !!
        Shifts::find($userId);


        $product = Products::find($validated['product_id']);

        $totalSementara = $product->price * $validated['qty'];

        // cek kalo ada promo / diskon
        if ($product->has_promo === 'yes') {

            if ($product->promo_type === 'percentage') {

                $grandTotal = $product->price - ($totalSementara * $product->promo_amount);

            }

            if ($product->promo_type === 'fixed_amount') {

                $grandTotal = $totalSementara - $product->promo_amount;
                
            }

            $discount = $product->amount;
        } else {
            $grandTotal = $totalSementara;
        }


        // cek kalo duit kurang
        if ($validated['paid_amount'] < $grandTotal) {
            return back()->with('error', 'Maaf duit kamu kurang.');
        } 

        // kalo duit lebih, berarti kembalian
        if ($validated['paid_amount'] > $grandTotal) {
            $cash_change = $validated['paid_amount'] - $grandTotal;
        }

        $sale = Sales::create([
            'user_id'           =>  Auth::user()->id,
            'customer_id'       =>  $validated['customer_id'],
            'outlet_id'         =>  $validated['outlet_id'],
            // 'shift_id'          =>  $validated['shift_id'],
            'discount'          =>  $discount ?? null,
            'method'            =>  $validated['method'],
            'paid_amount'       =>  $validated['paid_amount'],
            'total_amount'      =>  $grandTotal,
            'cash_change'       =>  $cash_change,
            'status'            =>  $validated['status'],
            'receipt_method'    =>  $validated['receipt_method'],
            'description'       =>  $validated['description'],
        ]);

        $sale->update([
            'invoice_code'      =>  'INV-' . date('Y'). '-' . str_pad($sale->id, 4, '0', STR_PAD_LEFT)
        ]);

        $item = SaleItems::create([
            'sale_id'       =>  $sale->id,
            'product_id'    =>  $validated['product_id'],
            'qty'           =>  $validated['qty'],
            'price'         =>  $product->price,
            'total'         =>  $grandTotal
        ]);

        // kurang stok produk otomatis
        ProductStock::where('product_id', $validated['product_id'])
                ->decrement('qty', $validated['qty']);
        
        return redirect()->route('penjualan.index')->with('success', 'Transaksi baru berhasil dibuat.');
    }

    public function index()
    {
        $sales = Sales::with('sale_item')->orderBy('created_at')->get();

        return view('Transaksi.index', compact('sales'));
    }

    public function create()
    {
        $products = Products::distinct()->orderBy('name')->get();

        $customers = Customers::get();

        $outlets = Outlets::get();
        // if ($products->isEmpty()) return back()->with('error', 'Produk tidak ditemukan.');
        
        return view('Transaksi.create', compact('products', 'customers', 'outlets'));
    }
}
