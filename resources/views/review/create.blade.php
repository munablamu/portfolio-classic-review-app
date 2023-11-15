<x-layout title='Classic Music Review App'>
  <h1>Review Create</h1>

  @include('components.review.form', ['recording_id' => $recording->id])
</x-layout>
