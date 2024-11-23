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

                        <div class="grid grid-cols-2 items-center">

                            <img src="{{ $bookmark->image ? asset('storage/' . $bookmark->image) : asset('images/default.jpg') }}"
                                alt="{{ $bookmark->title }}"
                                class="relative inline-block h-20 w-20 !rounded-md object-cover object-center" />

                            <ul>
                                <li class="flex items-center gap-x-2">
                                    <div class="h-2 w-2 bg-black"></div>
                                    <span class="text-lg font-bold">{{ $bookmark->name }}</span>
                                </li>
                                <li class="flex items-center gap-x-2">
                                    <div class="h-2 w-2 bg-blue-700"></div>
                                    <a class="text-blue-500 hover:text-blue-700  hover:font-semibold hover:underline transition-all duration-300 ease-in-out"
                                        href="{{ $bookmark->url }}" target="_blank">
                                        {{ Str::limit($bookmark->url, 30) }}
                                    </a>

                                </li>
                            </ul>
                        </div>


                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
