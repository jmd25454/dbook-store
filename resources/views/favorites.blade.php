<x-app-layout>
    <div class="max-w-7xl my-8 mx-auto sm:px-6 lg:px-8 flex flex-wrap gap-4">
        @foreach ($bookInfo as $book)
            <div class="w-full bg-white rounded-b lg:rounded-b-none lg:rounded-r flex">
                <div class="h-48 grow-0 lg:w-32 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden"
                    style="background-image: url('{{ $book->volumeInfo->imageLinks->thumbnail ?? '' }}')">
                </div>
                <div class="flex flex-col grow p-4 leading-normal">
                    <div class="text-gray-900 font-bold text-xl">{{ $book->volumeInfo->title ?? '' }}</div>
                    <div class="text-gray-600 font-bold text-l">{{ $book->volumeInfo->authors[0] ?? '' }}</div>
                    <p class="text-gray-700 h-12 overflow-hidden max-height -pt-8">
                        {{ $book->volumeInfo->description ?? '' }}</p>
                    @if (!empty($book->volumeInfo->description))
                        <p class="truncate ...">...</p>
                    @endif
                </div>
                <a class="relative" href="{{ route('removeFavorite', ['bookId' => $book->id]) }}">
                <svg class="absolute right-0" style="bottom: 0;" width="30px" height="30px" viewBox="0 0 24 24" fill="{{ 'yellow' }}"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M14.65 8.93274L12.4852 4.30901C12.2923 3.89699 11.7077 3.897 11.5148 4.30902L9.35002 8.93274L4.45559 9.68243C4.02435 9.74848 3.84827 10.2758 4.15292 10.5888L7.71225 14.2461L6.87774 19.3749C6.80571 19.8176 7.27445 20.1487 7.66601 19.9317L12 17.5299L16.334 19.9317C16.7256 20.1487 17.1943 19.8176 17.1223 19.3749L16.2878 14.2461L19.8471 10.5888C20.1517 10.2758 19.9756 9.74848 19.5444 9.68243L14.65 8.93274Z"
                        stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </a>
            </div>
        @endforeach
    </div>
</x-app-layout>
