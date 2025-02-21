@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Modifier le Livre</h2>

    @if($errors->any())
        <div class="alert alert-danger">
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

        <div class="mb-3">
            <label for="title" class="form-label">Titre du Livre</label>
            <input type="text" class="form-control" id="title" name="title" required value="{{ old('title', $book->title) }}">
        </div>

        <div class="mb-3">
            <label for="author" class="form-label">Auteur</label>
            <input type="text" class="form-control" id="author" name="author" required value="{{ old('author', $book->author) }}">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $book->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Changer l'Image du Livre (facultatif)</label>
            @if($book->image)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->title }}" width="150">
                </div>
            @endif
            <input type="file" class="form-control" id="image" name="image" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">Mettre à Jour</button>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Retour</a>
    </form>
</div>
@endsection
