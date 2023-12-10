<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contact Mail</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-100 py-10 px-5">
        <p>この度はお問い合わせいただき、ありがとうございます。</p>
        <p>お問い合わせ内容を受け付けました。確認次第、担当者よりご連絡いたします。</p>
        <p>なお、お問い合わせ内容の確認には数日かかる場合がありますので、ご了承ください。</p>
        <p>
        <div class="max-w-3xl mx-auto bg-slate-125 shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h1 class="block text-slate-700 font-bold mb-2 text-xl text-center">お問い合わせ内容</h1>
            <hr class="mb-6">
            <p class="mb-2"><span class="font-bold text-slate-700">名前：</span>{{ $inputs['name'] }}</p>
            <p class="mb-2"><span class="font-bold text-slate-700">メールアドレス：</span>{{ $inputs['email'] }}</p>
            <p class="mb-2"><span class="font-bold text-slate-700">件名：</span>{{ $inputs['title'] }}</p>
            <p class="mb-2"><span class="font-bold text-slate-700">メッセージ：</span>{{ $inputs['message'] }}</p>
        </div>
    </body>
</html>
