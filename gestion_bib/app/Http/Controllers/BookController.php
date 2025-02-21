<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    /**
     * Afficher la liste des livres.
     */
    public function index()
    {
        $books = Book::latest()->paginate(8);
        return view('books.index', compact('books'));
    }

    /**
     * Afficher le formulaire de création d'un livre.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Enregistrer un nouveau livre dans la base de données.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Gérer l'upload de l'image
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('books', 'public');
        }

        // Créer le livre avec l'utilisateur qui l'a ajouté
        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'description' => $request->description,
            'image' => $imagePath,
            'user_id' => Auth::id(), // Associe le livre à l'utilisateur connecté
        ]);

        return redirect()->route('books.index')->with('success', 'Livre ajouté avec succès.');
    }

    /**
     * Afficher un livre spécifique.
     */
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    /**
     * Afficher le formulaire de modification d'un livre.
     */
    public function edit(Book $book)
    {
        // Vérifier si l'utilisateur est le propriétaire du livre ou un admin
        if (Auth::id() !== $book->user_id && Auth::user()->role !== 'admin') {
            return redirect()->route('books.index')->with('error', 'Accès refusé.');
        }

        return view('books.edit', compact('book'));
    }

    /**
     * Mettre à jour un livre.
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Vérifier si l'utilisateur est le propriétaire du livre ou un admin
        if (Auth::id() !== $book->user_id && Auth::user()->role !== 'admin') {
            return redirect()->route('books.index')->with('error', 'Accès refusé.');
        }

        // Gérer la nouvelle image
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('books', 'public');
            $book->image = $imagePath;
        }

        $book->update([
            'title' => $request->title,
            'author' => $request->author,
            'description' => $request->description,
        ]);

        return redirect()->route('books.index')->with('success', 'Livre mis à jour avec succès.');
    }

    /**
     * Supprimer un livre.
     */
    public function destroy(Book $book)
    {
        // Vérifier si l'utilisateur est le propriétaire du livre ou un admin
        if (Auth::id() !== $book->user_id && Auth::user()->role !== 'admin') {
            return redirect()->route('books.index')->with('error', 'Accès refusé.');
        }

        $book->delete();

        return redirect()->route('books.index')->with('success', 'Livre supprimé avec succès.');
    }
}
