<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>WeFashion</title>
    <link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css') }}">
    <!-- Option 1: Include in HTML -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light ">
        <!--<div class="container justify-content-center"></div>-->
        <div class="container justify-content-center">
        <a class="navbar-brand  h1 mx-auto my-auto" href="{{ route('products.index') }}" style="color: #66EB9A">WeFashion</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarNav">
            <ul class="navbar-nav ">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('products.solde') }}">Solde</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('products.homme') }}">Homme</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('products.femme') }}">Femme</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')

    </div>



    <footer class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>Informations</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="link-secondary text-decoration-none">Mentions légales</a></li>
                        <li><a href="#" class="link-secondary text-decoration-none">Presse</a></li>
                        <li><a href="#" class="link-secondary text-decoration-none">Fabrication</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Service client</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="link-secondary text-decoration-none">Contactez-nous</a></li>
                        <li><a href="#" class="link-secondary text-decoration-none">Livraison & Retour</a></li>
                        <li><a href="#" class="link-secondary text-decoration-none">Conditions de vente</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Réseaux sociaux</h5>
                    <ul class="list-unstyled">
                        <li><a href="https://www.facebook.com" class="bi bi-facebook link-secondary text-decoration-none"> Facebook</a></li>
                        <li><a href="#" class="bi bi-instagram link-secondary text-decoration-none "> Instagram</a></li>
                        <li><a href="#" class="link-secondary text-decoration-none">Inscrivez vous à la newsletter</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- JS de jQuery (requis pour les plugins de Bootstrap) -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>

<!-- JS de Popper.js (requis pour les plugins de Bootstrap) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

<!-- JS de Bootstrap -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
