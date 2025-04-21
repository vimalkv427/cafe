<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;

class UserController extends Controller
{
    public function createUserUnderAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role_id' => 'required|exists:roles,id',
        ]);

        $user = new User();
        $user->admin_id = auth()->user()->id;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role_id = $request->role_id;
        $user->status = 1;
        $user->save();

        return redirect()->back()->with('success', 'User created successfully');
    }

    public function index()
    {
        $users = User::where('admin_id', auth()->id())->with('role')->get();
        $roles = Role::whereNotIn('name', ['Super Admin', 'Admin'])->get();
        return view('admin.manage_users', compact('users', 'roles'));
    }

    public function dashboard()
    {


        return view('user.dashboard'); // User-specific dashboard



        return redirect('/login')->with('error', 'Unauthorized access');
    }

    public function showPermissions($id)
    {
        $user = User::with('permissions')->findOrFail($id);
        $availablePermissions = [
            'create_bill',
            'view_sales',
            'manage_users',
            'manage_products',
            'manage_purchases',
        ];
        return view('admin.manage_permissions', compact('user', 'availablePermissions'));
    }

    public function updatePermissions(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Clear old permissions
        $user->permissions()->delete();

        // Save new permissions
        if ($request->has('permissions')) {
            foreach ($request->permissions as $permission) {
                $user->permissions()->create(['permission' => $permission]);
            }
        }

        return redirect()->back()->with('success', 'Permissions updated!');
    }

    public function managePermissions($id)
    {
        $user = User::find($id);
        return view('admin.manage_permissions', compact('user'));
    }
}
