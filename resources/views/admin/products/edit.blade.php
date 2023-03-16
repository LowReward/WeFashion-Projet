@extends('layouts.admindashboard')

@section('content')
    <h1>Modifier le produit</h1>
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Nom :</label>
            <input type="text" name="name" value="{{ $product->name }}" class="form-control">
        </div>
        <div>
            <label for="description">Description :</label>
            <textarea name="description" class="form-control">{{ $product->description }}</textarea>
        </div>
        <div>
            <label for="price">Prix :</label>
            <input type="number" name="price" step="0.01" value="{{ $product->price }}" class="form-control">
        </div>
        <div>
            <label for="category_id">Catégorie :</label>
            <select name="category_id" class="form-control">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if($category->id === $product->category_id) selected @endif>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="état">état :</label>
            <select name="état" class="form-control">
                <option value="standard" {{ $product->état == 'standard' ? 'selected' : '' }}>Standard</option>
                <option value="en solde" {{ $product->état == 'en solde' ? 'selected' : '' }}>En solde</option>
            </select>
        </div>
        <div>
            <label for="image">Image :</label>
            <input type="file" name="image" class="form-control-file">
        </div>
        <button type="submit" class="btn btn-outline-success">Modifier</button>
    </form>
@endsection
