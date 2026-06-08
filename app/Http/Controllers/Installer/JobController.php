<?php

// app/Http/Controllers/Installer/JobController.php
namespace App\Http\Controllers\Installer;

use App\Http\Controllers\Controller;
use App\Models\Installation;
use Illuminate\Http\Request;

class JobController extends Controller
{
  public function index()
    {
        // Fix: Changed 'scheduled_at' to your actual column 'scheduled_date'
        $jobs = Installation::where('status', 'dispatched')
            ->orderBy('scheduled_date', 'asc') 
            ->get();

        return view('installer.jobs.index', compact('jobs'));
    }

    public function show(Installation $installation)
    {
        if ($installation->installer_id !== auth()->id()) abort(403);
        $installation->load(['customer', 'order.items.product']);
        return view('installer.jobs.show', compact('installation'));
    }

    public function updateStatus(Request $request, Installation $installation)
    {
        if ($installation->installer_id !== auth()->id()) abort(403);
        $request->validate(['status' => 'required|in:scheduled,completed,cancelled']);
        
        $data = ['status' => $request->status];
        if ($request->status === 'completed') {
            $data['completed_at'] = now();
        }

        $installation->update($data);
        return back()->with('success', 'Job profile status saved.');
    }
}