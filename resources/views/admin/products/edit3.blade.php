@extends('layouts.admindashboard')

@section('content')
    <div class="container">
        <h1 class="mb-4">Modifier un produit : {{ $product->name }}</h1>
        <div class="row">
            <div class="col-md-8">
                <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="name">Nom :</label>
                        <input type="text" name="name" id="name"
                            class="form-control @error('name') is-invalid @enderror" value="{{ old('name'), $product->name }}" required
                            autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Description :</label>
                        <textarea name="description" id="description" rows="5"
                            class="form-control @error('description') is-invalid @enderror" required>{{ old('description'), $product->description }}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="price">Prix :</label>
                        <input type="number" name="price" id="price"
                            class="form-control @error('price') is-invalid @enderror" value="{{ old('price'), $product->price  }}"
                            min="0" step="0.01" required>
                        @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="reference">Reference :</label>
                        <input type="text" name="reference" id="reference"
                            class="form-control @error('reference') is-invalid @enderror" value="{{ old('reference'), $product->reference  }}" maxlength="16" required
                            autofocus>
                        @error('reference')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="status">Statut :</label>
                        <select name="status" id="status" class="form-control @error('status') is-invalid @enderror"
                            required>
                            <option value="" disabled selected>Selectionnez un statut</option>
                            <option value="standard"{{ old('status', $product->status ) === 'standard' ? ' selected' : '' }}>Standard</option>
                            <option value="on_sale"{{ old('status', $product->status ) === 'on_sale' ? ' selected' : '' }}>En solde
                            </option>
                        </select>
                        @error('status')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="category_id">Catégorie :</label>
                        <select name="category_id" id="category_id"
                            class="form-control @error('category_id') is-invalid @enderror" required>
                            <option value="" disabled selected>Selectionnez une catégorie</option>
                            @foreach ($categories as $category)
                                <option
                                    value="{{ $category->id }}"{{ old('category_id', $product->category_id ) == $category->id ? ' selected' : '' }}>
                                    {{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="published">Apparation en publique :</label>
                        <select name="published" id="published" class="form-control @error('published') is-invalid @enderror"
                            required>
                            <option value="" disabled selected>Selectionnez une option</option>
                            <option value="published"{{ old('published', $product->published ) === 'published' ? ' selected' : '' }}>Publqiue</option>
                            <option value="not_published"{{ old('published', $product->published ) === 'not_published' ? ' selected' : '' }}>En solde
                            </option>
                        </select>
                        @error('published')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>



                    <div class="form-group">
                        <label for="image">Image</label>
                        <div class="custom-file" >
                            <input type="file" name="image" id="image"
                                class="custom-file-input @error('image') is-invalid @enderror" required>
                                <label class="custom-file-label" for="image">Choisissez une image</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </form>
            </div>
        </div>

    </div>
@endsection
