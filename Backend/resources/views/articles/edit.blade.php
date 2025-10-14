<x-layout title="Edit Article">
    <h1 class="text-2xl font-bold mb-4">Edit Article</h1>

    <form class="bg-white p-6 rounded shadow-md space-y-4">
        <div>
            <label class="block text-sm font-bold mb-1">Title</label>
            <input type="text" class="w-full border rounded px-3 py-2" value="Example Article">
        </div>

        <div>
            <label class="block text-sm font-bold mb-1">Content</label>
            <textarea class="w-full border rounded px-3 py-2">Example article content...</textarea>
        </div>

        <button class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
            Update Article
        </button>
    </form>
</x-layout>
