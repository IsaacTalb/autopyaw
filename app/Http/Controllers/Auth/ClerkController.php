<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

class ClerkController extends Controller
{
    public function login()
    {
        return View::make('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember')))
        {
            $request->session()->regenerate();
            return Redirect::intended(route('dashboard'));
        }

        return Redirect::back()->withErrors(['email' => 'The provided credentials do not match our records.'])->withInput();
    }

    public function register()
    {
        return View::make('auth.register');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'business_name' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $business = Business::create([
            'name' => $data['business_name'],
            'slug' => Str::slug($data['business_name']) ?: 'business',
            'status' => 'active',
            'subscription_plan' => 'free',
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'business_id' => $business->id,
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        return Redirect::route('dashboard');
    }

    public function callback()
    {
        return Redirect::route('dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::route('home');
    }
}
