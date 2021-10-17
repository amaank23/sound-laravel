<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function login()
    {
        if (session()->get('is_authenticated') !== 1 && session()->get('role') !== 'admin') {
            return view('admin.login');
        }
        return redirect('/admin');
    }
    public function auth(Request $req)
    {
        $email = $req->input('email');
        $password = $req->input('password');
        $admin = User::where([
            'email' => $email
        ])->first();

        if (!$admin) {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }

        $checkForPassword = Hash::check($password, $admin->password);
        if (!$checkForPassword) {
            return back()->withErrors([
                'passwordNotMatch' => 'Password Does not Match with the Associated Email'
            ]);
        }

        $user_role = Role::find($admin->role);
        // return $user_role;
        if ($user_role->role !== 'admin') {
            return back()->withErrors([
                'err' => 'You are not Autherized',
            ]);
        }
        $req->session()->put('user_id', $admin->id);
        $req->session()->put('user_name', $admin->name);
        $req->session()->put('is_authenticated', true);
        $req->session()->put('role', $user_role->role);
        return redirect()->route('admin.audio');
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
