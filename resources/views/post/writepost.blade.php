<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Write Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between gap-4">
    <!-- Left: Post Form -->
    <div class="w-2/3">
        <form action="{{ route('post.create') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="title">Title:</label><br />
            <input type="text" name="title" id="title" placeholder="Write title." class="text-black"><br />

            <label for="body">Post:</label><br />
            <textarea name="body" id="body" placeholder="Enter Post" class="text-black"></textarea><br />

            <label>Choose Categories:</label><br>
            @foreach ($categories as $category)
                <input type="checkbox" name="categories[]" value="{{ $category->id }}">
                {{ $category->name }}<br>
            @endforeach

            <br />
            <label for="image">Image:</label><br />
            <input type="file" name="image" id="image"><br/>

            <button class="bg-blue-600 text-white px-2 py-1 rounded hover:bg-blue-700 mt-2" type="submit">
                Submit
            </button>
        </form>
    </div>

    <!-- Right: Add Category Form -->
    <div class="w-1/3 bg-gray-100 dark:bg-gray-700 p-4 rounded">
        <h3 class="text-lg font-semibold mb-2 text-black dark:text-white">Add New Category</h3>
        <form action="{{ route('category.create') }}" method="POST">
            @csrf
            <input class="text-black w-full mb-2 p-1 rounded" type="text" name="name" placeholder="Enter new category">
            <button type="submit" class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700 w-full">
                Add Category
            </button>
        </form>

    </div>
</div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
