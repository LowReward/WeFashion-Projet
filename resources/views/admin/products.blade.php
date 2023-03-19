@extends('layouts.admindashboard')

    @section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <h1>Liste des produits</h1>
    <div class="d-flex justify-content-end">
    <a href="/admin/products/create" class="btn btn-primary d-flex ml-auto">Ajouter un produit</a>
    </div>
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
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category->name }}</td>
                <td>{{ $product->price }} €</td>
                <td>{{ $product->status }}</td>
                <td>
                    <a href="{{ route('products.edit', $product->id) }}"class="btn btn-primary ">Modifier</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" id="delete-product-">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $products->links('') }}
    </div>
@endsection
