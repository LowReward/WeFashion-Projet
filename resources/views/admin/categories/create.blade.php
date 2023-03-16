@extends('layouts.admindashboard')

@section('content')
    <h1>Ajouter une catégorie</h1>

    <form method="POST" action="{{ route('categories.store') }}">
        @csrf

        <div>
            <label for="name">Nom de la catégorie :</label>
            <input type="text" name="name" id="name" required>
        </div>

        <div>
            <label for="description">Description :</label>
            <textarea name="description" id="description" required></textarea>
        </div>

        <div>
            <button type="submit">Ajouter</button>
        </div>
    </form>
@endsection

