@extends('layouts.admindashboard')

@section('content')
    <h1>dashboard</h1>
    <li><a href="/admin/products/create" class="btn btn-primary">Ajouter une catégorie</a></li>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Prix</th>
                <th>Catégorie</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }} €</td>
                <td>{{ $product->category }}</td>
                <td>
                    <a href="{{ route('products.edit', $product->id) }}"class="btn btn-primary ">Modifier</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
