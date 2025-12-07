<?php

namespace App\Http\Controllers\Transaksi;

use App\Models\Sales;
use App\Models\Products;
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
                'invoice_code'      =>  'required|string',
                'customer_id'       =>  'required|exists:customers,id',
                'outlet_id'         =>  'required|exists:outlets,id',
                'shift_id'          =>  'required|exists:shifts,id',
                'discount'          =>  'nullable|numeric|min:0',
                'method'            =>  'required|in:cash,qris',
                'paid_amount'       =>  'required|numeric|min:0',
                'cash_change'       =>  'required|numeric|min:0',
                'status'            =>  'required|in:pending,paid,cancel,refund',
                'receipt_method'    =>  'required|in:print,email',
                'description'       =>  'nullable|string',
            ];

            $rules_update = [];

            $rules = [
                'rules_store'   =>  $rules_store,
                'rules_update'   =>  $rules_update,
            ];

            if (isset($rules[$action])) {
                return $request->validate($rules[$action]);
            }

            return back()->with('error', 'Terjadi Kesalahan Pada Server.');

        } catch (ValidationException $e) {
            return back()->withErrors($e->validator);
        }
    }

    public function store(Request $request)
    {
        $validated = $this->validateTransaction($request, 'rules_store');
        if (! is_array($validated)) return $validated;
        

        // $total_amount =

        $sale = Sales::create([
            'user_id'           =>  Auth::user()->id,
            'invoice_code'      =>  str_pad('INV ', 4, '0000', STR_PAD_LEFT),
            'customer_id'       =>  $validated['invoice_code'],
            'outlet_id'         =>  $validated['invoice_code'],
            'shift_id'          =>  $validated['invoice_code'],
            'discount'          =>  $validated['invoice_code'],
            'method'            =>  $validated['invoice_code'],
            'paid_amount'       =>  $validated['invoice_code'],
            'cash_change'       =>  $validated['invoice_code'],
            'status'            =>  $validated['invoice_code'],
            'receipt_method'    =>  $validated['invoice_code'],
            'description'       =>  $validated['invoice_code'],
        ]);
    }

    public function index()
    {
        $products = Products::distinct()->orderBy('name')->get();
        if ($products->isEmpty()) return back()->with('error', 'Produk tidak ditemukan.');
        
        return view('Transaksi.index', compact('products'));
    }

    public function create()
    {
        
    }
}
