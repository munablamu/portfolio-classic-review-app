<x-layout>
  <div class="mx-5 my-5">
    <div class="rounded-lg p-2 mb-4 border-4 border-emerald-600 text-emerald-600 bg-emerald-100">
      <strong>サンプルアカウントについて</strong>
      <p>　ご採用担当者の方向けにサンプルアカウント（メールアドレス：sample@example.com、パスワード：password）をご用意しております。ログイン時の機能をご確認される際は、よろしければこちらをご利用ください。</p>
    </div>

    <p>　このたびは、私のポートフォリオサイト「<strong class="strong-color">Classic Music Review App</strong>」をご覧いただき、ありがとうございます。このページでは、このサイトの使い方をかんたんにご説明させていただきます。</p>

    <h2 class="text-2xl mt-4 mb-2 font-bold text-slate-500 dark:text-slate-400">検索機能</h2>
    <p>　このサイトは、名前の通りクラシック音楽のレビュー共有を想定して作成いたしました。録音（CD、アルバム、BOXなど）に対してレビューを投稿したり、他の方の投稿を見ることができるサイトになっております。録音は<a href="/" class="url">トップページ</a>から「曲名」、「演奏家名」、「レビュー」の3つの目的に応じて検索していただけます。</p>
    <p>　検索バー左のプルダウンメニューから「<strong class="strong-color">Music Title</strong>」を選んでいただくと曲名で検索できるようになります。「交響曲」、「ピアノ」といったキーワードでも検索できますが、実際には作曲家名でも検索できるため、「ベートヴェン」や「バッハ」などでも検索していただけます。ただし、作曲家名、曲名はデータベース上では英語やドイツ語などで保存されているため、曲名検索の場合、検索キーワードを内部的にDeepLのAPIを利用して英語に翻訳した上で検索しています。そのため、検索結果は英語などで表示されることにご注意ください。</p>
    <p>　プルダウンメニューから「<strong class="strong-color">Artist</strong>」を選んでいただくと、演奏家名で検索できます。こちらは曲名検索と同様です。「<strong class="strong-color">Review</strong>」を選んでいただくと、レビュー文の全文検索ができます。レビュー文は日本語でシーディングしているため、内部で翻訳は行っていません。</p>

    <h2 class="text-2xl mt-4 mb-2 font-bold text-slate-500 dark:text-slate-400">録音と演奏家の詳細ページ</h2>
    <p>　曲名検索から録音を選択すると、録音の詳細ページ（たとえば、<a href="http://localhost/recordings/85" class="url">このようなページ</a>）に進むことができます。録音の詳細ページでは、ほかユーザーのレビューを見ることができ、ログイン状態であればレビューを投稿、編集することができます。そのほか、レビューに対して「<strong class="strong-color">いいね</strong>」する機能、録音を「<strong class="strong-color">お気に入り</strong>」にする機能があります。いずれもログイン状態のときに各録音や演奏家の詳細ページから登録できます。</p>
    <p>　また、演奏家検索や録音の詳細ページの演奏家のリンクから演奏家の詳細ページ（たとえば、<a href="http://localhost/artists/70" class="url">このようなページ</a>）に進むことができます。演奏家の詳細ページでは、演奏家をお気に入りに登録でき、また、その演奏家が関わった録音の詳細ページへのリンクが表示されます。</p>

    <h2 class="text-2xl mt-4 mb-3 font-bold text-slate-500 dark:text-slate-400">ホームとユーザーページ</h2>
    <p>　ヘッダー右の「Login」ボタンからログインしていただくと、同じ位置に「Home」ボタンが表示されます。Homeページでは、「タイムライン」、「フォロー」、「レビュー管理」、「プロフィール管理」という4つのナビゲーションタブがあります。</p>
    <p>　「<strong class="strong-color">タイムライン</strong>」では、フォローユーザーの投稿が新着投稿順に確認することができます。「<strong class="strong-color">フォロー</strong>」では、現在のフォローユーザーを確認できます。「<strong class="strong-color">レビュー管理</strong>」では、過去に投稿したレビューを一元管理できます。もちろん、Homeページからではなく、録音の詳細ページでも個々のレビューの編集、削除を行えます。</p>
    <p>　Homeページ右上の「<strong class="strong-color">現在の表示を確認</strong>」ボタンからはログイン中のユーザーページに移動することができます。ユーザーページでは、Homeで編集した自己紹介文や、各録音や演奏家の詳細ページで登録したお気に入りを閲覧できます。今回、ユーザーIDはランダムなULIDではなく、1から連番で生成しているため、URLの末尾を他の番号にすることで他のユーザーのユーザーページを確認することも可能です。もちろん、各レビューの上部にあるユーザー名やユーザーアイコンをクリックすることでも、そのユーザーのユーザーページに移動することができます。</p>

    <h2 class="text-2xl mt-4 mb-3 font-bold text-slate-500 dark:text-slate-400">お問い合わせフォーム</h2>
    <p>　お問い合わせフォームはフッターにあります。</p>

    <h2 class="text-2xl mt-4 mb-3 font-bold text-slate-500 dark:text-slate-400">さいごに</h2>
    <p>　本サイトのご説明は以上になります。最後まで読んでいただき、ありがとうございました。よろしければ実際に本サイトをぜひご確認いただけますと幸いです。</p>
  </div>
</x-layout>

<x-common.help message="このページでは、このサイトの使い方や実装した機能についてご説明します。" />
