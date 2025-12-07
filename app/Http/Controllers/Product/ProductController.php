<?php

namespace App\Http\Controllers\Product;

use App\Models\ProductImages;
use App\Models\Products;
use App\Models\ProductStock;
use App\Models\Stock;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use function PHPUnit\Framework\returnArgument;
use Illuminate\Validation\ValidationException;

class ProductController extends Controller
{
    private function validateProducts(Request $request, $action = null)
    {
        try {

            $rules_store = [
                // tbl products
                'name'                =>  'required|array',
                'name.*'              =>  'required|string|min:3|regex:/^[A-Za-z ]+$/',
                'image'               =>  'required|array',
                'image.*'             =>  'required|image|mimes:jpg,png,jpeg,webp|max:2048',

                // tbl product_images & tbl product_stocks
                // 'product_id'          =>  'sometimes',

                // tbl product_images
                'filename'            =>  'sometimes|array',
                'filename.*'          =>  'sometimes|image|mimes:jpg,png,jpeg,web|max:1048',
                
                // tbl product_stocks
                // 'stock_id'            =>  'required|exists:stocks,id',
                // 'qty'                 =>  'required|integer|min:1',
                
                // tbl stocks
                // 'unit'                =>  'required|integer|min:1',
                // warehouse_id
                //current_stock
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
        // dd($request->all());

        $role_manager = Auth::user()->role === 'manager';
        if ($role_manager) return back()->with('error', 'Akses ditolak.');

        $validated = $this->validateProducts($request, 'rules_store');
        if (! is_array($validated)) return $validated;

        foreach ($validated['name'] as $index => $product_name) {
            // tbl products
            $image = $validated['image'][$index];
            $pathMainImage = $image->store('products', 'public');

            $product = Products::create([
                'name'  =>  $product_name,
                'image' => $pathMainImage
            ]);
            
            // tbl product_images
            if ($request->file('filename')) {

                foreach ($request->file('filename') as $additionalImage) {
                    $pathAdditionalImages = $additionalImage->store('products','public');

                    ProductImages::create([
                        'product_id'    => $product->id,
                        'filename'      => $pathAdditionalImages
                    ]);
                }
                
            }
        }

        // tbl product_stocks
        // ProductStock::create([
        //     'product_id'    =>  $product->id,
        //     // stock_id
        //     'qty'           =>  $validated['qty']
        // ]);

        // tbl stocks
        // Stock::create([
        //     'name'          =>  $validated['name'],
        //     'unit'          =>  'pcs',
        //     // 'warehouse_id
        //     'current_stock' =>  $validated['qty']
        // ]);

        return redirect()->route('product.index')->with('success', 'Produk baru berhasil dibuat.');
    }

    public function update()
    {
        // write your code here ...
    }

    public function destroy($id)
    {
        $product = Products::find($id);
        if (!$product) return back()->with('error', 'Produk tidak ditemukan.');
        
        if ($product->image && Storage::disk('public')->exists('products/' . $product->image)) {
            Storage::disk('public')->delete('products/'. $product->image);
        }

        $product_image = ProductImages::where('product_id', $id)->first();
        if ($product_image && Storage::disk('public')->exists('products/' . $product_image->filename)) {
            Storage::disk('public')->delete('products/' . $product_image->filename);        
            $product_image->delete();
        }

        $product->delete();
        
        return redirect()->route('product.index')->with('success', 'Produk berhasil dihapus.');
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

    public function detail($id)
    {
        $product = Products::with('product_image')->find($id);
        if (!$product) return back()->with('error', 'Produk tidak ditemukan.');

        return view('Products.detail', ['product' => $product]);
    }
}
