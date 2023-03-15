@extends('layouts.admindashboard')

@section('content')
    <h1>Modifier le produit</h1>
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Nom :</label>
            <input type="text" name="name" value="{{ $product->name }}">
        </div>
        <div>
            <label for="description">Description :</label>
            <textarea name="description">{{ $product->description }}</textarea>
        </div>
        <div>
            <label for="price">Prix :</label>
            <input type="number" name="price" step="0.01" value="{{ $product->price }}">
        </div>
        <div>
            <label for="category_id">Catégorie :</label>
            <select name="category_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if($category->id === $product->category_id) selected @endif>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="image">Image :</label>
            <input type="file" name="image">
        </div>
        <button type="submit">Modifier</button>
    </form>
@endsection
