<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center h-screen bg-gray-100">

    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold text-center mb-6">Inscription</h2>

        @if(session('success'))
            <div class="mb-4 text-green-600 bg-green-100 p-2 rounded">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('register.process') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nom :</label>
                <input type="text" name="name" required class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:ring focus:ring-blue-200">
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email :</label>
                <input type="email" name="email" required class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:ring focus:ring-blue-200">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe :</label>
                <input type="password" name="password" required class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:ring focus:ring-blue-200">
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmer le mot de passe :</label>
                <input type="password" name="password_confirmation" required class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:ring focus:ring-blue-200">
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition">S'inscrire</button>
        </form>

        <p class="mt-4 text-center text-sm text-gray-600">
            Déjà un compte ?
            <a href="{{ route('login.form') }}" class="text-blue-600 hover:underline">Se connecter</a>
        </p>
    </div>

</body>
</html>
