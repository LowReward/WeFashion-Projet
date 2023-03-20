<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>

<body class="d-flex flex-column min-vh-100">
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container justify-content-center">
            <a class="navbar-brand" href="#" style="color: #66EB9A">WeFashion</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.products') }}">Produits</a>
                    </li>
                    <li class="nav-item mr-3">
                        <a class="nav-link" href="{{ route('admin.categories') }}">Catégories</a>
                    </li>
                </ul>
                <a class="navbar-brand mx-auto" href="/"><i class="bi bi-house-door-fill"></i></a>
            </div>
        </div>
    </nav>
        </header>




    <div class="container mt-3">
        @yield('content')
    </div>


    <footer class="bg-light py-3 mt-auto">
        <div class="container">
            <span class="text-muted">Vous vous trouvez actuellement sur votre page administrateur.</span>
        </div>
    </footer>



    <!-- JS de jQuery (requis pour les plugins de Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>

    <!-- JS de Popper.js (requis pour les plugins de Bootstrap) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

    <!-- JS de Bootstrap -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script>
        document.querySelectorAll('[id^="delete-product-"]').forEach(function(button) {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                if (confirm("Êtes-vous sûr de vouloir supprimer ce produit ?")) {
                    // Si l'utilisateur confirme la suppression, soumettre le formulaire
                    event.target.closest('form').submit();
                }
            });
        });
    </script>
</body>

</html>
