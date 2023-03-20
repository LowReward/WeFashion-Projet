@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="border border-dark img-fluid">

        </div>
        <div class="col-md-6">
            <h2>{{ $product->name }}</h2>
            <p>Prix : {{ $product->price }} €</p>
            <form action="#" method="POST">
                <div class="form-group ">
                    <label for="size">Taille :</label>
                    <select name="size" id="size" class="form-control mb-3">
                        @foreach(explode(',', $product->sizes) as $size)
                            <option value="{{ $size }}">{{ $size }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="button" class="btn btn-primary ">Acheter</button>
            </form>
        </div>
    </div>
    <p class="mt-3">{{ $product->description }}</p>
@endsection
