<x-layout :title="'お問い合わせ内容のご確認'">
    <h1 class="mx-5 my-5 text-xl font-bold">お問い合わせ内容のご確認</h1>
    <div class="mx-5">
        <form action="{{ route('contact.send') }}" method="post">
            @csrf

            <p class="inline-block text-sm font-medium mb-1">お名前</p>
            <div class="mb-5">
                {{ $form['name'] }}
                <input name="name" value="{{ $form['name'] }}" type="hidden">
            </div>

            <p class="inline-block text-sm font-medium mb-1">メールアドレス</p>
            <div class="mb-5">
                {{ $form['email'] }}
                <input name="email" value="{{ $form['email'] }}" type="hidden">
            </div>

            <p class="inline-block text-sm font-medium mb-1">件名</p>
            <div class="mb-5">
                {{ $form['title'] }}
                <input name="title" value="{{ $form['title'] }}" type="hidden">
            </div>

            <p class="text-sm font-medium">お問い合わせ内容</p>
            <div>
                {!! nl2br(e($form['message'])) !!}
                <input name="message" value="{{ $form['message'] }}" type="hidden">
            </div>

            <div class="flex justify-end mt-6">
                <button class="btn btn-indigo" type="submit" name="action" value="back">
                    修正する
                </button>

                <button class="btn btn-rose ml-2" type="submit" name="action" value="submit">
                    送信
                </button>
            </div>
        </form>
    </div>
</x-layout>
