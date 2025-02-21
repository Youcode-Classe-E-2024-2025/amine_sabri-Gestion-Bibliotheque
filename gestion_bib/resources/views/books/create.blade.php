@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h2 class="text-2xl font-semibold mb-4">Ajouter un Nouveau Livre</h2>

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

    <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Titre du Livre</label>
            <input type="text" class="mt-1 p-2 w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" id="title" name="title" required value="{{ old('title') }}">
        </div>

        <div class="mb-4">
            <label for="author" class="block text-sm font-medium text-gray-700">Auteur</label>
            <input type="text" class="mt-1 p-2 w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" id="author" name="author" required value="{{ old('author') }}">
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea class="mt-1 p-2 w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" id="description" name="description" rows="3">{{ old('description') }}</textarea>
        </div>

        <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-gray-700">Image du Livre (facultatif)</label>
            <input type="file" class="mt-1 p-2 w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" id="image" name="image" accept="image/*">
        </div>

        <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded-md hover:bg-green-600">Ajouter</button>
        <a href="{{ route('books.index') }}" class="ml-2 bg-gray-500 text-white py-2 px-4 rounded-md hover:bg-gray-600">Retour</a>
    </form>
</div>
@endsection
