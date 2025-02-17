<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     $this->middleware('role:admin'); 
    // }

    // Page d'accueil de l'administration
    public function index()
    {
        // Tu peux ajouter ici des données à passer à la vue, comme une liste des utilisateurs ou des livres
        return view('admin.dashboard'); // Assure-toi que la vue 'admin.dashboard' existe
    }
}
