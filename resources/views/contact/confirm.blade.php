<x-layout :title="'お問い合わせ内容のご確認'">
    <h1 class="mx-5 my-5 text-xl font-bold">お問い合わせ内容のご確認</h1>
    <div class="mx-5">
        <form action="{{ route('contact.send') }}" method="post">
            @csrf

            <p class="inline-block text-sm font-medium mb-1 text-sky-500 dark:text-sky-300">お名前</p>
            <div class="mb-5">
                {{ $form['name'] }}
                <input name="name" value="{{ $form['name'] }}" type="hidden">
            </div>

            <p class="inline-block text-sm font-medium mb-1 text-sky-500 dark:text-sky-300">メールアドレス</p>
            <div class="mb-5">
                {{ $form['user_email'] }}
                <input name="user_email" value="{{ $form['user_email'] }}" type="hidden">
            </div>

            <p class="inline-block text-sm font-medium mb-1 text-sky-500 dark:text-sky-300">件名</p>
            <div class="mb-5">
                {{ $form['title'] }}
                <input name="title" value="{{ $form['title'] }}" type="hidden">
            </div>

            <p class="inline-block text-sm font-medium mb-1 text-sky-500 dark:text-sky-300">お問い合わせ内容</p>
            <div>
                {!! nl2br(e($form['message'])) !!}
                <input name="message" value="{{ $form['message'] }}" type="hidden">
            </div>

            <div class="flex justify-end mt-6">
                <button class="btn btn-rose" type="submit" name="action" value="back">
                    修正する
                </button>

                <button class="btn btn-indigo ml-2" type="submit" name="action" value="submit">
                    送信
                </button>
            </div>
        </form>
    </div>
</x-layout>

<x-common.help message="ここで送信されたお問い合わせは、実際に私に届くようになっています。" />
