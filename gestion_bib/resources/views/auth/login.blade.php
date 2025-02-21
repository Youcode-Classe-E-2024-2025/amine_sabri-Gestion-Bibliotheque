<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <!-- CDN de Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex justify-center items-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-md w-96">
        <h2 class="text-2xl font-semibold mb-4">Connexion</h2>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email :</label>
                <input type="email" name="email" required class="w-full px-4 py-2 border rounded-md mt-1 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe :</label>
                <input type="password" name="password" required class="w-full px-4 py-2 border rounded-md mt-1 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <button type="submit" class="w-full py-2 px-4 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Se connecter
            </button>
        </form>

        <p class="mt-4 text-center text-sm text-gray-600">
            Pas encore de compte ?
            <a href="{{ route('register') }}" class="text-blue-600 hover:underline">S'inscrire</a>
        </p>
    </div>
</body>
</html>
