@extends('layouts.admindashboard')

@section('content') <!-- On définit la section de notre layout que l'on va remplir avec le contenu de cette vue -->
    <div class="container">
        <h1 class="mb-4">Ajouter un produit</h1> <!-- On affiche un titre -->
        <div class="row">
            <div class="col-md-8">
                <!-- La méthode est "POST" et l'action est définie en utilisant la route "products.store" qui est une action de stockage dans la base de données.-->
                <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                    @csrf <!-- On inclut un token CSRF pour la sécurité -->

                    <!-- Champ de saisie de texte pour le nom -->
                    <div class="form-group">
                        <label for="name">Nom :</label>
                        <input type="text" name="name" id="name"
                            class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required
                            autofocus>
                            <!-- Affichage d'un message d'erreur si la description n'est pas valide -->
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Description :</label>
                        <textarea name="description" id="description" rows="5"
                            class="form-control @error('description') is-invalid @enderror" required>{{ old('description') }}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="price">Prix :</label>
                        <input type="number" name="price" id="price"
                            class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}"
                            min="0" max="999999" pattern="^[0-9]+(\.[0-9]{1,2})?$" step="0.01" required>
                        @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="reference">Reference :</label>
                        <input type="text" name="reference" id="reference"
                            class="form-control @error('reference') is-invalid @enderror" value="{{ old('reference') }}"
                            maxlength="16" required>
                        @error('reference')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="status">Statut :</label>
                        <!-- Création d'une liste déroulante (select) -->
                        <select name="status" id="status" class="form-control @error('status') is-invalid @enderror"
                            required>
                            <option value="" disabled selected>Selectionnez un statut</option>
                            <!-- Option pour le statut "standard", avec la possibilité de le sélectionner si elle était sélectionnée précédemment -->
                            <option value="standard"{{ old('status') === 'standard' ? ' selected' : '' }}>Standard</option>
                            <!-- Option pour le statut "en solde", avec la possibilité de le sélectionner si elle était sélectionnée précédemment -->
                            <option value="on_sale"{{ old('status') === 'on_sale' ? ' selected' : '' }}>En solde
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
                        <!-- Lorsqu'une case est coché, la valeur est rangé dans un tableau -->
                        <!-- Création d'une case à cocher pour la taille XS -->
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="sizes[]" value="XS" id="size-XS">
                            <label class="form-check-label" for="size-XS">XS</label>
                        </div>
                        <!-- Création d'une case à cocher pour la taille S -->
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="sizes[]" value="S" id="size-S">
                            <label class="form-check-label" for="size-S">S</label>
                        </div>
                        <!-- Création d'une case à cocher pour la taille M -->
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="sizes[]" value="m" id="size-m">
                            <label class="form-check-label" for="size-M">M</label>
                        </div>
                        <!-- Création d'une case à cocher pour la taille L -->
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="sizes[]" value="L" id="size-L">
                            <label class="form-check-label" for="size-L">L</label>
                        </div>
                        <!-- Création d'une case à cocher pour la taille XL -->
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="sizes[]" value="XL" id="size-XL">
                            <label class="form-check-label" for="size-XL">XL</label>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="category_id">Catégorie :</label>
                        <!-- Création d'une liste déroulante (select) -->
                        <select name="category_id" id="category_id"
                            class="form-control @error('category_id') is-invalid @enderror" required>
                            <!-- Option par défaut, désactivée et sélectionnée -->
                            <option value="" disabled selected>Selectionnez une catégorie</option>
                            <!-- Boucle parcourant les différentes catégories et créant une option pour chacune -->
                            @foreach ($categories as $category)
                            <!-- Si l'utilisateur a déjà sélectionné cette catégorie, on la pré-sélectionne -->
                                <option
                                    value="{{ $category->id }}"{{ old('category_id') == $category->id ? ' selected' : '' }}>
                                    {{ $category->name }}</option>
                            @endforeach
                        </select>
                         <!-- Affichage d'un message d'erreur si la sélection n'est pas valide -->
                        @error('category_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="published">Apparation en publique :</label>
                        <!-- Création d'une liste déroulante (select) -->
                        <select name="published" id="published"
                            class="form-control @error('published') is-invalid @enderror" required>
                            <option value="" disabled selected>Selectionnez une option</option>
                            <!-- Option pour le'option "Publique", avec la possibilité de le sélectionner si elle était sélectionnée précédemment -->
                            <option value="published"{{ old('published') === 'published' ? ' selected' : '' }}>Publié
                            </option>
                            <!-- Option pour l'option "Non publique", avec la possibilité de le sélectionner si elle était sélectionnée précédemment -->
                            <option value="not_published"{{ old('published') === 'not_published' ? ' selected' : '' }}>Non
                                publié
                            </option>
                        </select>
                        <!-- Affichage d'un message d'erreur si la sélection n'est pas valide -->
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
                                class="custom-file-input @error('image') is-invalid @enderror" required>
                            <label class="custom-file-label" for="image">Choisissez une image</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Ajouter</button> <!-- On ajoute un bouton de soumission du formulaire -->
                </form>
            </div>
        </div>

    </div>
@endsection
