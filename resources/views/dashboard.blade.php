<x-app-layout>
    <div class="my-8 flex flex-col items-center justify-center">
        <form method="get" action="" style="width: 400px;">
            <div class="relative text-gray-600">
                <input type="busca" name="busca" placeholder="Search"
                    class="bg-white h-10 w-full px-5 pr-10 rounded-full text-sm focus:outline-none border-gray-300 bg-gray-50"
                    value="{{ request()->busca ?? '' }}">
                <button type="submit" class="absolute right-0 top-0 mt-3 mr-4">
                    <svg class="h-4 w-4 fill-current" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <rect width="24" height="24" fill="white"></rect>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M10 2C5.58172 2 2 5.58172 2 10C2 14.4183 5.58172 18 10 18C11.8487 18 13.551 17.3729 14.9056 16.3199L20.2929 21.7071C20.6834 22.0976 21.3166 22.0976 21.7071 21.7071C22.0976 21.3166 22.0976 20.6834 21.7071 20.2929L16.3199 14.9056C17.3729 13.551 18 11.8487 18 10C18 5.58172 14.4183 2 10 2Z"
                                fill="#323232"></path>
                        </g>
                    </svg>  
                </button>
            </div>
        </form>
    </div>
    <div
        class='max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-wrap gap-4 after:basis-1/4 after:grow after:shrink before:basis-1/4 before:grow before:shrink after:order-last before:order-last'>
        @if (session('success'))
        <p>{{ session('success') }}</p>
        @else
        <p>{{ session('error') }}</p>
        @endif
    </div>
    <div
        class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-wrap gap-4 after:basis-1/4 after:grow after:shrink before:basis-1/4 before:grow before:shrink after:order-last before:order-last">
        @foreach ($books as $book)
        <x-book-card thumbnail="{{ $book->volumeInfo->imageLinks->smallThumbnail ?? '' }}"
            title="{{ $book->volumeInfo->title ?? '' }}" clicked="{{ in_array($book->id, $favorites) }}"
            bookId="{{ $book->id }}">
        </x-book-card>
        @endforeach
    </div>
</x-app-layout>