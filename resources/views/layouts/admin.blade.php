<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wefashion Page de connexion - Admin</title>
    <link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css') }}">
    <style>
        body {
            background-image: url('{{ asset('images/background.jpg') }}');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body >
    <div class="min-vh-100 d-flex align-items-center justify-content-center">
        <div class="col-md-6 col-lg-4">
            <div class="card border-0 shadow-lg">
                <div class="card-body p-4">
                    <h1 class="text-center text-2xl font-bold mb-4">Page de connexion - Admin</h1>
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</body>
</html>
