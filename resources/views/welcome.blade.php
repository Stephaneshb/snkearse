 <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container text-center mt-5">
        <h1>Bienvenue sur notre site</h1>
        @auth
            <p>Bonjour, {{ Auth::user()->name }} !</p>
            <a href="{{ url('/sneakers') }}" class="btn btn-primary">Voir les chaussures</a>
        @else
            <p>Veuillez vous connecter ou vous inscrire pour accéder à nos produits.</p>
            <a href="{{ url('/login') }}" class="btn btn-success">Connexion</a>
            <a href="{{ url('/register') }}" class="btn btn-warning">Inscription</a>
        @endauth
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>