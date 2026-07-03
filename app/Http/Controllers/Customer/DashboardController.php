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

        // Recent orders (3 is enough for the dashboard panel)
        $recentOrders = Order::where('user_id', $userId)->latest()->take(3)->get();

        $stats = [
            'orders_count' => Order::where('user_id', $userId)->count(),
            'pending_installations' => Installation::where('customer_id', $userId)
                ->whereIn('status', ['pending', 'assigned', 'scheduled'])
                ->count(),
            'unpaid_count' => Order::where('user_id', $userId)
                ->where('payment_status', 'unpaid')
                ->count(),
        ];

        return view('customer.dashboard', compact('recentOrders', 'stats'));
    }
}