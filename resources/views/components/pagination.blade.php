@props(['resource'])

@props(['resource'])

@php
    // Calculate range of pages to show
    $currentPage = $resource->currentPage();
    $lastPage = $resource->lastPage();
    $adjacent = 2; // Number of pages to show on either side of the current page
    $startPage = max(1, $currentPage - $adjacent);
    $endPage = min($lastPage, $currentPage + $adjacent);
@endphp

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
        {{-- First Page --}}
        @if ($startPage > 1)
            <a href="{{ $resource->url(1) }}"
                class="relative h-8 max-h-[32px] w-8 max-w-[32px] select-none rounded-lg text-center align-middle font-sans text-xs font-medium uppercase text-gray-900 transition-all hover:bg-gray-900/10">
                <span class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">1</span>
            </a>
            @if ($startPage > 2)
                <span class="relative h-8 max-h-[32px] w-8 max-w-[32px] text-center align-middle font-sans text-xs font-medium text-gray-500">
                    ...
                </span>
            @endif
        @endif

        {{-- Middle Pages --}}
        @foreach (range($startPage, $endPage) as $page)
            @if ($page == $currentPage)
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

        {{-- Last Page --}}
        @if ($endPage < $lastPage)
            @if ($endPage < $lastPage - 1)
                <span class="relative h-8 max-h-[32px] w-8 max-w-[32px] text-center align-middle font-sans text-xs font-medium text-gray-500">
                    ...
                </span>
            @endif
            <a href="{{ $resource->url($lastPage) }}"
                class="relative h-8 max-h-[32px] w-8 max-w-[32px] select-none rounded-lg text-center align-middle font-sans text-xs font-medium uppercase text-gray-900 transition-all hover:bg-gray-900/10">
                <span class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">{{ $lastPage }}</span>
            </a>
        @endif
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

