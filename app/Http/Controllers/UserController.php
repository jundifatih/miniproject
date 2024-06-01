<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function getRegister()
    {
        return view('register.index');
    }

    public function registerUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->route('get_register')
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::create([
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            // 'role'=>$request->role,
        ]);

        if ($user) {
            return redirect()->route('get_login')
                ->with('success', 'User created successfully');
        } else {
            return redirect()->route('get_register')
                ->with('error', 'Failed to create user');
        }
    }

    public function getLogin()
    {
        return view('login.index');
    }

    public function loginUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('get_login')
                ->withErrors($validator)
                ->withInput();
        }

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->route('get_home');
            // return redirect()->route('products.index');
            // return redirect()->route('login')->with('success', 'Login success');
        } else {
            return redirect()->route('get_login')
                ->with('error', 'Login failed username or password is incorrect');
        }
    }

    public function dashboardUser()
    {
        $user = Auth::user();

        // get user role
        // $userAuth = User::find($user->id);
        // dd($userAuth->roles[0]->name);
        
        // change role
        // $user->roles()->detach();
        // $user->assignRole('superadmin');

        // if (!$user) {
        //     return redirect()->route('login');
        // }

        return view('dashboard.index', compact('user'));
    }

    public function myProfile(){
        $user = Auth::user();
        return view('myprofile.index', compact('user'));
    }
    public function logout()
    {
        Auth::logout();

        return redirect()->route('get_home');
    }

}   
