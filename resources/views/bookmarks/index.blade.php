<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ auth()->user()->name }}'s {{ __('Bookmarks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <x-primary-link route="{{ route('bookmarks.create') }}">Add bookmark</x-primary-link>

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
            </div>
        </div>
    </div>
</x-app-layout>
