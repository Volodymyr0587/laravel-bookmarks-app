@props(['resource'])

<div class="flex items-center justify-between pb-6 px-4">
    {{-- Previous Page Button --}}
    @if ($resource->onFirstPage())
        <button
            class="select-none rounded-lg border border-gray-900 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-gray-900 transition-all disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
            disabled>
            Previous
        </button>
    @else
        <a href="{{ $resource->previousPageUrl() }}"
            class="select-none rounded-lg border border-gray-900 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-gray-900 transition-all hover:opacity-75">
            Previous
        </a>
    @endif

    {{-- Page Numbers --}}
    <div class="flex items-center gap-2">
        @foreach(range(1, $resource->lastPage()) as $page)
            @if ($page == $resource->currentPage())
                <button
                    class="relative h-8 max-h-[32px] w-8 max-w-[32px] select-none rounded-lg border border-gray-900 text-center align-middle font-sans text-xs font-medium uppercase text-gray-900 transition-all disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                    disabled>
                    <span class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                        {{ $page }}
                    </span>
                </button>
            @else
                <a href="{{ $resource->url($page) }}"
                    class="relative h-8 max-h-[32px] w-8 max-w-[32px] select-none rounded-lg text-center align-middle font-sans text-xs font-medium uppercase text-gray-900 transition-all hover:bg-gray-900/10">
                    <span class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                        {{ $page }}
                    </span>
                </a>
            @endif
        @endforeach
    </div>

    {{-- Next Page Button --}}
    @if ($resource->hasMorePages())
        <a href="{{ $resource->nextPageUrl() }}"
            class="select-none rounded-lg border border-gray-900 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-gray-900 transition-all hover:opacity-75">
            Next
        </a>
    @else
        <button
            class="select-none rounded-lg border border-gray-900 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-gray-900 transition-all disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
            disabled>
            Next
        </button>
    @endif
</div>
