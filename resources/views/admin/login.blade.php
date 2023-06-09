<!-- Template d'administration -->
@extends('layouts.admin')

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-10">
                <!-- On place le tout dans une carte centré pour faire quelque chose de basique mais 'propre' -->
                <div class="card">
                    <div class="card-header">{{ __("Connexion à l'administration") }}</div>
                    <!-- Affichage d'un message d'erreur 's'il existe -->
                    <div class="card-body">
                        @if (session('erreur'))
                            <div class="alert alert-danger">
                                {{ session('erreur') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('admin.login') }}">
                            @csrf


                            <div class="form-group row mt-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Adresse email') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Mot de passe') }}</label>

                                <div class="col-md-6 ">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0 mt-3">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Connexion') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
