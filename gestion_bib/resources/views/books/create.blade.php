@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Ajouter un Nouveau Livre</h2>

    <!-- Afficher les erreurs de validation -->
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Titre du Livre</label>
            <input type="text" class="form-control" id="title" name="title" required value="{{ old('title') }}">
        </div>

        <div class="mb-3">
            <label for="author" class="form-label">Auteur</label>
            <input type="text" class="form-control" id="author" name="author" required value="{{ old('author') }}">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image du Livre (facultatif)</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*">
        </div>

        <button type="submit" class="btn btn-success">Ajouter</button>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Retour</a>
    </form>
</div>
@endsection
