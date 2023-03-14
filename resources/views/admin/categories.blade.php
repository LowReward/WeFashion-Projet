@extends('layouts.admindashboard')

@section('content')
    <h1>Catégories</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->description }}</td>
                <td>
                    <a href="#">Modifier</a>
                    <a href="#">Supprimer</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
