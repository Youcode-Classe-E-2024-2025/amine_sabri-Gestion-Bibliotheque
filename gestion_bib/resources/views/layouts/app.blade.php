<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de Livres</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body class="bg-gray-100">

<!-- Navbar -->
<nav class="bg-gray-900 text-white">
    <div class="container mx-auto px-4 py-3 flex justify-between items-center">
        <a href="{{ route('books.index') }}" class="text-xl font-bold"><i class="bi bi-book-half"></i> BookSphere</a>
        
        <button id="menu-btn" class="block md:hidden text-white focus:outline-none">
            <i class="bi bi-list text-2xl"></i>
        </button>

        <ul id="menu" class="hidden md:flex space-x-6  items-center">
            @auth
                <li><a href="{{ route('books.index') }}" class="hover:text-gray-300">Liste des Livres</a></li>
                @if(auth()->check() && auth()->user()->role == "admin")
                    <li><a href="{{ route('books.create') }}" class="hover:text-gray-300">Ajouter un Livre</a></li>
                @endif
                <li><a href="{{ route('loans.index') }}" class="hover:text-gray-300">Livre Reservé</a></li>
                <!-- <li class="text-white-400 border-2 border-white px-5 rounded-md">{{ auth()->user()->name }}</li> -->
                <li>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="ml-4 bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-md">
                            {{ auth()->user()->name }}
                            <i class="bi bi-box-arrow-right"></i>
                        </button>
                    </form>
                </li>
            @else
                <li><a href="{{ route('login.form') }}" class="hover:text-gray-300">Connexion</a></li>
                <li><a href="{{ route('register.form') }}" class="hover:text-gray-300">S'inscrire</a></li>
            @endauth
        </ul>
    </div>
</nav>

<!-- Content -->
<div class="container mx-auto px-4 py-6">
    @yield('content')
</div>

<!-- JS pour le menu responsive -->
<script>
    document.getElementById('menu-btn').addEventListener('click', function() {
        document.getElementById('menu').classList.toggle('hidden');
    });
</script>

</body>
</html>
