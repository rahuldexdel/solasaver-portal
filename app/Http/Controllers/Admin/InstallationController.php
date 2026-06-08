<?php

// app/Http/Controllers/Admin/InstallationController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Installation;
use App\Models\User;
use Illuminate\Http\Request;

class InstallationController extends Controller
{

    public function index()
    {
        // Fix: Swap out 'scheduled_at' with your actual database column 'scheduled_date'
        $installations = Installation::with(['order.user'])
            ->orderBy('scheduled_date', 'asc')
            ->get();

        return view('admin.installations.index', compact('installations'));
    }
    public function show(Installation $installation)
    {
        $installation->load(['customer', 'installer', 'order.items.product']);
        $installers = User::role('installer')->get();
        return view('admin.installations.show', compact('installation', 'installers'));
    }

    public function assign(Request $request, Installation $installation)
    {
        $request->validate([
            'installer_id' => 'required|exists:users,id',
            'scheduled_date' => 'required|date|after:today'
        ]);

        $installation->update([
            'installer_id' => $request->installer_id,
            'scheduled_date' => $request->scheduled_date,
            'status' => 'assigned'
        ]);

        return back()->with('success', 'Deployment technician linked directly.');
    }
}