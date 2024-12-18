<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma Wish List</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<nav class="bg-gray-100">
    <div class="max-w-6xl mx-auto px-4">
        <div class="flex justify-between items-center">

            <div class="flex space-x-4">
                <div>
                    <a href="{{ route('sneakers.index') }}" class="flex items-center py-5 px-2 text-gray-700 hover:text-gray-900">
                        <svg class="h-6 w-6 mr-1 text-blue-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                        </svg>
                        <span class="font-bold">Sneakers Shop</span>
                    </a>
                </div>

                <div class="hidden md:flex items-center space-x-1">
                    <a href="{{ route('sneakers.index') }}" class="py-5 px-3 text-gray-700 hover:text-gray-900">Accueil</a>
                    <a href="{{ route('wishlist.index') }}" class="py-5 px-3 text-gray-700 hover:text-gray-900">Ma Wish List</a>
                </div>
            </div>

            <div class="hidden md:flex items-center space-x-1">
                @auth
                
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="py-2 px-3 bg-red-500 hover:bg-red-600 text-white rounded transition duration-300">
                            Déconnexion
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="py-5 px-3 text-gray-700 hover:text-gray-900">Connexion</a>
                    <a href="{{ route('register') }}" class="py-2 px-3 bg-yellow-400 hover:bg-yellow-300 text-yellow-900 hover:text-yellow-800 rounded transition duration-300">
                        Inscription
                    </a>
                @endauth
            </div>

            <div class="md:hidden flex items-center">
                <button class="mobile-menu-button">
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div class="mobile-menu hidden md:hidden">
        <a href="{{ route('sneakers.index') }}" class="block py-2 px-4 text-sm hover:bg-gray-200">Accueil</a>
        <a href="{{ route('wishlist.index') }}" class="block py-2 px-4 text-sm hover:bg-gray-200">Ma Wish List</a>
        @auth
            <form action="{{ route('logout') }}" method="POST" class="block py-2 px-4 text-sm hover:bg-gray-200">
                @csrf
                <button type="submit" class="w-full text-left">Déconnexion</button>
            </form>
        @else
            <a href="{{ route('login') }}" class="block py-2 px-4 text-sm hover:bg-gray-200">Connexion</a>
            <a href="{{ route('register') }}" class="block py-2 px-4 text-sm hover:bg-gray-200">Inscription</a>
        @endauth
    </div>
</nav>

<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-6">Ma Wish List</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($wishlists as $wishlist)
                <div class="border border-gray-300 rounded-lg shadow-lg bg-white p-4">
                    <img src="{{ $wishlist->image }}" alt="{{ $wishlist->name }}" class="w-full object-cover rounded-t-md">
                    <h4 class="mt-4 text-lg font-semibold uppercase text-gray-800 text-center">
                        {{ $wishlist->name }}
                    </h4>
                    <div class="text-center text-gray-600 mt-1">
                        {{ $wishlist->price ?? 'Prix non spécifié' }} €
                    </div>
                    <div class="text-center mt-4">
                        <form action="{{ route('wishlist.remove') }}" method="POST">
                            @csrf
                            <input type="hidden" name="sneaker_id" value="{{ $wishlist->sneaker_id }}">
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">
                                Retirer de la Wish List
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
