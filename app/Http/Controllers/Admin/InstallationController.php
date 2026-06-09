<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Installation;
use App\Models\User;
use Illuminate\Http\Request;

class InstallationController extends Controller
{
    public function index()
    {
        // Load installations along with associated orders, customers, and assigned technicians
        $installations = Installation::with(['order', 'customer', 'installer'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.installations.index', compact('installations'));
    }

    public function show(Installation $installation)
    {
        $installation->load(['order.orderItems.product', 'customer', 'installer']);
        
        // Fix: Use Laravel's collection filter to securely check roles via hasRole()
        // This ensures compatibility with your system's authentication layer
        $installers = User::all()->filter(function ($user) {
            return $user->hasRole('installer');
        });

        return view('admin.installations.show', compact('installation', 'installers'));
    }
    public function assign(Request $request, Installation $installation)
    {
        $request->validate([
            'installer_id'   => 'required|exists:users,id',
            'scheduled_date' => 'required|date|after_or_equal:today',
            'notes'          => 'nullable|string|max:1000'
        ]);

        $installation->update([
            'installer_id'   => $request->installer_id,
            'scheduled_date' => $request->scheduled_date,
            'notes'          => $request->notes,
            'status'         => 'assigned' // Updates status from pending once dispatched
        ]);

        return redirect()
            ->route('admin.installations.show', $installation->id)
            ->with('success', 'Technician dispatched and job scheduled successfully.');
    }
}