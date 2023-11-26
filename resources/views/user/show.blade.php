<x-layout title='Classic Music Review App'>
  <x-user.info :user=$user :reviewCount=$reviewCount :allReviewCount=$allReviewCount :likeSum=$likeSum />

  <div class="justify-end flex">
    @auth
      @if ( Auth::user()->following()->where('following_user_id', $user->id)->exists() )
        <form action="{{ route('follow.destroy', ['user' => $user]) }}" method="post">
          @method('DELETE')
          @csrf
          <x-common.buttons.red type="submit">フォローを解除する</x-common.buttons.red>
        </form>
      @else
        <form action="{{ route('follow.store', ['user' => $user]) }}" method="post">
          @csrf
          <x-common.buttons.blue type="submit">フォローする</x-common.buttons.blue>
        </form>
      @endif
    @endauth
  </div>

  <x-user.nav_tabs :user=$user />

  <div class="mb-4">
    <h3>自己紹介</h3>
    <p class="text-base">{{ $user->self_introduction }}</p>
  </div>

  <div class="mb-4">
    <h3>お気に入りの録音</h3>
    <div class="flex overflow-x-scroll">
      @foreach ( $user->favoriteRecordings as $i_recording )
          <a href="{{ route('recording.show', ['recording' => $i_recording]) }}" class="flex-shrink-0">
            <img src="{{ jacket_url($i_recording->jacket_filename) }}" alt="{{ $i_recording->title }}" class="w-48 h-48">
          </a>
      @endforeach
    </div>
  </div>

  <div>
    <h3>お気に入りの演奏家</h2>
    @foreach ( $user->favoriteArtists as $i_artist )
        <a href="{{ route('artist.show', ['artist' => $i_artist]) }}" class="mb-2 mt-2 text-base">{{ $i_artist->name }}</a>
        <br />
    @endforeach
  </div>

</x-layout>

