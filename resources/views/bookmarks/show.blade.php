<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $bookmark->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <x-primary-link route="{{ route('bookmarks.edit', $bookmark) }}">Edit bookmark</x-primary-link>

                    <div class="mt-12">

                        <div>
                            <img src="{{ $bookmark->image ? asset('storage/' . $bookmark->image) : asset('images/default.jpg') }}"
                            alt="{{ $bookmark->title }}"
                            class="relative inline-block h-20 w-20 !rounded-md object-cover object-center" />

                        </div>
                        <ul>
                            <li>
                               {{ $bookmark->name }}
                            </li>
                            <li>
                                <a href="{{ $bookmark->url }}" target="_blank">{{ $bookmark->url }}</a>
                            </li>
                        </ul>

                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
