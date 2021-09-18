<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function login()
    {
        if (!session()->get('is_authenticated') && session()->get('role') !== 'admin') {
            return view('admin.login');
        }
        return redirect('/admin/dashboard');
    }
    public function auth(Request $req)
    {
        $email = $req->input('email');
        $password = $req->input('password');
        $admin = User::where([
            'email' => $email,
            'password' => $password
        ])->first();

        if (!$admin) {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }

        $user_role = Role::find($admin->role);
        // return $user_role;
        if ($user_role->role !== 'admin') {
            // return back()->withErrors([
            //     'err' => 'You are not Autherized',
            // ]);
            return 'You are not Autherized';
        }
        $req->session()->put('user_id', $admin->id);
        $req->session()->put('user_name', $admin->name);
        $req->session()->put('is_authenticated', true);
        $req->session()->put('role', $user_role->role);
        return redirect()->route('admin.dashboard');
    }
    public function logout()
    {
        session()->pull('user_id');
        session()->pull('user_name');
        session()->pull('is_authenticated');
        session()->pull('role');
        return redirect('/admin/login');
    }
}
