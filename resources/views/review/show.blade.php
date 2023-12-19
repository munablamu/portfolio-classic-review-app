<x-layout>
    <div class="mx-5 mt-5">
        <x-recording.card :recording=$recording />
    </div>
    <x-review.card :review=$review :clamp=false />
</x-layout>

<x-common.help message="このページでは、レビューの閲覧ができます。" />
