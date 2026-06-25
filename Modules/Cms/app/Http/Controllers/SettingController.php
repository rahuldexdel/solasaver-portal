<?php

namespace Modules\Cms\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Cms\Models\SiteSetting;

class SettingController extends Controller
{
    public function edit()
    {
        return view('cms::admin.settings.edit');
    }

    public function update(Request $request)
    {
        foreach ($request->input('settings', []) as $key => $value) {
            SiteSetting::updateOrCreate(['key' => $key], ['value' => $value]);
        }
        return back()->with('success', 'Settings updated.');
    }
}