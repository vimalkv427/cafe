<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User; 

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     */
    protected function authenticated(Request $request, $user)
    {
        if ($user->isSuperAdmin()) {
            return redirect()->route('superadmin.dashboard');
        } elseif ($user->isAdmin()) {
            return redirect()->route('admin.dashboard');
        } 
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
    
            // Check if the user's trial has expired
            if ($user->trial_end_date && now()->greaterThan($user->trial_end_date)) {
                Auth::logout();
                return redirect()->route('login')->with('error', 'Your free trial has expired. Please contact the admin.');
            }
    
            // Redirect based on user role
            if ($user->isSuperAdmin()) {
                return redirect()->route('superadmin.dashboard');
            } elseif ($user->isAdmin()) {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('user.dashboard');
            }
        }
    
        return back()->with('error', 'Invalid credentials.');
    }
    

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Logout the user and redirect to login page.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login')->with('status', 'Logged out successfully.');
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        return redirect()->back()->with('error', 'Invalid email or password.');
    }  

    public function attemptLogin(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user) {
            if ($user->status === '0') {
                return back()->with('error', 'Your free trial has expired. Please contact the admin.');
            }

            if (Auth::attempt($request->only('email', 'password'), $request->remember)) {
                return redirect()->route('dashboard');
            }
        }

        return back()->with('error', 'Invalid credentials.');
    }


}
