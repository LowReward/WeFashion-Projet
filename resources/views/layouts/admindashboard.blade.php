<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css') }}">

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light ">
        <!--<div class="container justify-content-center"></div>-->
        <div class="container justify-content-center">
        <a class="navbar-brand  h1 mx-auto my-auto" href="#" style="color: #66EB9A">WeFashion</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarNav">
            <ul class="navbar-nav ">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.products') }}">Produits</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.categories') }}">Catégories</a>
                </li>
                <li class="nav-item">

                    <a class="nav-link " href="/admin/logout">Déconnexion</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container mt-3">
        @yield('content')
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-UIvshO+aCUegOIGgbCr/o1x95ykmvrrfBc0+bZgATp94bGhZ3qHDe5U6e5U6ejAd" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZEQ6Cxs2M9Fci/1jKxiIbR" crossorigin="anonymous"></script>
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
    <footer class="footer mt-auto py-3 bg-light fixed-bottom">
        <div class="container">
          <span class="text-muted">Vous vous trouvez actuellement sur votre page administrateur.</span>
        </div>
      </footer>

</body>

</html>
