<section>
    <header>
        <h2 class="text-lg font-medium text-slate-900 dark:text-slate-100">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-slate-600 dark:text-slate-400">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="current_password" :value="__('Current Password')" />
            {{-- <x-text-input id="current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" /> --}}
            <input id="current_password" name="current_password" type="password"
                class="shadow-sm focus:ring-indigo-500 mt-1 w-full border-slate-300 bg-slate-100 dark:border-slate-500 dark:bg-slate-600 rounded-md" autocomplete="current-password">
            </input>
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password" :value="__('New Password')" />
            {{-- <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" /> --}}
            <input id="password" name="password" type="password"
                class="shadow-sm focus:ring-indigo-500 mt-1 w-full border-slate-300 bg-slate-100 dark:border-slate-500 dark:bg-slate-600 rounded-md" autocomplete="new-password">
            </input>
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            {{-- <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" /> --}}
            <input id="password-confirmation" name="password-confirmation" type="password"
                class="shadow-sm focus:ring-indigo-500 mt-1 w-full border-slate-300 bg-slate-100 dark:border-slate-500 dark:bg-slate-600 rounded-md" autocomplete="new-password">
            </input>
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end">
            {{-- <x-primary-button>{{ __('Save') }}</x-primary-button> --}}
            <button type="submit" class="btn btn-indigo">更新</button>

            @if (session('status') === 'password-updated')
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
