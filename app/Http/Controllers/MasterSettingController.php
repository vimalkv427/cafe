<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MasterSetting;

class MasterSettingController extends Controller
{
    public function index()
    {
        $settings = MasterSetting::first();
        return view('superadmin.master_settings', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'trial_days' => 'required|integer|min:1'
        ]);

        $settings = MasterSetting::firstOrCreate([]);
        $settings->update(['trial_days' => $request->trial_days]);

        return redirect()->back()->with('success', 'Trial days updated successfully.');
    }
}
