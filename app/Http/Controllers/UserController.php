<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function registerPage()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users|confirmed',
            'password' => 'required|min:4',
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password  = Hash::make($request->input('password'));

        $user->save();

        return redirect('/login');
    }

    public function loginPage()
    {
        return view('login');
    }

    public function login(Request $request) {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4',
        ]);

        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            return redirect('/');
        }
        return redirect('/login')->with('error', 'Неверный email или password');
    }

    public function logout() {
        Auth::logout();
        return redirect('/');
    }

    public function profile() {
        $user = Auth::user();
        return view('profile', ['user' => $user]);
    }

}
