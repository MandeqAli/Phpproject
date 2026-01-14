<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

class AuthController extends Controller
{
    private function resetUserSession()
    {
        Auth::logout();
        
       
        session()->forget(['url', 'intended', 'cart_count']); 
        session()->invalidate();
        session()->regenerateToken();
    }

    public function showLoginForm()
    {
        $this->resetUserSession();
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            \App\Models\ActivityLog::create([
                'user_id' => Auth::id(),
                'action' => 'Login',
                'details' => 'User logged in successfully.',
                'ip_address' => $request->ip()
            ]);

            return redirect()->route('shop');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function showRegistrationForm()
    {
        $this->resetUserSession();
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|digits:9',
            'address' => 'required|string|max:500',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        \App\Models\ActivityLog::create([
            'user_id' => $user->id,
            'action' => 'Register',
            'details' => 'New user registered.',
            'ip_address' => $request->ip()
        ]);

        return redirect()->route('shop');
    }

    public function logout(Request $request)
    {
        if(Auth::check()) {
            \App\Models\ActivityLog::create([
                'user_id' => Auth::id(),
                'action' => 'Logout',
                'details' => 'User logged out.',
                'ip_address' => $request->ip()
            ]);
        }

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
