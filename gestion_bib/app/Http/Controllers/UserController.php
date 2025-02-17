<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    // Page d'accueil de l'utilisateur
    public function index()
    {
        // Ici aussi, tu peux ajouter des données comme la liste des livres empruntés par l'utilisateur
        return view('user.dashboard'); // Assure-toi que la vue 'user.dashboard' existe
    }
}
