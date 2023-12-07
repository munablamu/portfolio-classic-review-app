<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" />

            {{-- <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" /> --}}
            <input id="password" name="password" type="password"
                class="shadow-sm focus:ring-indigo-500 mt-1 w-full border-slate-300 bg-slate-100 dark:border-slate-500 dark:bg-slate-600 rounded-md" required autocomplete="current-password"
            >
            </input>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex justify-end mt-4">
            {{-- <x-primary-button>
                {{ __('Confirm') }}
            </x-primary-button> --}}
            <button type="submit" class="btn btn-indigo">{{ __('Confirm') }}</button>
        </div>
    </form>
</x-guest-layout>
