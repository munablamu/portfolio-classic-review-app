<x-layout title='Classic Music Review App'>
  <h1>User List</h1>

  <div>
    @foreach ( $users as $i_user )
      <a href="{{ route('user.show', ['id' => $i_user->id]) }}">{{ $i_user->name }}</a><br />
    @endforeach
  </div>
</x-layout>
