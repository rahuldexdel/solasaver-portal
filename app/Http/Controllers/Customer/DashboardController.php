<?php

// app/Http/Controllers/Customer/DashboardController.php
namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index()
    {
        $recentOrders = Order::where('user_id', auth()->id())->latest()->take(5)->get();
        return view('customer.dashboard', compact('recentOrders'));
    }
}