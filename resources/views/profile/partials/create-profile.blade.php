 <section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Additional Profile Info') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Add your bio, social links, and avatar image.") }}
        </p>
    </header>

    <form method="POST" action="{{ route('profile.create') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf

        <div>
            <x-input-label for="bio" :value="__('Bio')" />
            <textarea name="bio" id="bio" rows="3" class="mt-1 block w-full rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 focus:ring-indigo-500 focus:border-indigo-500"></textarea>
            <x-input-error class="mt-2" :messages="$errors->get('bio')" />
        </div>

        <div>
            <x-input-label for="link" :value="__('Gender')" />
            <input type="radio" name="link" id="male" value="male"/>
            <label for="male">Male</label><br/>
            <input type="radio" name="link" id="female" value="female"/>
            <label for="female">Female</label><br/>
            <input type="radio" name="link" id="other" value="other"/>
            <label for="other">Other</label>
        </div>
        {{-- <div>
            <x-input-label for="link" :value="__('Social Links')" />
            <input type="text" name="link" id="link" rows="2" class="mt-1 block w-full rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 focus:ring-indigo-500 focus:border-indigo-500"></textarea>
            <x-input-error class="mt-2" :messages="$errors->get('link')" />
        </div> --}}

        <div>
            <x-input-label for="avatar" :value="__('Avatar')" />
            <input type="file" name="avatar" id="avatar" class="mt-1 block w-full text-sm text-gray-900 dark:text-gray-100 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 dark:file:bg-gray-700 file:text-indigo-700 dark:file:text-gray-100 hover:file:bg-indigo-100 dark:hover:file:bg-gray-600" />
            <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Submit') }}</x-primary-button>

            @if (session('status') === 'profile-saved')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>




 {{-- <div class="p-4 sm:p-8 bg-white dark:bg-white-800 shadow sm:rounded-lg">
     <div class="max-w-xl">

         <form action="{{ route('profile.create') }}" method="POST" enctype="multipart/form-data">
             @csrf
             <label for="bio">Bio:</label><br />
             <textarea name="bio" id="bio" placeholder="Say something about you."></textarea><br />
             <label for="link">Links:</label><br />
             <textarea name="link" id="link" placeholder="Enter you social links."></textarea><br />
             <label for='avatar'>Avatar:</label><br />
             <input type="file" name="avatar" id="avatar"><br />
             <button type="submit">Submit</button>
         </form>
     </div>
 </div> --}}
