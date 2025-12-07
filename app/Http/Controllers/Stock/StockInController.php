<?php

namespace App\Http\Controllers\Stock;

use App\Models\Stock;
use App\Models\Suppliers;
use App\Models\StockOpname;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class StockInController extends Controller
{
    private function validateStockIn(Request $request, $action = null)
    {
        try {

            $rules_store = [
                // stock_opnames
                'stock_id'      =>  'required|exists:stocks,id',
                // 'opname_date'   =>  'required',
                'supplier_id'   =>  'required|exists:suppliers,id',
                'quantity'      =>  'required|integer|min:0',
                'notes'         =>  'sometimes|string',
            ];

            $rules_update = [
                // stock_opnames
                'stock_id'      =>  'sometimes|exists:stocks,id',
                // 'opname_date'   =>  'sometimes',
                'supplier_id'   =>  'sometimes|exists:suppliers,id',
                'quantity'      =>  'sometimes|integer|min:0',
                'notes'         =>  'sometimes|string',
            ];

            $rules = [
                'rules_store'   =>  $rules_store,
                'rules_update'   =>  $rules_update,
            ];

            if (isset($rules[$action])) return $request->validate($rules[$action]);

        } catch (ValidationException $e) {
            return back()->withErrors($e->validator);
        }
    }

    public function store(Request $request)
    {
        $validated = $this->validateStockIn($request, 'rules_store');
        if (! is_array($validated)) return $validated;

        // stock_opnames
        $stock_opname =
        StockOpname::create([
            'stock_id'      =>  $validated['stock_id'],
            'opname_date'   =>  now(),
            'supplier_id'   =>  $validated['supplier_id'],
            'user_id'       =>  Auth::user()->id,
            'quantity'      =>  $validated['quantity'],
            'notes'         =>  $validated['notes'],
            'mode'          =>  'in'
        ]);

        
        Stock::where('id', $validated['stock_id'])
            ->increment('current_stock', $validated['quantity']);

        $stock = Stock::find($validated['stock_id']);
        
        return redirect()->route('stockIn.index')->with('success', 'Stok '. $stock->name .' berhasil ditambahkan.');
    }

    public function index()
    {
        return view('StockIn.index');
    }

    public function create()
    {
        $suppliers = Suppliers::get();

        $stocks = Stock::get(); // bahan baku

        // opname

        return view('StockIn.create', compact('suppliers', 'stocks'));
    }
}
