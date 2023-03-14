<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>WeFashion</title>
    <link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css') }}">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('products.index') }}">WeFashion</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarNav">
            <ul class="navbar-nav ">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('products.homme') }}">Homme</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('products.femme') }}">Femme</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('products.solde') }}">Solde</a>
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
                        <li><a href="#">Mentions légales</a></li>
                        <li><a href="#">Presse</a></li>
                        <li><a href="#">Fabrication</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Service client</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Contactez-nous</a></li>
                        <li><a href="#">Livraison & Retour</a></li>
                        <li><a href="#">Conditions de vente</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Réseaux sociaux</h5>
                    <ul class="list-unstyled">
                        <li><a href="#"><i class="fab fa-facebook"></i> Facebook</a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i> Instagram</a></li>
                        <li><a href="#">Inscrivez vous à la newsletter</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/jquery.slim.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>
