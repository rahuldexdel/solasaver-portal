<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Installation;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = auth()->id();

        // Fetch recent orders for reference tracking
        $recentOrders = Order::where('user_id', $userId)->latest()->take(5)->get();

        // Fix: Build the missing stats matrix using real database metrics
        $stats = [
            'orders_count' => Order::where('user_id', $userId)->count(),
            'pending_installations' => Installation::where('customer_id', $userId)
                ->whereIn('status', ['pending', 'assigned', 'scheduled'])
                ->count()
        ];

        return view('customer.dashboard', compact('recentOrders', 'stats'));
    }
}