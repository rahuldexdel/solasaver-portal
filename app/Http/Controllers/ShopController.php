<?php

// app/Http/Controllers/ShopController.php
namespace App\Http\Controllers;

use App\Models\Product;

class ShopController extends Controller
{
public function index()
    {
        // Only load products that have stock available
        $products = Product::where('stock', '>', 0)->orderBy('created_at', 'desc')->get();
        
        return view('public.shop.index', compact('products'));
    }

    public function show(Product $product)
    {
        if (!$product->is_active) abort(404);
        return view('public.shop.show', compact('product'));
    }
}