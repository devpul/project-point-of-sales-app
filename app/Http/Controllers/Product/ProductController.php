<?php

namespace App\Http\Controllers\Product;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use function PHPUnit\Framework\returnArgument;

class ProductController extends Controller
{
    private function validateProducts(Request $request, $action = null)
    {
        try {

            $rules_store = [
                'name'                =>  'required|array',
                'image'               =>  'required|array',

                'name.*'              =>  'required|string|min:3|regex:/^[A-Za-z ]+$/',
                'image.*'             =>  'required|image|mimes:jpg,png,jpeg,webp|max:2048'
            ];

            $rules_update = [
                'name'                =>  'required|array',
                'image'               =>  'required|array',

                'name.*'              =>  'required|string|min:3|regex:/^[A-Za-z ]+$/',
                'image.*'             =>  'required|image|mimes:jpg,png,jpeg,webp|max:2048'
            ];        

            $rules = [
                'rules_store'   =>  $rules_store,
                'rules_update'   =>  $rules_update,
            ];

            if (isset($rules[$action])) {
                return $request->validate($rules[$action]);
            }

            return back()->with('error', 'Terjadi kesalahan pada server.');
            
        } catch (ValidationException $e) {
            
            return back()->withErrors($e->validator);
        }
    }

    public function store(Request $request)
    {
        $role_manager = Auth::user()->role === 'manager';
        if ($role_manager) return back()->with('error', 'Akses ditolak.');

        $validated = $this->validateProducts($request, 'rules_store');
        if (! is_array($validated)) return $validated;

        foreach ($validated['name'] as $index => $product_name) {
            $image = $validated['image'][$index];
            $path = $image->store('products', 'public');
            $imageName = basename($path);

            Products::create([
                'name'  =>  $product_name,
                'image' => $imageName
            ]);
        }

        return redirect()->route('product.index')->with('success', 'Produk baru berhasil dibuat.');
    }

    public function update()
    {
        // write your code here ...
    }

    public function destroy()
    {
        // write your code here ...
    }

    public function index()
    {
        $products = Products::all();
        return view('Products.index', compact('products'));
    }

    public function create()
    {
        return view('Products.create');
    }

    public function edit()
    {
        return view('Products.edit');
    }
}
