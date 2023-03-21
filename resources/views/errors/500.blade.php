@extends('layouts.app')

@section('content')
        <!-- En cas d'erreur 500 on affiche un logo ainsi qu'un petit message à l'utilisateur ( on notera que l'app debug est aussi passé en false (config/app) par messure de securité sur d'autres erreurs )-->
        <div class="text-center">
        <img src="{{ asset("images\\errors\\errors.gif") }}" alt="error logo" width="150" height="150">
        <p class="text-center mt-2">Ah, il semblerait qu'il y ait une petite erreur en interne.</p></div>
@endsection
