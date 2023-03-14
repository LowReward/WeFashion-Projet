<?php

namespace App\Http\Controllers;

// app/Http/Controllers/AdminController.php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

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
            return redirect()->intended('/homme');
        }
        return back()->withErrors([

            'email' => 'Les informations d\'identification sont incorrectes',

        ]);
    }

    public function dashboard()
    {
        if (Auth::check()) {
            $products = Product::all();
            return view('admin.products', ['products' => $products]);
        }
        return redirect('/admin/login');
    }
}
