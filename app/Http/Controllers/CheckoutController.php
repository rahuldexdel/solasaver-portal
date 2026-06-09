<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('shop')->with('error', 'No hardware queued for fulfillment validation.');
        }

        $total = array_reduce($cart, function($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0);

        return view('public.shop.checkout', compact('cart', 'total'));
    }

    public function store(Request $request)
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) return redirect()->route('shop');

        $request->validate([
            'shipping_address' => 'required|string|max:500',
            'contact_phone' => 'required|string|max:30'
        ]);

        $total = array_reduce($cart, function($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0);

        // Process isolation tracking transactional scope safe write blocks
        DB::transaction(function () use ($request, $cart, $total) {
          $order = Order::create([
                'user_id' => auth()->id(),
                'total_amount' => $total,
                'status' => 'pending',
                'shipping_address' => $request->shipping_address,
                'phone' => $request->contact_phone
            ]);

            \App\Models\Installation::create([
                'order_id'    => $order->id,
                'customer_id' => auth()->id(),
                'status'      => 'pending'
            ]);
            foreach ($cart as $id => $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $id,
                    'quantity' => $item['quantity'],
                    'unit_price' => $item['price']
                ]);

                // Reduce available inventory allocation
                Product::where('id', $id)->decrement('stock', $item['quantity']);
            }
        });

        // Clear active pipeline queue state
        session()->forget('cart');

        // Target the standard generated entry order success identifier view
        $latestOrder = Order::where('user_id', auth()->id())->latest()->first();
        return redirect()->route('checkout.success', $latestOrder->id);
    }

    public function success(Order $order)
    {
        // Security gate validation barrier check context
        if ($order->user_id !== auth()->id()) abort(403);

        return view('public.shop.success', compact('order'));
    }
}