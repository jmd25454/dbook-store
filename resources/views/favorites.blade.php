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
            </div>
        @endforeach
    </div>
</x-app-layout>
