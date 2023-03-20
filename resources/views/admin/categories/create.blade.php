@extends('layouts.admindashboard')

@section('content') <!-- On définit la section de notre layout que l'on va remplir avec le contenu de cette vue -->
    <div class="container">
        <h1 class="mb-4">Ajouter une catégorie</h1> <!-- On affiche un titre -->
        <div class="row">
            <div class="col-md-8">
                <form method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data">
                    @csrf <!-- On inclut un token CSRF pour la sécurité -->
                    <div class="form-group">
                        <label for="name">Nom :</label>
                        <input type="text" name="name" id="name"
                            class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required
                            autofocus> <!-- On crée un champ de saisie pour le nom de la catégorie -->
                        @error('name') <!-- Si il y a une erreur sur le champ "name", on l'affiche -->
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Description :</label>
                        <textarea name="description" id="description" rows="5"
                            class="form-control @error('description') is-invalid @enderror" required>{{ old('description') }}</textarea> <!-- Si il y a une erreur sur le champ "name", on l'affiche -->
                        @error('description') <!-- Si il y a une erreur sur le champ "description", on l'affiche -->
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Ajouter</button>  <!-- On ajoute un bouton de soumission du formulaire -->
                </form>
            </div>
        </div>

    </div>
@endsection <!-- On termine la section remplie avec le contenu de cette vue -->
