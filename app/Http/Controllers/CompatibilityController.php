<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompatibilityController extends Controller
{
    public function index()
    {
        return view('public.compatibility.index');
    }

    public function check(Request $request)
    {
        $request->validate([
            'inverter_brand' => 'required|string'
        ]);

        // Mock simulation algorithm validation check
        $compatible = in_array(strtolower($request->inverter_brand), ['fronius', 'sma', 'solaredge', 'enphase']);

        return back()->with([
            'checked' => true,
            'compatible' => $compatible,
            'message' => $compatible 
                ? 'Your system setup matches our criteria perfectly!' 
                : 'Hardware structure mismatch detected. Contact engineers.'
        ]);
    }
}