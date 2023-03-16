
@extends('layouts.admindashboard')

@section('content')

<h1>Ajouter un produit</h1>
<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" name="name" id="name" required/>
    </div>
    <div class="form-group">
        <label for="description">Description:</label>
        <textarea class="form-control" name="description" id="description" required></textarea>
    </div>
    <div class="form-group">
        <label for="price" >Price:</label>
        <input type="number" class="form-control" name="price" id="price" step="any" required/>
    </div>
    <div class="form-group">
        <label for="category_id">Category:</label>
        <select class="form-control" name="category_id"  id="category_id" required>
            @foreach($categories as $category)
                <option value="{{ $category->name }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <div></div>
    <!--<div>
        <label for="image">Image du produit</label>
        <input type="file" id="image" name="image">
    </div>-->
    <div>
    <button type="submit" class="btn btn-primary">Add Product</button>
    </div>
</form>
@endsection
