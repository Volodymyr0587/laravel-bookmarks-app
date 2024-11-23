<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Web Bookmark') }} - {{ $bookmark->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form action="{{ route('bookmarks.update', $bookmark) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="space-y-12">
                            <div class="border-b border-gray-900/10 pb-12">
                                <h2 class="text-base/7 font-semibold text-gray-900">Fill the form</h2>
                                <p class="mt-1 text-sm/6 text-gray-600">This information will be displayed only for you.</p>

                                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                    <div class="col-span-full">
                                        <label for="name"
                                            class="block text-sm/6 font-medium text-gray-900">Name</label>
                                        <div class="mt-2">
                                            <div
                                                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                                <input type="text" name="name" id="name" autocomplete="name" value="{{ old('name', $bookmark->name) }}"
                                                    class="block flex-1 border-0 bg-transparent py-1.5 pl-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm/6"
                                                    placeholder="Learn Laravel For Everybody">
                                            </div>
                                            @error('name')
                                                <p class="mt-2 text-red-500 text-sm font-semibold">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-span-full">
                                        <label for="url"
                                            class="block text-sm/6 font-medium text-gray-900">Url</label>
                                        <div class="mt-2">
                                            <div
                                                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                                <input type="text" name="url" id="url" autocomplete="url" value="{{ old('url', $bookmark->url) }}"
                                                    class="block flex-1 border-0 bg-transparent py-1.5 pl-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm/6"
                                                    placeholder="https://laravel.com">
                                            </div>
                                            @error('url')
                                                <p class="mt-2 text-red-500 text-sm font-semibold">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-span-full">
                                        <label for="image"
                                            class="block text-sm/6 font-medium text-gray-900">Image</label>
                                        <div class="mt-2 flex items-center gap-x-3">
                                            <input type="file" name="image" id="image"
                                                class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                                        </div>
                                        @error('image')
                                            <p class="mt-2 text-red-500 text-sm font-semibold">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <x-primary-button>Update</x-primary-button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <form action="{{ route('bookmarks.destroy', $bookmark) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <x-primary-button class="bg-red-800 hover:bg-red-700 focus:bg-red-700 active:bg-red-900">Delete</x-primary-button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

