<!-- Template pour le dashboard d'administration -->
@extends('layouts.admindashboard')


@section('content')
    <!-- Affichage d'un message de succès s'il existe -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <!-- Titre de la page -->
    <h1>Liste des catégories</h1>
    <!-- Bouton pour ajouter une catégorie -->
    <div class="d-flex justify-content-end">
        <a href="/admin/categories/create" class="btn btn-primary d-flex ml-auto">Ajouter une categorie</a>
    </div>
    <!-- Tableau pour afficher la liste des catégories -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- Boucle pour afficher chaque catégorie -->
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>
                    <td>
                        <!-- Bouton pour modifier la catégorie -->
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary">Modifier</a>

                        <!-- Formulaire pour supprimer la catégorie -->
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline">
                            @csrf
                            <!-- On inclut un token CSRF pour la sécurité -->
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" id="delete-product-">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
