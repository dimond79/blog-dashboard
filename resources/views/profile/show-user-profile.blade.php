<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- {{$profile}} --}}
                    @if ($profile)
                        <div class="max-w-md mx-auto bg-blue-100 text-black shadow-md rounded-lg p-6">

                            <h2 class="text-xl font-bold mb-4">Name: {{ $user->name }}</h2>

                             @if ($profile->avatar)
                                <p><strong>Avatar:</strong></p>
                                <img src="{{ asset('storage/' . $profile->avatar) }}" alt="Avatar"
                                    class="w-24 h-24 rounded-full">
                            @else
                                <p><strong>Avatar:</strong> Not uploaded</p>
                            @endif


                            <p><strong>Bio:</strong> {{ $profile->bio }}</p>
                            <p><strong>Gender:</strong> {{ $profile->link }}</p>

                            <p><strong>Email:</strong>{{ $user->email }} </p>




                        </div>
                        <a href="{{route('profile1.update')}}"><button class="btn btn-primary">Edit Profile</button></a>
                        <form action="{{ route('profile.delete') }} " method="POST">
                            @csrf
                            {{-- @method('Delete') --}}
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <button type="submit">Delete Profile</button>
                        </form>
                    @else
                        <p>User has no bio.</p>
                    @endif




                </div>
            </div>
        </div>
    </div>
</x-app-layout>
