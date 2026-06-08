<?php

// app/Http/Controllers/CheckoutController.php
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Installation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) return redirect()->route('shop')->with('error', 'Your cart is empty.');
        return view('public.checkout', compact('cart'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'phone' => 'required|string',
            'shipping_address' => 'required|string',
            'require_installation' => 'nullable|boolean'
        ]);

        $cart = session()->get('cart', []);
        if (empty($cart)) return redirect()->route('shop');

        $total = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);

        DB::transaction(function () use ($request, $cart, $total, &$order) {
            $order = Order::create([
                'user_id' => auth()->id(),
                'status' => 'pending',
                'total_amount' => $total,
                'phone' => $request->phone,
                'shipping_address' => $request->shipping_address,
                'payment_status' => 'unpaid'
            ]);

            foreach ($cart as $productId => $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $productId,
                    'quantity' => $item['quantity'],
                    'unit_price' => $item['price']
                ]);
            }

            // Optional structural layout entry generation for installations
            if ($request->require_installation) {
                Installation::create([
                    'order_id' => $order->id,
                    'customer_id' => auth()->id(),
                    'status' => 'pending'
                ]);
            }
        });

        session()->forget('cart');
        return redirect()->route('checkout.success', $order->id)->with('success', 'Order tracking initialized.');
    }

    public function success(Order $order)
    {
        return view('public.order-success', compact('order'));
    }
}