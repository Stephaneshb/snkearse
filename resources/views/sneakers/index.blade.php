<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Sneakers</title>
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
                        <span class="font-bold">Shop Ta Steph

                        </span>
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
        <h1 class="text-2xl font-bold mb-6">
            Bonjour, {{ Auth::user()->name }}
        </h1><form action="{{ route('logout') }}" method="POST" style="display: inline;">
    @csrf
</div>

    
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($sneakers as $sneaker)
                <div class="border border-gray-300 rounded-lg shadow-lg bg-white p-4">
                    <div class="relative">
                        <img src="{{ $sneaker['attributes']['image']['small'] ?? 'https://via.placeholder.com/320x250' }}" 
                             alt="{{ $sneaker['attributes']['name'] }}" 
                             class="w-full object-cover rounded-t-md">
                        <div class="absolute top-0 left-0 bg-blue-500 text-white px-4 py-1 rounded-br-lg">
                            {{ $sneaker['attributes']['retailPrice'] ?? 'Non spécifié' }} €
                        </div>
                    </div>
                    <h4 class="mt-4 text-lg font-semibold uppercase text-gray-800 text-center">
                        {{ $sneaker['attributes']['name'] }}
                    </h4>
                    <div class="text-center text-sm text-gray-600 uppercase mt-1">
                        {{ $sneaker['attributes']['brand'] }}
                    </div>
                    <div class="text-center mt-4">
                        <a href="#" class="inline-block bg-blue-500 hover:bg-blue-600 text-white text-sm uppercase px-4 py-2 rounded">
                            View
                        </a>
                        <br>
                        <form action="{{ route('wishlist.add') }}" method="POST" style="display: inline;">
        @csrf
        <input type="hidden" name="sneaker_id" value="{{ $sneaker['id'] }}">
        <input type="hidden" name="name" value="{{ $sneaker['attributes']['name'] }}">
        <input type="hidden" name="image" value="{{ $sneaker['attributes']['image']['small'] ?? '' }}">
        <input type="hidden" name="price" value="{{ $sneaker['attributes']['retailPrice'] ?? '' }}">

        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">
            Ajouter à la Wish List
        </button>
    </form>
                        
                    </div>
                    <div class="mt-4 text-center bg-gray-200 py-2 text-sm font-medium">
                        ID: {{ $sneaker['id'] }}
                    </div>
                </div>
            @endforeach
        </div>

        <div class="flex justify-between items-center mt-8">
            <a href="?page={{ $pagination['page'] - 1 }}" 
               class="text-blue-500 hover:underline" 
               @if($pagination['page'] <= 1) style="visibility: hidden" @endif>
                Précédent
            </a>
            <span class="text-gray-700">
                Page {{ $pagination['page'] }} sur {{ $pagination['pageCount'] }}
            </span>
            <a href="?page={{ $pagination['page'] + 1 }}" 
               class="text-blue-500 hover:underline" 
               @if($pagination['page'] >= $pagination['pageCount']) style="visibility: hidden" @endif>
                Suivant
            </a>
        </div>
    </div>
<script>
    const btn = document.querySelector('.mobile-menu-button');
    const menu = document.querySelector('.mobile-menu');
    btn.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    });
</script>
</body>
</html>

