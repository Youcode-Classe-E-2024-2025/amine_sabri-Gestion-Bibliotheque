@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h2 class="text-2xl font-semibold mb-6">Modifier le Livre</h2>

    <!-- Afficher les erreurs de validation -->
    @if($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('books.update', $book) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Titre du Livre</label>
            <input type="text" class="mt-1 p-2 w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" id="title" name="title" required value="{{ old('title', $book->title) }}">
        </div>

        <div class="mb-4">
            <label for="author" class="block text-sm font-medium text-gray-700">Auteur</label>
            <input type="text" class="mt-1 p-2 w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" id="author" name="author" required value="{{ old('author', $book->author) }}">
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea class="mt-1 p-2 w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" id="description" name="description" rows="3">{{ old('description', $book->description) }}</textarea>
        </div>

        <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-gray-700">Changer l'Image du Livre (facultatif)</label>
            @if($book->image)
                <div class="mb-4">
                    <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->title }}" width="150" class="rounded-md">
                </div>
            @endif
            <input type="file" class="mt-1 p-2 w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" id="image" name="image" accept="image/*">
        </div>

        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">Mettre à Jour</button>
        <a href="{{ route('books.index') }}" class="ml-2 bg-gray-500 text-white py-2 px-4 rounded-md hover:bg-gray-600">Retour</a>
    </form>
</div>
@endsection
