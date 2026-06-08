<?php

// app/Http/Controllers/Installer/DashboardController.php
namespace App\Http\Controllers\Installer;

use App\Http\Controllers\Controller;
use App\Models\Installation;

class DashboardController extends Controller
{
    public function index()
    {
        $assignedJobsCount = Installation::where('installer_id', auth()->id())->where('status', 'assigned')->count();
        return view('installer.dashboard', compact('assignedJobsCount'));
    }
}