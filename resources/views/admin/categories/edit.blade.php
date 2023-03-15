@extends('layouts.admindashboard')

@section('content')
    <h1>Modifier une catégorie</h1>
    <form method="POST" action="{{ route('categories.update', $category->id) }}">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Nom :</label>
            <input type="text" name="name" id="name" value="{{ $category->name }}">
        </div>
        <div>
            <label for="description">Description :</label>
            <textarea name="description" id="description">{{ $category->description }}</textarea>
        </div>
        <div>
            <button type="submit">Enregistrer</button>
        </div>
    </form>
@endsection
