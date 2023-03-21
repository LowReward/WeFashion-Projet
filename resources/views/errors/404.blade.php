
@extends('layouts.app')


@section('content')
        <!-- En cas d'erreur 404 on affiche un logo ainsi qu'un petit message à l'utilisateur ( on notera que l'app debug est aussi passé en false (config/app) par messure de securité sur d'autres erreurs )-->
        <div class="text-center">
        <img src="{{ asset("images\\errors\\errors.gif") }}" alt="error logo" width="150" height="150">
        <p class="text-center mt-2">Oups, la page que vous recherchez n'existe pas/plus.</p></div>
@endsection
