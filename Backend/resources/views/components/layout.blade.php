<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Article App' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-green-50 text-gray-800">

    <!-- Navbar -->
    <nav class="bg-green-600 text-white shadow">
        <div class="max-w-6xl mx-auto px-4 py-4 flex justify-between items-center">
            <a href="{{ route('articles.index') }}" class="text-lg font-bold">Article App</a>
            <div class="space-x-4">
                <a href="{{ route('articles.index') }}" class="hover:underline">Home</a>
                <a href="{{ route('articles.create') }}"
                    class="bg-white text-green-600 px-3 py-1 rounded hover:bg-green-100">New Article</a>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <main class="max-w-6xl mx-auto px-4 py-8">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="bg-green-600 text-white text-center py-4 mt-8">
        &copy; {{ date('Y') }} Fadlullah. All rights reserved.
    </footer>
</body>

</html>
