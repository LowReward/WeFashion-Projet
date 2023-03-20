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
    <h1>Liste des produits</h1>
    <!-- Bouton pour ajouter un article -->
    <div class="d-flex justify-content-end">
        <a href="/admin/products/create" class="btn btn-primary d-flex ml-auto">Ajouter un produit</a>
    </div>

    <!-- Tableau pour afficher la liste des articles -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Catégorie</th>
                <th>Prix</th>
                <th>Etat</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- Boucle pour afficher chaque article -->
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->price }} €</td>
                    <!-- la colonne status comprend les valeurs on_sale/standard, donc on traduit ceci en Français à l'affichage-->
                    <td>
                        @if ($product->status == 'on_sale')
                            En solde
                        @else
                            Standard
                        @endif
                    </td>
                    <td>
                        <!-- Bouton pour modifier la catégorie -->
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary ">Modifier</a>
                        <!-- Formulaire pour supprimer la catégorie -->
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
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
    <!-- Pagination en dessous des produits-->
    <div class="d-flex justify-content-center">
        {{ $products->links('') }}
    </div>
@endsection
