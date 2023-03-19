@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="d-flex justify-content-between mb-3">
            <h2>Liste des produits</h2>
            <div class="ml-auto">
                <p>{{ $counter->count() }} produits</p>
            </div>
        </div>
        @foreach($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <a href="{{ route('products.show', $product->id) }}">
                        <img class="card-img-top img-fluid" src="{{ asset($product->image) }}" alt="{{ $product->name }}" style="width: 100%; height: 250px; object-fit: cover;">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->price }}€</p>
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">Voir le produit</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center">
        {{ $products->links('') }}
    </div>
@endsection
