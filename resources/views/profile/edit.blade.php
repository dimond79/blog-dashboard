<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-white-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    {{-- @include('profile.partials.update-profile-information-form') --}}
                    <form action="{{route('profile.create')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label for="bio">Bio:</label><br/>
                        <textarea name="bio" id="bio" placeholder="Say something about you."></textarea><br/>
                        <label for="link">Links:</label><br/>
                        <textarea name="link" id="link" placeholder="Enter you social links."></textarea><br/>
                        <label for='avatar'>Avatar:</label><br/>
                        <input type="file" name="avatar" id="avatar"><br/>
                        <button type="submit">Submit</button>
                    </form>
                </div>
            </div>


            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
