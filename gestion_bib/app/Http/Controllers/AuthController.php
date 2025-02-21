<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
    public function showRegisterForm()
{
    return view('auth.register');
}

public function register(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6|confirmed'
    ]);

    // Créer l'utilisateur
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => 'user',
    ]);

    // Authentifier l'utilisateur après l'inscription
    Auth::login($user);

    // Rediriger vers la page de connexion
    return redirect()->route('login.form')->with('success', 'Inscription réussie, vous êtes maintenant connecté !');
}


public function showLoginForm()
{
    return view('auth.login');
}

public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:6',
    ]);

    if (Auth::attempt([
        'email' => $request->email,
        'password' => $request->password
    ], $request->remember)) {

        // Vérification du rôle après l'authentification
        if (Auth::user()->role === 'admin') {
            return redirect()->route('books.index'); // Rediriger vers la page admin
        }

        return redirect()->route('books.index'); // Rediriger vers la page d'accueil pour les utilisateurs
    }

    return back()->withErrors(['email' => 'Identifiants incorrects.']);
}

public function logout(Request $request)
{
    Auth::logout();

    // Invalider la session
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('login.form')->with('success', 'Vous avez été déconnecté.');
}

}
