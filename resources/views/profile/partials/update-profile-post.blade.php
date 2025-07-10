<section>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Update Profile Info') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Update your bio, social links, and avatar image.') }}
            </p>
        </header>
        {{-- {{$profile}} --}}

        <form action="{{ route('profile1.update') }}" method="POST" enctype="multipart/form-data" class="mt-6 space-y-6">
            @csrf
            @method('PUT')

            <div>
                <x-input-label for="bio" :value="__('Bio')" />
                <textarea name="bio" id="bio" rows="3"
                    class="mt-1 block w-full rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 focus:ring-indigo-500 focus:border-indigo-500">{{ $profile->bio }}</textarea>
                <x-input-error class="mt-2" :messages="$errors->get('bio')" />
            </div>

            <div>
                <label>Gender</label><br>
                <label><input type="radio" name="link" value="male"
                        {{ old('link', $profile->link) == 'male' ? 'checked' : '' }}>Male </label>
                <label><input type="radio" name="link" value="female"
                        {{ old('link', $profile->link) == 'female' ? 'checked' : '' }}>Female</label>
                <label><input type="radio" name="link" value="other"
                        {{ old('link', $profile->link) == 'other' ? 'checked' : '' }}>Other</label>
            </div>


            <div>
                @if ($profile->avatar)
                    <div class="mb-4">
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">Current Avatar:</p>
                        <img src="{{ asset('storage/' . $profile->avatar) }}" alt="avatar img" height="200px"
                            width="300px" class="w-24 h-24 object-cover rounded-full border border-gray-300">
                    </div>
                @endif


            </div>

            <div>
                <x-input-label for="avatar" :value="__('Upload New Avatar')" /><br>
                <input type="file" name="avatar" id="avatarInput"
                    class="mt-1 block w-full text-sm text-gray-900 dark:text-gray-100 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 dark:file:bg-gray-700 file:text-indigo-700 dark:file:text-gray-100 hover:file:bg-indigo-100 dark:hover:file:bg-gray-600" />


                <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
                <div class="mt-4">
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">New Avatar Preview:</p>
                    <img id="avatarPreview" src="" alt="Preview" style="display:none;"
                        class="w-24 h-24 object-cover rounded-full border border-gray-300"  height="200px" width="300px">
                </div>
            </div>



            <x-primary-button>{{ __('Submit') }}</x-primary-button>


        </form>
        <div>
            <script>
                document.getElementById('avatarInput').addEventListener('change', function(event) {
                    const file = event.target.files[0];
                    const preview = document.getElementById('avatarPreview');

                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            preview.src = e.target.result;
                            preview.style.display = 'block';
                        };
                        reader.readAsDataURL(file);
                    } else {
                        preview.src = '';
                        preview.style.display = 'none';
                    }
                });
            </script>

</section>
