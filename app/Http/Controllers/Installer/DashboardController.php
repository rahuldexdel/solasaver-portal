<?php

namespace App\Http\Controllers\Installer;

use App\Http\Controllers\Controller;
use App\Models\Installation;

class DashboardController extends Controller
{
    public function index()
    {
        $installerId = auth()->id();

        // Calculate dynamic live numbers for stat cards
        $assignedCount = Installation::where('installer_id', $installerId)
            ->whereIn('status', ['assigned', 'scheduled'])
            ->count();

        $awaitingCount = Installation::where('installer_id', $installerId)
            ->where('status', 'pending') // or whichever status represents paused jobs
            ->count();

        $completedCount = Installation::where('installer_id', $installerId)
            ->where('status', 'completed')
            ->count();

        // Pull the top 5 upcoming jobs for the list view
        $recentJobs = Installation::with(['customer', 'order'])
            ->where('installer_id', $installerId)
            ->orderBy('scheduled_date', 'asc')
            ->take(5)
            ->get();

        return view('installer.dashboard', compact('assignedCount', 'awaitingCount', 'completedCount', 'recentJobs'));
    }
}