@extends('layouts.admindashboard')

@section('content')
    <div class="container">
        <!-- Page à celle de création, les champs ne sont plus forcément obligatoire -->
        <h1 class="mb-4">Modifier un produit : {{ $product->name }}</h1>
        <div class="row">
            <div class="col-md-8">
                <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Nom :</label>
                        <input type="text" name="name" id="name"
                            class="form-control @error('name') is-invalid @enderror"
                            value="{{ $product->name, old('name') }}" required autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Description :</label>
                        <textarea name="description" id="description" rows="5"
                            class="form-control @error('description') is-invalid @enderror" required>{{ $product->description, old('description') }}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="price">Prix :</label>
                        <input type="number" name="price" id="price"
                            class="form-control @error('price') is-invalid @enderror"
                            value="{{ $product->price, old('price') }}" min="0" max="999999" pattern="^[0-9]+(\.[0-9]{1,2})?$" step="0.01" pattern="^[0-9]+(\.[0-9]{1,2})?$" required>
                        @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="reference">Reference :</label>
                        <input type="text" name="reference" id="reference"
                            class="form-control @error('reference') is-invalid @enderror"
                            value="{{ $product->reference, old('reference') }}" maxlength="16" required>
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
                            <option
                                value="standard"{{ old('status', $product->status) === 'standard' ? ' selected' : '' }}>
                                Standard</option>
                            <option value="on_sale"{{ old('status', $product->status) === 'on_sale' ? ' selected' : '' }}>
                                En solde
                            </option>
                        </select>
                        @error('status')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="sizes">Tailles disponibles :</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="sizes[]" value="XS" id="size-XS" {{ in_array('XS', explode(',', $product->sizes)) ? 'checked' : '' }}>
                            <label class="form-check-label" for="size-XS">XS</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="sizes[]" value="S" id="size-S" {{ in_array('S', explode(',', $product->sizes)) ? 'checked' : '' }}>
                            <label class="form-check-label" for="size-S">S</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="sizes[]" value="M" id="size-M" {{ in_array('M', explode(',', $product->sizes)) ? 'checked' : '' }}>
                            <label class="form-check-label" for="size-M">M</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="sizes[]" value="L" id="size-L" {{ in_array('L', explode(',', $product->sizes)) ? 'checked' : '' }}>
                            <label class="form-check-label" for="size-L">L</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="sizes[]" value="XL" id="size-XL" {{ in_array('XL', explode(',', $product->sizes)) ? 'checked' : '' }}>
                            <label class="form-check-label" for="size-XL">XL</label>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="category_id">Catégorie :</label>
                        <select name="category_id" id="category_id"
                            class="form-control @error('category_id') is-invalid @enderror" required>
                            <option value="" disabled selected>Selectionnez une catégorie</option>
                            @foreach ($categories as $category)
                                <option
                                    value="{{ $category->id }}"{{ old('category_id', $product->category_id) == $category->id ? ' selected' : '' }}>
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
                        <select name="published" id="published"
                            class="form-control @error('published') is-invalid @enderror" required >
                            <option value="" disabled selected>Selectionnez une option</option>
                            <option
                                value="published"{{ old('published', $product->published) === 'published' ? ' selected' : '' }}>
                                Publique</option>
                            <option
                                value="not_published"{{ old('published', $product->published) === 'not_published' ? ' selected' : '' }}>
                                Non publique
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
                        <div class="custom-file">
                            <input type="file" name="image" id="image"
                                class="custom-file-input @error('image') is-invalid @enderror">
                            <label class="custom-file-label" for="image">Choisissez une image</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Modifier</button>
                </form>
            </div>
        </div>

    </div>
@endsection
