@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="border border-dark" style="width: 550px; height: 550px; object-fit: cover;">
        </div>
        <div class="col-md-6">
            <h2>{{ $product->name }}</h2>
            <p>Prix : {{ $product->price }} €</p>
            <form action="#" method="POST">
                <div class="form-group ">
                    <label for="size">Taille :</label>
                    <select name="size" id="size" class="form-control mb-3">
                        <option value="XS">XS</option>
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                    </select>
                </div>
                <button type="button" class="btn btn-primary ">Acheter</button>
            </form>
        </div>
    </div>
    <p class="mt-3">{{ $product->description }}</p>
@endsection
