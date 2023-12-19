<x-layout :title="'ログイン'">
    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 sm:w-[28rem] w-full">
        <div class="mx-5">
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    {{-- <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" /> --}}
                    <input id="email" name="email" type="email"
                        class="shadow-sm focus:ring-indigo-500 mt-1 w-full border-slate-300 bg-slate-100 dark:border-slate-500 dark:bg-slate-600 rounded-md" required autofocus autocomplete="username"
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
                                    required autocomplete="current-password" /> --}}
                    <input id="password" name="password" type="password"
                        class="shadow-sm focus:ring-indigo-500 mt-1 w-full border-slate-300 bg-slate-100 dark:border-slate-500 dark:bg-slate-600 rounded-md" required autocomplete="current-password"
                    >
                    </input>

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded dark:bg-slate-600 border-slate-300 dark:border-slate-500 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-slate-800" name="remember">
                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    {{--
                    <x-primary-button class="ml-3">
                        {{ __('Log in') }}
                    </x-primary-button>
                    --}}
                    <button type="submit" class="btn btn-indigo ml-3">ログイン</button>
                </div>
            </form>
        </div>
    </div>
</x-layout>

<x-common.help message="ログインページです。サンプルアカウント（メールアドレス：<strong class='strong-color-invert'>hoge@example.com</strong>、パスワード：<strong class='strong-color-invert'>password</strong>）でログインしてみてください。一度の認証でログインできれば元のページに戻れますが、認証に失敗してからログインするとユーザーのHomeページへ移動します。" />
