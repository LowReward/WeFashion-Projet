@extends('layouts.admindashboard')

@section('content')
    <div class="container">
        <h1 class="mb-4">Ajouter une catégorie</h1>
        <div class="row">
            <div class="col-md-8">
                <form method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nom :</label>
                        <input type="text" name="name" id="name"
                            class="form-control @error('name') is-invalid @enderror"
                            value="{{  old('name') }}" required autofocus>
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

                    <button type="submit" class="btn btn-primary mt-3">Ajouter</button>
                </form>
            </div>
        </div>

    </div>
@endsection
