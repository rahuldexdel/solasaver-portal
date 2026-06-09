<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        
        $total = array_reduce($cart, function($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0);

        return view('public.shop.cart', compact('cart', 'total'));
    }

    public function add(Product $product)
    {
        if ($product->stock <= 0) {
            return back()->with('error', 'This asset is currently out of supply.');
        }

        $cart = session()->get('cart', []);

        // Increment quantity if item already exists in session
        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
        } else {
            $cart[$product->id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "sku" => $product->sku ?? 'SOLASAVE1001'
            ];
        }

        session()->put('cart', $cart);
        return redirect()->route('cart.index')->with('success', 'Hardware unit added to processing cart.');
    }

    public function update(Request $request, $id)
    {
        $request->validate(['quantity' => 'required|integer|min:1']);
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $product = Product::find($id);
            if ($product && $request->quantity > $product->stock) {
                return back()->with('error', "Only {$product->stock} physical units available.");
            }
            
            $cart[$id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
        }

        return back()->with('success', 'Cart distribution parameters adjusted.');
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return back()->with('success', 'Item removed from pipeline allocation.');
    }
}