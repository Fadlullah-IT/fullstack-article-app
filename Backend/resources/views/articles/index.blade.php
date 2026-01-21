<x-layout title="Articles">
    <h1 class="text-2xl font-bold text-green-700 mb-6">Articles</h1>

    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
        @foreach (range(1, 6) as $article)
            <div class="bg-white shadow rounded-lg p-4">
                <h2 class="text-lg font-semibold text-green-700">Article {{ $article }}</h2>
                <p class="text-gray-600 text-sm mt-2">This is a short description for Article {{ $article }}.</p>
                <a href="{{ route('articles.show', $article) }}"
                    class="inline-block mt-4 text-green-600 hover:underline">Read More</a>
            </div>
        @endforeach
    </div>
</x-layout>
