@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h2 class="text-xl font-bold mb-4 text-gray-800">📚 Liste des Livres</h2>

    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-3 mb-4 rounded-md">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
        @foreach($books as $book)
            <div class="bg-white shadow-md rounded-md overflow-hidden transition hover:shadow-lg">
                <img src="{{ $book->image ? asset('storage/' . $book->image) : asset('images/default-book.jpg') }}" 
                    class="w-full h-40 object-cover" alt="{{ $book->title }}">
                
                    <div class="p-3">
                <h5 class="text-md font-semibold text-gray-900">{{ $book->title }}</h5>
                <p class="text-gray-600 text-sm"><strong>Auteur :</strong> {{ $book->author }}</p>
                <p class="text-gray-500 text-xs">{{ Str::limit($book->description, 80) }}</p>

                @if(auth()->check() && auth()->user()->role == "admin")
                    <div class="mt-3 flex space-x-3">
                        <a href="{{ route('books.edit', $book) }}">
                            <i class="bi bi-pencil-square text-yellow-500 text-lg"></i>
                        </a>
                        <form action="{{ route('books.destroy', $book) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Supprimer ce livre ?');">
                                <i class="bi bi-trash-fill text-red-500 text-lg"></i>
                            </button>
                        </form>
                    </div>
                @elseif(auth()->check() && auth()->user()->role == "user")
                    <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded">Réserver</button>
                @endif
            </div>
            </div>
        @endforeach
    </div>

    <div class="mt-4">
        {{ $books->links() }}
    </div>
</div>
@endsection
