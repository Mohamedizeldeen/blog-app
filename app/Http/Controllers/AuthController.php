<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLogin()
    {
        // إذا كان المستخدم مسجل دخول بالفعل، وجهه للداشبورد
        if (session('user_id')) {
            return redirect()->route('dashboard');
        }
        
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // إنشاء session آمن
            $request->session()->regenerate();
            session([
                'user_id' => $user->id,
                'user_name' => $user->name,
                'user_email' => $user->email,
                'login_time' => now()
            ]);

            return redirect()->route('dashboard')->with('success', 'Welcome back, ' . $user->name . '!');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput($request->only('email'));
    }

    public function logout(Request $request)
    {
        // حذف جميع بيانات الـ session
        Session::flush();
        
        // إعادة توليد session ID للحماية
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Logged out successfully!');
    }

    public function checkSession()
    {
        if (session('user_id')) {
            $user = User::find(session('user_id'));
            return response()->json([
                'authenticated' => true,
                'user' => $user
            ]);
        }

        return response()->json([
            'authenticated' => false
        ]);
    }
}
