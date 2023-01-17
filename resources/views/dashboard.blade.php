<x-app-layout>
    <div class="my-8 flex flex-col items-center justify-center">
        <form>
            <label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <input type="search" id="search"
                    class="block w-full p-4 text-sm rounded-full text-gray-900 border border-gray-300 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search" required>
                <button type="submit"
                    class="absolute right-0 bottom-0 focus:ring-4 focus:outline-none px-4 py-2">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z">
                            </path>
                        </svg>
                    </div>
                </button>
            </div>
        </form>
    </div>
    <div
        class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-wrap gap-4 after:basis-1/4 after:grow after:shrink before:basis-1/4 before:grow before:shrink after:order-last before:order-last">
        @foreach ($books as $book)
            <div class="basis-1/4 grow shrink bg-white rounded-b lg:rounded-b-none lg:rounded-r flex">
                <div class="h-48 grow-0 lg:w-32 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden"
                    style="background-image: url('{{ $book->volumeInfo->imageLinks->thumbnail ?? '' }}')">
                </div>
                <div class="flex flex-col grow justify-between p-4 leading-normal">
                    <div class="text-gray-900 font-bold text-xl mb-2">{{ $book->volumeInfo->title }}</div>
                    <div class="justify-end flex">
                        <svg width="30px" height="30px" viewBox="0 0 24 24" fill="yellow"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M14.65 8.93274L12.4852 4.30901C12.2923 3.89699 11.7077 3.897 11.5148 4.30902L9.35002 8.93274L4.45559 9.68243C4.02435 9.74848 3.84827 10.2758 4.15292 10.5888L7.71225 14.2461L6.87774 19.3749C6.80571 19.8176 7.27445 20.1487 7.66601 19.9317L12 17.5299L16.334 19.9317C16.7256 20.1487 17.1943 19.8176 17.1223 19.3749L16.2878 14.2461L19.8471 10.5888C20.1517 10.2758 19.9756 9.74848 19.5444 9.68243L14.65 8.93274Z"
                                stroke="golden" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
