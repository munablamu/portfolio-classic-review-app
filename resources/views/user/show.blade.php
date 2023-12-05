<x-layout title='Classic Music Review App'>
  <x-user.info :user=$user :reviewCount=$reviewCount :allReviewCount=$allReviewCount :likeSum=$likeSum />


  <x-user.nav_tabs :user=$user />

  <div class="mb-4 mx-5">
    <h3 class="text-lg font-semibold">自己紹介</h3>
    <p class="text-base">{{ $user->self_introduction }}</p>
  </div>

  <div class="mb-4 mx-5">
    <h3 class="text-lg font-semibold">お気に入りの録音</h3>
    <div class="flex overflow-x">
      @foreach ( $user->favoriteRecordings as $i_recording )
          <a href="{{ route('recording.show', ['recording' => $i_recording]) }}" class="flex-shrink-0">
            <img src="{{ jacket_url($i_recording->jacket_filename) }}" alt="{{ $i_recording->title }}" class="w-48 h-48">
          </a>
      @endforeach
    </div>
  </div>

  <div class="mx-5">
    <h3 class="text-lg font-semibold">お気に入りの演奏家</h2>
    @foreach ( $user->favoriteArtists as $i_artist )
        <a href="{{ route('artist.show', ['artist' => $i_artist]) }}" class="url mb-2 mt-2 text-base">{{ $i_artist->name }}</a>
        <br />
    @endforeach
  </div>

</x-layout>

