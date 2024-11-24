<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @if(request()->has('search'))
                {{ __('Search results for') }} <span class="italic underline underline-offset-8 decoration-4 decoration-blue-500">{{ request()->query('search') }}</span>
            @else
                {{ auth()->user()->name }}'s {{ __('Bookmarks') }}
            @endif
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="flex items-center justify-between">
                        <x-primary-link route="{{ route('bookmarks.create') }}">Add bookmark</x-primary-link>

                        {{-- Search Form--}}
                        <form action="{{ route('bookmarks.index') }}" class="w-full max-w-xs">
                            @csrf
                            <div class="relative h-10 w-full">
                                <button type="submit"
                                    class="absolute grid w-5 h-5 top-2/4 right-3 -translate-y-2/4 place-items-center text-blue-gray-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" aria-hidden="true" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z">
                                        </path>
                                    </svg>
                                </button>
                                <input name="search" value="{{ request('search') }}"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6"
                                    placeholder="Search by name or url..." />
                            </div>
                        </form>
                    </div>
                    {{-- End Search Form --}}

                    <div class="mt-12">
                        @foreach ($bookmarks as $bookmark)
                            <div class="grid grid-cols-4 items-center my-4">

                                <img src="{{ $bookmark->image ? asset('storage/' . $bookmark->image) : asset('images/default.jpg') }}"
                                    alt="{{ $bookmark->title }}"
                                    class="relative inline-block h-20 w-20 !rounded-md object-cover object-center" />

                                <p class="text-lg font-bold">{{ $bookmark->name }}</p>

                                <x-primary-link class="mr-4 bg-blue-900 hover:bg-blue-700" route="{{ route('bookmarks.show', $bookmark) }}">View</x-primary-link>
                                <x-primary-link class="mr-4 bg-green-900 hover:bg-green-700" route="{{ route('bookmarks.edit', $bookmark) }}">Edit</x-primary-link>

                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="mx-6 mb-6">
                    {{ $bookmarks->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
