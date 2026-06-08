<?php

// app/Http/Controllers/Admin/DashboardController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'orders_count' => Order::count(),
            'revenue' => Order::where('payment_status', 'paid')->sum('total_amount'),
            'products_count' => Product::count(),
            'users_count' => User::count()
        ];
        return view('admin.dashboard', compact('stats'));
    }
}