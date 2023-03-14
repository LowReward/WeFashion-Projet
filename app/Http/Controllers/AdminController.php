<?php

namespace App\Http\Controllers;

// app/Http/Controllers/AdminController.php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        return back()->withErrors([

            'email' => 'Les informations d\'identification sont incorrectes',

        ]);
    }

    public function dashboard()
    {
        if (Auth::check()) {
            return view('admin.dashboard');
        }
        return redirect('/admin/login');
    }
}
