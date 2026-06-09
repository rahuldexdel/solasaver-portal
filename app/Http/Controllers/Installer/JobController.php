<?php

namespace App\Http\Controllers\Installer;

use App\Http\Controllers\Controller;
use App\Models\Installation;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        // Fix 1: Filter specifically by the logged-in installer's ID
        // Fix 2: Look for 'assigned' status (which matches your admin dispatch action)
        $jobs = Installation::with(['customer', 'order'])
            ->where('installer_id', auth()->id())
            ->whereIn('status', ['assigned', 'scheduled', 'completed']) 
            ->orderBy('scheduled_date', 'asc') 
            ->get();

        return view('installer.jobs.index', compact('jobs'));
    }

    public function show(Installation $installation)
    {
        // Security Gate: Prevent cross-viewing profiles
        if ($installation->installer_id !== auth()->id()) {
            abort(403, 'Unauthorized access to assignment profile metrics.');
        }
        
        // Fix 3: Updated 'order.items.product' to match camelCase 'order.orderItems.product'
        $installation->load(['customer', 'order.orderItems.product']);
        
        return view('installer.jobs.show', compact('installation'));
    }

    public function updateStatus(Request $request, Installation $installation)
    {
        if ($installation->installer_id !== auth()->id()) {
            abort(403);
        }

        // Match your validation rule matrix to options expected by your business requirements
        $request->validate([
            'status' => 'required|in:assigned,scheduled,completed,cancelled'
        ]);
        
        $data = ['status' => $request->status];
        
        if ($request->status === 'completed') {
            $data['completed_at'] = now();
        }

        $installation->update($data);

        // Optional Cascading Action: If the job is completed on-site, mark the order complete too!
        if ($request->status === 'completed' && $installation->order) {
            $installation->order->update(['status' => 'completed']);
        }

        return back()->with('success', 'Job deployment execution profile status updated.');
    }
}