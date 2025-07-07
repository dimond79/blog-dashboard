
<div class="max-w-3xl mx-auto mt-10 p-6 bg-blue-100 shadow-lg rounded-xl border border-gray-200">
    <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $post->title }}</h1>

    <div class="mb-4 flex flex-wrap gap-2">
        @foreach ($categories as $category)
            <button class="px-4 py-1 text-sm font-semibold text-white bg-blue-600 hover:bg-blue-700 rounded-full transition">
                {{ $category->name }}
            </button>
        @endforeach
    </div>

    <p class="text-gray-700 leading-relaxed">{{ $post->body }}</p>
</div>


