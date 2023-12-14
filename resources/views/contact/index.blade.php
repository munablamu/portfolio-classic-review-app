<x-layout :title="'お問い合わせフォーム'">
    <h1 class="mx-5 my-5 text-xl">お問い合わせフォーム</h1>
    <div class="mx-5">
        <form action="{{ route('contact.confirm') }}" method="post">
            @csrf

            <label for="name" class="inline-block text-sm font-medium mb-1">お名前</label>
            @error('name')
                <span class="validate ml-4">{{ $message }}</span>
            @enderror
            <div class="mb-5">
                <input id="name" type="text" name="name"
                    class="shadow-sm focus:ring-indigo-500 mt-1 w-full border-slate-300 bg-slate-100 dark:border-slate-500 dark:bg-slate-600 rounded-md"
                    placeholder="お名前を入力してください" value="{{ old('name') }}" autofocus
                ></input>
            </div>

            <label for="email" class="inline-block text-sm font-medium mb-1">メールアドレス</label>
            @error('email')
                <span class="validate ml-4">{{ $message }}</span>
            @enderror
            <div class="mb-5">
                <input id="email" type="email" name="email"
                    class="shadow-sm focus:ring-indigo-500 mt-1 w-full border-slate-300 bg-slate-100 dark:border-slate-500 dark:bg-slate-600 rounded-md"
                    placeholder="メールアドレスを入力してください" value="{{ old('email') }}"
                ></input>
            </div>

            <label for="title" class="inline-block text-sm font-medium mb-1">件名</label>
            @error('title')
                <span class="validate ml-4">{{ $message }}</span>
            @enderror
            <div class="mb-5">
                <input id="title" type="text" name="title"
                    class="shadow-sm focus:ring-indigo-500 mt-1 w-full border-slate-300 bg-slate-100 dark:border-slate-500 dark:bg-slate-600 rounded-md"
                    placeholder="件名を入力してください" value="{{ old('title') }}"
                ></input>
            </div>

            <label for="message" class="text-sm font-medium">お問い合わせ内容</label>
            @error('message')
                <span class="validate ml-4">{{ $message }}</span>
            @enderror
            <div class="mb-5">
                <textarea id="message" name="message" rows="5"
                    class="shadow-sm focus:ring-indigo-500 mt-1 w-full border-slate-300 bg-slate-100 dark:border-slate-500 dark:bg-slate-600 rounded-md"
                    placeholder="メッセージを入力してください"
                >{{ old('message') }}</textarea>
            </div>

            <div class="flex justify-end mt-6">
                <button class="btn btn-indigo" type="submit">
                    確認画面に進む
                </button>
            </div>
        </form>
    </div>
</x-layout>
