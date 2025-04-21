<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); 
    }

    public function index()
    {
        if (Auth::user()->isAdmin() || Auth::user()->isSuperAdmin()) {
            return view('admin.dashboard');
        }
        return redirect('/login')->with('error', 'Unauthorized access');
    }
}
