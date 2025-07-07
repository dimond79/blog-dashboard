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
                    <form action="{{ route('post.create') }}" method="POST">
                        @csrf
                        <label for="title">Title:</label><br />
                        <input type="text" name="title" id="title" placeholder="Write title."
                            class="text-black"><br />
                        {{-- <label for="slug">Slug:</label><br/>
                        <textarea name="slug" id="slug" placeholder="Enter URL slug." class="text-black"></textarea><br/> --}}
                        <label for="body">Post:</label><br />
                        <textarea name="body" id="body" placeholder="Enter Post" class="text-black"></textarea><br />
                        <label>Choose Categories:</label><br>
                        @foreach ($categories as $category)
                            <input type="checkbox" name="categories[]" value="{{ $category->id }}">
                            {{ $category->name }}<br>
                        @endforeach
                        <br/>
                        <button type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
