<x-layout :title="'アカウント作成'">
    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 sm:w-[28rem] w-full">
        <div class="mx-5">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    {{-- <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" /> --}}
                    <input id="name" name="name" type="text"
                        class="shadow-sm focus:ring-indigo-500 mt-1 w-full border-slate-300 bg-slate-100 dark:border-slate-500 dark:bg-slate-600 rounded-md" required autofocus autocomplete="name"
                        value="{{ old('name') }}">
                    </input>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    {{-- <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" /> --}}
                    <input id="email" name="email" type="email"
                        class="shadow-sm focus:ring-indigo-500 mt-1 w-full border-slate-300 bg-slate-100 dark:border-slate-500 dark:bg-slate-600 rounded-md" required autocomplete="username"
                        value="{{ old('email') }}">
                    </input>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />

                    {{-- <x-text-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" /> --}}
                    <input id="password" name="password" type="password"
                        class="shadow-sm focus:ring-indigo-500 mt-1 w-full border-slate-300 bg-slate-100 dark:border-slate-500 dark:bg-slate-600 rounded-md" required autocomplete="new-password"
                    >
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
                        class="shadow-sm focus:ring-indigo-500 mt-1 w-full border-slate-300 bg-slate-100 dark:border-slate-500 dark:bg-slate-600 rounded-md" required autocomplete="new-password"
                    >
                    </input>

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    {{--
                    <x-primary-button class="ml-4">
                        {{ __('Register') }}
                    </x-primary-button>
                    --}}
                    <button type="submit" class="btn btn-indigo ml-4">アカウント作成</button>
                </div>
            </form>
        </div>
    </div>
</x-layout>

<x-common.help message="アカウント作成ページです。なお、ログインページからサンプルアカウント（メールアドレス：<strong class='strong-color-invert'>hoge@example.com</strong>、パスワード：<strong class='strong-color-invert'>password</strong>）でもログイン可能です。" />
