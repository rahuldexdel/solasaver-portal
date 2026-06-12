<?php

namespace Modules\Product\Http\Controllers;   // ← changed

use App\Http\Controllers\Controller;
use Modules\Product\Models\Product;                    // ← changed
use App\Http\Requests\StoreProductRequest;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(10);
       return view('product::index', compact('products')); 
    }

    public function create() { return view('admin.products.create'); }

    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }
       return view('product::create');    
        return redirect()->route('admin.products.index')->with('success', 'Product registered.');
    }

    public function edit(Product $product) {return view('product::edit', compact('product'));  }

    public function update(StoreProductRequest $request, Product $product)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }
        $product->update($data);
        return redirect()->route('admin.products.index')->with('success', 'Product updated.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product removed.');
    }
}