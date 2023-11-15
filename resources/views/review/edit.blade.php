<x-layout title='Classic Music Review App'>
  <h1>Review Edit</h1>

  @include('components.review.updateForm', [
    'recording_id' => $recording->id,
    'review' => $review
  ])
</x-layout>
