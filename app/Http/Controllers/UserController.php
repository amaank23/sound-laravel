<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login()
    {
        if (!session()->get('is_authenticated')) {
            return view('auth.login');
        }
        return redirect('/');
    }
    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $email = $request->email;
        $password = $request->password;

        $user = User::where([
            'email' => $email,
            'role' => 2
        ])->first();
        if (!$user) {
            return back()->withErrors([
                'notRegistered' => 'Email is not Registered'
            ]);
        }

        $checkForPassword = Hash::check($password, $user->password);

        if (!$checkForPassword) {
            return back()->withErrors([
                'passwordNotMatch' => 'Password Does not Match with the Associated Email'
            ]);
        }

        $request->session()->put('user_id', $user->id);
        $request->session()->put('user_name', $user->name);
        $request->session()->put('is_authenticated', true);
        $request->session()->put('role', 'user');

        return redirect('/');
    }
    public function register()
    {
        if (!session()->get('is_authenticated')) {
            return view('auth.register');
        }
        return redirect('/');
    }
    public function registerUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'confirmpassword' => 'required',
            'phone' => 'required'
        ]);
        $user = User::where([
            'email' => $request->email
        ])->first();

        if ($user) {
            return back()->withErrors([
                'userAlreadyExist' => 'This Email is Already Registered'
            ]);
        }

        $email = $request->email;
        $name = $request->name;
        $password = $request->password;
        $confirmPassword = $request->confirmpassword;
        $phone = $request->phone;

        if ($password !== $confirmPassword) {
            return back()->withErrors([
                'passwordNotMatch' => 'Password and Confirm Password does not match'
            ]);
        }

        $hashedPassword = Hash::make($password);

        $newUser = new User();
        $newUser->name = $name;
        $newUser->email = $email;
        $newUser->password = $hashedPassword;
        $newUser->phone_number = $phone;
        $newUser->role = 2;
        $newUser->save();
        return redirect('/login');
    }
    public function index()
    {
        $users = User::where('role', 2)->get();
        return view('admin.users.index', ['users' => $users]);
    }
    public function create()
    {
        return view('admin.users.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'confirmpassword' => 'required',
            'phone' => 'required'
        ]);
        $user = User::where([
            'email' => $request->email
        ])->first();

        if ($user) {
            return back()->withErrors([
                'userAlreadyExist' => 'This Email is Already Registered'
            ]);
        }

        $email = $request->email;
        $name = $request->name;
        $password = $request->password;
        $confirmPassword = $request->confirmpassword;
        $phone = $request->phone;

        if ($password !== $confirmPassword) {
            return back()->withErrors([
                'passwordNotMatch' => 'Password and Confirm Password does not match'
            ]);
        }

        $hashedPassword = Hash::make($password);

        $newUser = new User();
        $newUser->name = $name;
        $newUser->email = $email;
        $newUser->password = $hashedPassword;
        $newUser->phone_number = $phone;
        $newUser->role = 2;
        $newUser->save();
        return redirect()->route('admin.users');
    }
    public function destroy($id)
    {
        User::destroy($id);
        return back();
    }
    public function logout()
    {
        session()->pull('user_id');
        session()->pull('user_name');
        session()->pull('is_authenticated');
        session()->pull('role');
        return redirect('/login');
    }
}
