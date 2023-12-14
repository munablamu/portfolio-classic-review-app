@if ( $paginator->hasPages() )
  <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="mb-4">
    <div class="mb-2 flex justify-center sm:block">
      <p class="text-sm leading-5">
        <span class="font-medium">{{ $paginator->total() }}</span>
        件のうち
        @if ( $paginator->firstItem() )
          <span class="font-medium">{{ $paginator->firstItem() }}</span>
          から
          <span class="font-medium">{{ $paginator->lastItem() }}</span>
        @else
          {{ $paginator->count() }}
        @endif
        を表示
      </p>
    </div>

    <div class="sm:hidden">
      <ul class="list-style-none flex items-center justify-center">
        {{-- Previous Page Link --}}
        <li>
          @if ( $paginator->onFirstPage() )
            <span  class="pointer-events-none relative block rounded bg-transparent px-3 py-1.5 text-sm transition-all duration-300 text-slate-400">
              <i class="fa-solid fa-angle-left mr-2"></i>Previous
            </span>
          @else
            <a href="{{ $paginator->previousPageUrl() }}" class="relative block rounded bg-transparent px-3 py-1.5 text-sm transition-all duration-300 hover:text-slate-600 hover:bg-slate-175 hover:font-bold dark:hover:text-slate-300 dark:hover:bg-slate-500">
              <i class="fa-solid fa-angle-left mr-2"></i>Previous
            </a>
          @endif
        </li>

        {{-- Next Page Link --}}
        <li>
          @if ( $paginator->hasMorePages() )
            <a href="{{ $paginator->nextPageUrl() }}" class="relative block rounded bg-transparent px-3 py-1.5 text-sm transition-all duration-300 hover:text-slate-600 hover:bg-slate-175 hover:font-bold dark:hover:text-slate-300 dark:hover:bg-slate-500">
              Next<i class="fa-solid fa-angle-right ml-2"></i>
            </a>
          @else
            <span class="pointer-events-none relative block rounded bg-transparent px-3 py-1.5 text-sm transition-all duration-300 text-slate-400">
              Next<i class="fa-solid fa-angle-right ml-2"></i>
            </span>
          @endif
        </li>
      </ul>
    </div>

    {{-- over sm --}}
    <div class="hidden sm:block">
      <ul class="list-style-none flex items-center justify-center">
        {{-- Previous Page Link --}}
        <li>
          @if ( $paginator->onFirstPage() )
            <span  class="pointer-events-none relative block rounded bg-transparent px-3 py-1.5 text-sm transition-all duration-300 text-slate-400">
              <i class="fa-solid fa-angle-left"></i>
            </span>
          @else
            <a href="{{ $paginator->previousPageUrl() }}" class="relative block rounded bg-transparent px-3 py-1.5 text-sm transition-all duration-300 hover:text-slate-600 hover:bg-slate-175 hover:font-bold dark:hover:text-slate-300 dark:hover:bg-slate-500">
              <i class="fa-solid fa-angle-left"></i>
            </a>
          @endif
        </li>

        {{-- Pagination Elements --}}
        @foreach ( $elements as $element )
          {{-- "Three Dots" Separator --}}
          @if ( is_string($element) )
            <li aria-disabled="true">
              <span class="relative block rounded bg-transparent px-3 py-1.5 text-sm transition-all duration-300">
                {{ $element }}
              </span>
            </li>
          @endif

          {{-- Array of Links --}}
          @if ( is_array($element) )
            @foreach ( $element as $page => $url )
              @if ( $page === $paginator->currentPage() )
                <li aria-current="page">
                  <span class="relative block rounded px-3 py-1.5 text-sm font-bold transition-all duration-300 text-slate-800 bg-slate-175 dark:text-slate-200 dark:bg-slate-500">
                    {{ $page }}
                    <span class="absolute -m-px h-px w-px overflow-hidden whitespace-nowrap border-0 p-0 [clip:rect(0,0,0,0)]">
                      (current)
                    </span>
                  </span>
                </li>
              @else
                <li>
                  <a href="{{ $url }}" class="relative block rounded bg-transparent px-3 py-1.5 text-sm transition-all duration-300 hover:text-slate-600 hover:bg-slate-175 hover:font-bold dark:hover:text-slate-300 dark:hover:bg-slate-500">
                    {{ $page }}
                  </a>
                </li>
              @endif
            @endforeach
          @endif
        @endforeach

        {{-- Next Page Link --}}
        <li>
          @if ( $paginator->hasMorePages() )
            <a href="{{ $paginator->nextPageUrl() }}" class="relative block rounded bg-transparent px-3 py-1.5 text-sm transition-all duration-300 hover:text-slate-600 hover:bg-slate-175 hover:font-bold dark:hover:text-slate-300 dark:hover:bg-slate-500">
              <i class="fa-solid fa-angle-right"></i>
            </a>
          @else
            <span class="pointer-events-none relative block rounded bg-transparent px-3 py-1.5 text-sm transition-all duration-300 text-slate-400">
              <i class="fa-solid fa-angle-right"></i>
            </span>
          @endif
        </li>
      </ul>
    </div>
  </nav>
@endif
