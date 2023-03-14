@extends('layouts.admindashboard')

@section('content')
    <h1>dashboard</h1>
    <table class="table table-striped table-hover">
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
                    <a href="#">Modifier</a>
                    <a href="#">Supprimer</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
