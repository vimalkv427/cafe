<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon; 
use App\User; 

class SuperAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'superadmin']); // Ensures only Super Admins can access
    }

    public function index()
    {
        return view('superadmin.dashboard');
    }

    public function users()
    {
        $users = User::where('role_id', 2)->get();
        return view('superadmin.users', compact('users'));
    }

    public function createUser()
    {
        return view('superadmin.create_user');
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'status' => 'required|in:1,0',
        ]);

        User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'cpassword' => $request->password,
            'status' => $request->status,
            'trial_end_date' => now()->addDays(30), // Default 30-day trial
            'shop_name' => $request->shop_name,  // store new field
            'address_line'   => $request->address, 
        ]);

        return redirect()->route('superadmin.users')->with('success', 'User created successfully!');
    }

    public function extendTrial(Request $request, $id)
    {
        $request->validate(['extra_days' => 'required|integer|min:1']);

        $user = User::findOrFail($id);
        $trialEndDate = $user->trial_end_date ? Carbon::parse($user->trial_end_date) : now();
        $user->trial_end_date = $trialEndDate->addDays($request->extra_days);
        $user->save();

        return redirect()->back()->with('success', 'Trial extended successfully.');
    }  

    public function blockUser($id)
    {
        $user = User::findOrFail($id);
        $user->update(['status' => '0']);

        return redirect()->back()->with('success', 'User has been blocked successfully.');
    }    

    public function unblockUser($id)
    {
        $user = User::findOrFail($id);
        $user->update(['status' => '1']);

        return redirect()->back()->with('success', 'User has been unblocked successfully.');
    }

}
