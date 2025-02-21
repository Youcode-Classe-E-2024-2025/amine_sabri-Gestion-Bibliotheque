@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h2 class="text-2xl font-bold mb-6 text-gray-800 flex items-center">
    <i class="bi bi-book-half mr-2"></i>Liste des Livres
    </h2>

    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-3 mb-4 rounded-md">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-3 mb-4 rounded-md">
            {{ session('error') }}
        </div>
    @endif

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($books as $book)
            <div class="bg-white shadow-lg rounded-xl overflow-hidden transition-all duration-300 transform hover:scale-105">
                <img src="{{ $book->image ? asset('storage/' . $book->image) : asset('images/default-book.jpg') }}" 
                    class="w-[170px] flex justify-center  h-[250px] ml-[55px] mt-2" alt="{{ $book->title }}">
                
                <div class="p-4">
                    <h5 class="text-lg font-semibold text-gray-900 truncate">{{ $book->title }}</h5>
                    <p class="text-gray-600 text-sm"><strong>By :</strong> {{ $book->author }}</p>
                    <!-- <p class="text-gray-500 text-sm truncate">{{ Str::limit($book->description, 100) }}</p> -->

                    <div class="mt-3 flex justify-between items-center">
                        @if(auth()->check() && auth()->user()->role == "admin")
                            <div class="flex space-x-3">
                                <a href="{{ route('books.edit', $book) }}" class="text-yellow-500 text-xl hover:text-yellow-600">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('books.destroy', $book) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Supprimer ce livre ?');" class="text-red-500 text-xl hover:text-red-600">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </form>
                            </div>
                        @elseif(auth()->check() && auth()->user()->role == "user")
                            <form action="{{ route('loans.store', $book->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded-md text-sm font-semibold shadow-md hover:bg-yellow-600 transition-all">
                                    Réserver
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-6">
        {{ $books->links() }}
    </div>
</div>
@endsection
