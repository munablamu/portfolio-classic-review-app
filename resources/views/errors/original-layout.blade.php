<x-layout :title="'エラーページ'">
    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
        <div class="flex flex-col items-center justify-center">
            <h1 class="text-7xl font-bold font-Ubuntu text-slate-400 dark:text-slate-500">@yield('code')</h1>
            <p class="text-3xl mb-5">@yield('message')</p>
        </div>
    </div>
</x-layout>
