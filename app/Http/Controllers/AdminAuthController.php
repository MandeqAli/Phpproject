<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        // if already logged in as admin -> go dashboard
        if (Auth::check() && Auth::user() && (int) Auth::user()->is_admin === 1) {
            return redirect()->route('dashboard');
        }

        // ✅ MUST match your blade file name:
        // resources/views/login_admin.blade.php  ->  view('login_admin')
        // resources/views/logins_admin.blade.php ->  view('logins_admin')
        return view('login_admin');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // only allow admin users
        $credentials['is_admin'] = 1;

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            \App\Models\ActivityLog::create([
                'user_id' => Auth::id(),
                'action' => 'Admin Login',
                'details' => 'Admin logged in successfully.',
                'ip_address' => $request->ip(),
            ]);

            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'email' => 'Invalid admin credentials.',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        if (Auth::check()) {
            \App\Models\ActivityLog::create([
                'user_id' => Auth::id(),
                'action' => 'Admin Logout',
                'details' => 'Admin logged out.',
                'ip_address' => $request->ip(),
            ]);
        }

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // ✅ back to admin login page route name
        return redirect()->route('login.admin');
    }
}
