<x-layout>
  <div class="mx-5 my-5">
    <div class="rounded-lg p-2 mb-4 border-4 border-emerald-700 text-emerald-700 bg-emerald-100">
      <strong>サンプルアカウントについて</strong>
      <p>　ご採用担当者の方向けにサンプルアカウント（メールアドレス：<strong class="strong-color">sample@example.com</strong>、パスワード：<strong class="strong-color">password</strong>）をご用意しております。ログイン時の機能をご確認される際は、よろしければこちらをご活用ください。</p>
    </div>

    <p>　このたびは、私のポートフォリオサイト「<strong class="strong-color">Classic Music Review App</strong>」をご覧いただき、ありがとうございます。このページでは、このサイトの使い方と機能をかんたんにご説明させていただきます。なお、こちらのページを読んでいただかなくても差し支えないように、<strong class='strong-color'>ページ左下</strong>にそのページについての説明もご用意いたしました。あわせてご利用ください。</p>

    <h2 class="text-2xl mt-4 mb-2 font-bold text-slate-500 dark:text-slate-500">全体像</h2>
    <p>　このサイトには、大きく3つの機能があります。</p>
    <ul class="list-disc mx-5">
      <li>録音（CD、アルバム、BOXなど）を検索する機能</li>
      <li>レビューを閲覧・投稿する機能</li>
      <li>ユーザーをフォローする機能</li>
    </ul>

    <h2 class="text-2xl mt-4 mb-2 font-bold text-slate-500 dark:text-slate-500">検索機能</h2>
    <p>　このサイトは、名前の通りクラシック音楽のレビュー共有を想定して作成いたしました。録音（CD、アルバム、BOXなど）に対してレビューを投稿したり、他の方の投稿を見ることができるサイトになっております。録音は<a href="/" class="url">トップページ</a>から「曲名」、「演奏家名」、「レビュー」の3つの目的に応じて検索していただけます。</p>
    <p>　検索バー左のプルダウンメニューから「<strong class="strong-color">Music Title</strong>」を選んでいただくと曲名で検索できるようになります。「交響曲」、「ピアノ」といったキーワードでも検索できますが、実際には作曲家名でも検索できるため、「バッハ」や「ベートーヴェン　交響曲」などでも検索していただけます。ただし、作曲家名、曲名はデータベース上では英語やドイツ語などで保存されているため、曲名検索の場合、検索キーワードを内部的にDeepLのAPIを利用して英語に翻訳した上で検索しています。そのため、検索結果は英語などで表示されることにご注意ください。</p>
    <p>　プルダウンメニューから「<strong class="strong-color">Artist</strong>」を選んでいただくと、演奏家名で検索できます。こちらは曲名検索と同様です。「<strong class="strong-color">Review</strong>」を選んでいただくと、レビュー文の全文検索ができます。レビュー文は日本語でシーディングしているため、内部で翻訳は行っていません。</p>

    <h2 class="text-2xl mt-4 mb-2 font-bold text-slate-500 dark:text-slate-500">録音と演奏家の詳細ページ（レビューの閲覧・投稿）</h2>
    <p>　曲名検索から録音を選択すると、録音の詳細ページ（たとえば、<a href="{{ route('recording.show', ['recording' => '85']) }}" class="url">このようなページ</a>）に進むことができます。録音の詳細ページでは、ほかユーザーのレビューを見ることができ、ログイン状態であればレビューを投稿、編集することができます。そのほか、レビューに対して「<strong class="strong-color">いいね</strong>」する機能、録音を「<strong class="strong-color">お気に入り</strong>」にする機能があります。いずれもログイン状態のときに各録音や演奏家の詳細ページから登録できます。</p>
    <p>　また、演奏家検索や録音の詳細ページの演奏家のリンクから演奏家の詳細ページ（たとえば、<a href="{{ route('artist.show', ['artist' => 70]) }}" class="url">このようなページ</a>）に進むことができます。演奏家の詳細ページでは、演奏家をお気に入りに登録でき、また、その演奏家が関わった録音の詳細ページへのリンクが表示されます。</p>

    <h2 class="text-2xl mt-4 mb-3 font-bold text-slate-500 dark:text-slate-500">ホームとユーザーページ</h2>
    <p>　ヘッダー右の「Login」ボタンからログインしていただくと、同じ位置に「Home」ボタンが表示されます。Homeページでは、「タイムライン」、「フォロー」、「レビュー管理」、「プロフィール管理」という4つのナビゲーションタブがあります。</p>
    <p>　「<strong class="strong-color">タイムライン</strong>」では、フォローユーザーの投稿が新着投稿順に確認することができます。「<strong class="strong-color">フォロー</strong>」では、現在のフォローユーザーを確認できます。「<strong class="strong-color">レビュー管理</strong>」では、過去に投稿したレビューを一元管理できます。もちろん、Homeページからではなく、録音の詳細ページでも個々のレビューの編集、削除を行えます。</p>
    <p>　Homeページ右上の「<strong class="strong-color">現在の表示を確認</strong>」ボタンからはログイン中のユーザーページに移動することができます。ユーザーページでは、Homeで編集した自己紹介文や、各録音や演奏家の詳細ページで登録したお気に入りを閲覧できます。今回、ユーザーIDはランダムなULIDではなく、1から連番で生成しているため、URLの末尾を他の番号にすることで他のユーザーのユーザーページを確認することも可能です。もちろん、各レビューの上部にあるユーザー名やユーザーアイコンをクリックすることでも、そのユーザーのユーザーページに移動することができます。</p>

    <h2 class="text-2xl mt-4 mb-3 font-bold text-slate-500 dark:text-slate-500">その他の機能</h2>
    <p>　フッターにお問い合わせフォームがあります。</p>

    <h2 class="text-2xl mt-4 mb-3 font-bold text-slate-500 dark:text-slate-500">データベースに収録されているデータ</h2>
    <p>　データベース上に収録されている作曲家は以下のとおりです。</p>
    <table class="w-full hidden sm:block">
      @foreach ( $composers->chunk(3) as $chunk )
        <tr>
          @foreach ($chunk as $i_composer)
            <td class="w-1/4">{{ $i_composer->name }}</td>
          @endforeach
        </tr>
      @endforeach
    </table>
    <table class="w-full hidden ss:block sm:hidden">
      @foreach ( $composers->chunk(2) as $chunk )
        <tr>
          @foreach ($chunk as $i_composer)
            <td class="w-1/2">{{ $i_composer->name }}</td>
          @endforeach
        </tr>
      @endforeach
    </table>
    <table class="w-full block ss:hidden">
      @foreach ( $composers->chunk(1) as $chunk )
        <tr>
          @foreach ($chunk as $i_composer)
            <td class="">{{ $i_composer->name }}</td>
          @endforeach
        </tr>
      @endforeach
    </table>
    <p>　これらの作曲家に対して、それぞれ数曲から10曲程度登録されており、それぞれの曲に対して20枚ほどの録音が登録されています。</p>


    <h2 class="text-2xl mt-4 mb-3 font-bold text-slate-500 dark:text-slate-500">さいごに</h2>
    <p>　本サイトのご説明は以上になります。最後まで読んでいただき、ありがとうございました。よろしければ実際に本サイトをぜひご確認いただけますと幸いです。</p>
  </div>
</x-layout>

<x-common.help message="このページでは、このサイトの使い方や実装した機能についてご説明します。" />
