<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // Affiche la vue pour la page login
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        // Récupération des informations d'identification
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            //Si l'Auth est réussit alors on regénére la session ( mesure de sécurité )
            $request->session()->regenerate();
            // Ensuite on redirige vers la page products du dashboard
            return redirect()->intended('/admin/products');
        }

        // Au cas où l'Auth échoue alors on reload avec le message d'erreur (Les informations d'identification sont incorrectes)
        return back()->withErrors([

            'email' => 'Les informations d\'identification sont incorrectes',

        ]);
    }
}
