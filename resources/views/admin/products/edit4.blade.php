@extends('layouts.admindashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Modifier le produit : {{ $product->name }}</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name', $product->name) }}" required autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
                        <div class="col-md-6">
                            <textarea id="description" class="form-control" name="description" required>{{ old('description', $product->description) }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Prix') }}</label>
                        <div class="col-md-6">
                            <input id="price" type="number" step="0.01" class="form-control" name="price" value="{{ old('price', $product->price) }}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('Statut') }}</label>
                        <div class="col-md-6">
                            <select id="status" name="status" class="form-control" required>
                                <option value="standard" {{ old('status', $product->status) == 'standard' ? 'selected' : '' }}>Standard</option>
                                <option value="on_sale" {{ old('status', $product->status) == 'on_sale' ? 'selected' : '' }}>En solde</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Catégorie') }}</label>
                        <div class="col-md-6">
                            <select id="category" name="category_id" class="form-control" required>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>
                        <div class="col-md-6">
                            <input id="image" type="file" class="form-control-file" name="image">
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Modifier le produit') }}
                            </button>
                        </div>
                    </div>

