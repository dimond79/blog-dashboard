<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2>Post List</h2>
                    {{-- {{$posts}} --}}

                </div>
                <br/>
                @foreach ($posts as $post)
                <div class="my-4 p-6 text-red-900  bg-blue-100" >
                    <a href="{{ route('post.show', $post->slug) }}">
                        <h2>{{ $post->title }}</h2>
                    </a><br />
                </div>
                @endforeach

            </div>
        </div>
    </div>
</x-app-layout>
