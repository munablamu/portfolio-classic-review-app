<x-layout>
    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 sm:w-[28rem] w-full">
        <div class="mx-5">
            <form method="POST" action="{{ route('password.store') }}">
                @csrf

                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    {{-- <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" /> --}}
                    <input id="email" name="email" type="email"
                        class="mt-1 input" required autofocus autocomplete="username"
                        value="{{ old('email', $request->email) }}">
                    </input>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />
                    {{-- <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" /> --}}
                    <input id="password" name="password" type="password"
                        class="shadow-sm focus:ring-indigo-500 mt-1 w-full border-slate-300 bg-slate-100 dark:border-slate-500 dark:bg-slate-600 rounded-md" required autocomplete="new-password">
                    </input>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                    {{-- <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                        type="password"
                                        name="password_confirmation" required autocomplete="new-password" /> --}}
                    <input id="password_confirmation" name="password_confirmation" type="password"
                        class="shadow-sm focus:ring-indigo-500 mt-1 w-full border-slate-300 bg-slate-100 dark:border-slate-500 dark:bg-slate-600 rounded-md" required autocomplete="new-password">
                    </input>

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    {{-- <x-primary-button>
                        {{ __('Reset Password') }}
                    </x-primary-button> --}}
                    <button type="submit" class="btn btn-indigo">{{ __('Reset Password') }}</button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
