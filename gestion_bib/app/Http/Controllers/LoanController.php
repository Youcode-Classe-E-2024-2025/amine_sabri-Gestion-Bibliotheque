<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Loan;
use Auth;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index()
{
    if (Auth::user()->role === 'admin') {
        // L'admin voit tous les emprunts avec les informations des livres et des utilisateurs
        $loans = Loan::with(['book', 'user'])->get();
    } else {
        // L'utilisateur normal ne voit que ses propres emprunts
        $loans = Auth::user()->loans()->with('book')->get();
    }

    return view('loans.index', compact('loans'));
}


    // Emprunter un livre
    public function store(Request $request, $bookId)
    {
        $book = Book::findOrFail($bookId);

        // Vérifier si le livre est déjà emprunté
        if (Loan::where('book_id', $book->id)->whereNull('returned_at')->exists()) {
            return redirect()->back()->with('error', 'Ce livre est déjà emprunté.');
        }

        Loan::create([
            'user_id' => Auth::id(),
            'book_id' => $book->id,
            'borrowed_at' => now(),
        ]);

        return redirect()->route('loans.index')->with('success', 'Livre emprunté avec succès.');
    }

    // Retourner un livre
    public function returnBook($loanId)
    {
        $loan = Loan::findOrFail($loanId);

        if ($loan->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Action non autorisée.');
        }

        $loan->update(['returned_at' => now()]);

        return redirect()->route('loans.index')->with('success', 'Livre retourné avec succès.');
    }
}
