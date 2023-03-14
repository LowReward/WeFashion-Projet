<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Page de connexion - Admin</title>
    <link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css') }}">
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex items-center justify-center">
        <div class="max-w-md w-full mx-auto">
            <div class="bg-white p-8 rounded-lg shadow-lg">
                <h1 class="text-center text-2xl font-bold mb-6">Page de connexion - Admin</h1>
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
