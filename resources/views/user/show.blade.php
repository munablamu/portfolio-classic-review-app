<x-layout :title="$user->name">
  <x-user.info :user=$user :reviewCount=$reviewCount :allReviewCount=$allReviewCount :likeSum=$likeSum :fromUserController=$fromUserController />


  <x-user.nav_tabs :user=$user />

  <div class="my-4 mx-5">
    <h3 class="text-lg font-semibold">自己紹介</h3>
    @if ( $user->self_introduction === null )
      <p class="text-slate-400 dark:text-slate-400">自己紹介がありません。</p>
    @else
      <p class="text-base">{{ $user->self_introduction }}</p>
    @endif
  </div>
  <hr class="border-t border-slate-200 dark:border-slate-600 mt-4 mb-2 mx-5">

  <div class="mb-4 mx-5">
    <h3 class="text-lg font-semibold">お気に入りの録音</h3>
    @if ( $user->favoriteRecordings->count() === 0 )
      <p class="text-slate-400 dark:text-slate-400">お気に入りの録音がありません。</p>
    @else
      <div class="flex overflow-x-auto">
        @foreach ( $user->favoriteRecordings as $i_recording )
            <a href="{{ route('recording.show', ['recording' => $i_recording]) }}" class="flex-shrink-0">
              <img src="{{ jacket_url($i_recording->jacket_filename) }}" alt="{{ $i_recording->title }}" class="w-36 h-36 sm:w-48 sm:h-48">
            </a>
        @endforeach
      </div>
    @endif
  </div>
  <hr class="border-t border-slate-200 dark:border-slate-600 mt-4 mb-2 mx-5">

  <div class="mx-5 mb-5">
    <h3 class="text-lg font-semibold">お気に入りの演奏家</h2>
    @if ( $user->favoriteRecordings->count() === 0 )
      <p class="text-slate-400 dark:text-slate-400">お気に入りの演奏家がいません。</p>
    @else
      @foreach ( $user->favoriteArtists as $i_artist )
          <a href="{{ route('artist.show', ['artist' => $i_artist]) }}" class="url mb-2 mt-2 text-base">{{ $i_artist->name }}</a>
          <br />
      @endforeach
    @endif
  </div>

</x-layout>

<x-common.help message="ユーザーページです。ページ上部の数字は、このユーザーが{{ $reviewCount }}件のレビューを投稿しており、レビューでもらった合計のいいねが{{ $likeSum }}件であることを示しています。今回はユーザーIDをランダムなULIDではなく、1から連番の数字にしているため、URLの末尾を適当なものに変更すると他ユーザーのユーザーページを見ることができます。もちろん、他ユーザーのユーザーページを見る自然な導線もサイト内にあります。" />
