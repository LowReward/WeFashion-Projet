@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <!-- Affichage de l'image' du produit, récupérée à partir de la propriété "image" du produit -->
            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="border border-dark img-fluid" style="max-width: 500px; ">

        </div>
        <div class="col-md-6">
            <!-- Affichage du nom du produit, récupérée à partir de la propriété "name" du produit -->
            <h2>{{ $product->name }}</h2>
            <p>Prix : {{ $product->price }} €</p>
            <form action="#" method="POST">
                <div class="form-group ">
                    <label for="size">Taille :</label>
                    <!-- Liste déroulante contenant les tailles séléctionnées par l'admin -->
                    <select name="size" id="size" class="form-control mb-3">
                        @foreach(explode(',', $product->sizes) as $size)
                            <option value="{{ $size }}">{{ $size }}</option>
                        @endforeach
                    </select>
                </div>
                <!-- Bouton d'achat non configuré -->
                <button type="button" class="btn btn-primary ">Acheter</button>
            </form>
        </div>
    </div>
    <!-- Affichage de la description du produit, récupérée à partir de la propriété "description" du produit -->
    <p class="mt-3">{{ $product->description }}</p>
@endsection
