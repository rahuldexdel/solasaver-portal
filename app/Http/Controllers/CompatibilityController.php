<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Cms\Models\Page;

class CompatibilityController extends Controller
{

    public function compatibility()
    {
        $page = Page::with('sections.items')->where('slug', 'system-compatibility')->firstOrFail();
        return view('public.compatibility.index', compact('page'));   // your actual view path
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