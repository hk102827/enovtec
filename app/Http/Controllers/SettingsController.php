<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class SettingsController extends Controller
{
    public function showSettings()
    {
        // Retrieve all settings from the database
        $settings = Setting::pluck('value', 'key')->toArray();
        return view('setting', compact('settings'));
    }

    // Update settings
    public function updateSettings(Request $request)
    {
        // Loop through each request parameter and update the corresponding setting
        foreach ($request->all() as $key => $value) {
            // Skip the CSRF token field
            if ($key != '_token') {
                Setting::where('key', $key)->update(['value' => $value]);
            }
        }

        // Redirect with a success message
        return redirect('settings')->with('success', 'Settings updated successfully!');
    }
    public function showDashboard()
{
    $settings = Setting::pluck('value', 'key')->toArray();
    return view('dashboard', compact('settings'));
}
}
