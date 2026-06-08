<?php

// app/Http/Controllers/Customer/OrderController.php
namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller
{
public function index()
    {
        // Fetch only the authenticated user's individual orders
        $orders = auth()->user()->orders()->orderBy('created_at', 'desc')->get();

        return view('customer.orders.index', compact('orders'));
    }
    public function show(Order $order)
    {
        if ($order->user_id !== auth()->id()) abort(403);
        $order->load(['items.product', 'installation']);
        return view('customer.orders.show', compact('order'));
    }
}