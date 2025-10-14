<x-layout title="Edit Article">
    <h1 class="text-2xl font-bold text-green-700 mb-6">Edit Article {{ $id }}</h1>

    <form class="bg-white shadow rounded-lg p-6 space-y-4">
        <div>
            <label class="block font-medium text-gray-700">Title</label>
            <input type="text" value="Sample Title"
                class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-green-500 focus:ring-green-500">
        </div>

        <div>
            <label class="block font-medium text-gray-700">Content</label>
            <textarea rows="5"
                class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-green-500 focus:ring-green-500">Sample content...</textarea>
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            Update Article
        </button>
    </form>
</x-layout>
