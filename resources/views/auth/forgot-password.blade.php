<x-layout>
    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 sm:w-[28rem] w-full">
        <div class="mx-5">
            <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    {{-- <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus /> --}}
                    <input id="email" name="email" type="email"
                        class="shadow-sm focus:ring-indigo-500 mt-1 w-full border-slate-300 bg-slate-100 dark:border-slate-500 dark:bg-slate-600 rounded-md"
                        value="{{ old('email') }}" placeholder="メールアドレス" required autofocus>
                    </input>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    {{--
                    <x-primary-button>
                        {{ __('Email Password Reset Link') }}
                    </x-primary-button>
                    --}}
                    <button type="submit" class="btn btn-indigo">送信</button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
