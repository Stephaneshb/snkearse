<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md bg-white rounded-lg shadow-md p-8">
        <h1 class="text-2xl font-bold text-center uppercase mb-6 text-gray-800">Inscription</h1>

        <form action="{{ url('/register') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="name" class="block text-sm font-bold text-gray-700 uppercase mb-2">
                    Nom :
                </label>
                <input type="text" id="name" name="name" placeholder="Entrez votre nom"
                       class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
            </div>

            <div>
                <label for="email" class="block text-sm font-bold text-gray-700 uppercase mb-2">
                    Email :
                </label>
                <input type="email" id="email" name="email" placeholder="Entrez votre email"
                       class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
            </div>

            <div>
                <label for="password" class="block text-sm font-bold text-gray-700 uppercase mb-2">
                    Mot de passe :
                </label>
                <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe"
                       class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-bold text-gray-700 uppercase mb-2">
                    Confirmer le mot de passe :
                </label>
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirmez votre mot de passe"
                       class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
            </div>

            <button type="submit"
                    class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold uppercase py-2 rounded-md transition duration-200">
                S'inscrire
            </button>
        </form>

        <p class="text-center text-gray-700 mt-4">
            Déjà inscrit ? 
            <a href="{{ route('login') }}" class="text-blue-500 hover:underline">
                Connectez-vous
            </a>
        </p>
    </div>

</body>
</html>
