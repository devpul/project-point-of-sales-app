<?php

namespace App\Http\Controllers\Transaksi;

use App\Models\Customers;
use App\Models\Outlets;
use App\Models\Points;
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

                'items'                     =>  'required|array',
                'items.*.qty'               =>  'required|integer',
                'items.*.product_id'        =>  'required|exists:products,id'
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
        
        // biar bisa pakai fungsi pluck maka kita harus buat array itu jadi collection
        $collectItems = collect($validated['items']);

        // kita kumpulin product_id
        $productIds = $collectItems->pluck('product_id');

        // kita buat product_id itu menjadi key utk memanggil tiap" data
        $products = Products::whereIn('id', $productIds)->get()->keyBy('id');

        // inisialisasi vars utk dipake global fungsi ini
        $grandTotal = 0;
        $discountTotal = 0;
        $saleItemsData = [];

        // kita akses item item itu
        foreach ($collectItems as $item) {

            // ambil satu satu berdasarkan product_id
            $product = $products[$item['product_id']];

            // ambil satu satu utk qty nya
            $qty = $item['qty'];

            $subtotal = $product->price * $qty;

            $discount = 0;

            // kita buat kondisi klo produk ada promonya
            if ($product->has_promo === 'yes') {

                // kita buat kondisi tipe promonya
                if ($product->promo_type === 'percentage') { // tipe 1 = percentage
                    $discount = $subtotal * ($product->promo_amount / 100);
                }
                    
                if ($product->promo_type === 'fixed_amount') { // tipe 2 = fixed_amount
                    $discount = $product->promo_amount;
                }

            }

            $priceAfterDiscount = $subtotal - $discount;

            // kita replace utk global
            $grandTotal += $priceAfterDiscount;
            $discountTotal += $discount;

            // kita buat sale items data
            $saleItemsData[] = [
                'product_id'    =>  $product->id,
                'qty'           =>  $qty,
                'price'         =>  $product->price,
                'total'         =>  $priceAfterDiscount,
            ];
        }

        if ($validated['paid_amount'] < $grandTotal) return back()->with('error', 'Duit lu kaga cukup anjay 😹.');

        $cash_change = $validated['paid_amount'] > $grandTotal 
                        ? $validated['paid_amount'] - $grandTotal
                        : 0;

        // sale
        $no = 1;
        $sale = Sales::create([
            'invoice_code'  =>  'INV-' . date('Y') . '-' . str_pad($no++, 4, '0', STR_PAD_LEFT),
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

        //  sale items
        foreach ($saleItemsData as $item) {
            SaleItems::create([
                'sale_id'       =>  $sale->id,
                'product_id'    =>  $item['product_id'],
                'qty'           =>  $item['qty'],
                'price'         =>  $item['price'],
                'total'         =>  $item['total']
            ]);

            // kurangi stok produknya scr otomatis
            ProductStock::where('product_id', $item['product_id'])
                        ->decrement('qty', $item['qty']);
        }

        // cari customer yg member
        $customer = Customers::find($validated['customer_id'])
                                ->first();

        $status = '';

        if ($customer->status === 'member') {
            Points::create([
                'customer_id'   =>  $validated['customer_id'],
                'sale_id'       =>  $sale->id,
                'point'         =>  100, // misal 100 setiap beli produk / transaksi penjualan
                'type'          =>  'earn',
                'description'   =>  'Mendapatkan 100 point dari pembelian produk'
            ]);
        }
        
        return redirect()->route('penjualan.index')->with('success', 'Transaksi baru berhasil dibuat.');
    }

    public function index()
    {
        $sales = Sales::with( 'sale_item.product')->orderBy('created_at')->get();

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
