<?php

// app/Http/Controllers/CompatibilityController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompatibilityController extends Controller
{
    public function index() { return view('public.compatibility'); }

    public function check(Request $request)
    {
        $request->validate(['inverter_brand' => 'required|string', 'battery_size' => 'required|numeric']);
        // Simple mock matching algorithm for display
        $compatible = ($request->battery_size <= 15); 
        return view('public.compatibility-result', compact('compatible'));
    }
}