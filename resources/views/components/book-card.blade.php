<div class="basis-1/4 drop-shadow grow shrink bg-white flex rounded-lg min-h-44">
    <img class="h-full grow-0 lg:w-32 rounded-lg flex-none bg-cover text-center overflow-hidden border-solid border-2 border-[#6875f5]"
        src="{{ $thumbnail }}" alt="" />
    <div class="flex flex-col grow justify-between p-4 leading-normal">
        <div class="text-gray-600 font-bold text-sm mb-2">{{ $title ?? '' }}</div>
        <div class="justify-end flex">
            <button data-modal-target="{{ $bookId }}" data-modal-toggle="{{ $bookId }}"
                class="block text-white bg-[#6875f5] hover:bg-[#4f5ef0] font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-[#4f5ef0] dark:hover:bg-[#4f5ef0]"
                type="button">
                About
            </button>
            <a class="block font-medium rounded-lg px-5 py-2.5 text-center"
                href="{{ $clicked ? route('removeFavorite', ['bookId' => $bookId]) : route('addFavorite', ['bookId' => $bookId]) }}">
                <svg width="30px" height="30px" viewBox="0 0 24 24" fill="{{ $clicked ? 'yellow' : 'none' }}"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M14.65 8.93274L12.4852 4.30901C12.2923 3.89699 11.7077 3.897 11.5148 4.30902L9.35002 8.93274L4.45559 9.68243C4.02435 9.74848 3.84827 10.2758 4.15292 10.5888L7.71225 14.2461L6.87774 19.3749C6.80571 19.8176 7.27445 20.1487 7.66601 19.9317L12 17.5299L16.334 19.9317C16.7256 20.1487 17.1943 19.8176 17.1223 19.3749L16.2878 14.2461L19.8471 10.5888C20.1517 10.2758 19.9756 9.74848 19.5444 9.68243L14.65 8.93274Z"
                        stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </a>
        </div>
    </div>
</div>

<div id="{{ $bookId }}" tabindex="-1"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button"
                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                data-modal-hide="{{ $bookId }}">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5 text-center">
                <img class="mx-auto mb-4 drop-shadow-xl" src="{{ $thumbnail }}" alt="">
                <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800" id="defaultTab" data-tabs-toggle="#defaultTabContent" role="tablist">
                    <li class="me-2">
                        <button id="about-tab" data-tabs-target="{{ '#about_'.$bookId }}" type="button" role="tab" aria-controls="about" aria-selected="true" class="inline-block p-4 text-blue-600 rounded-ss-lg hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-blue-500">About</button>
                    </li>
                    <li class="me-2">
                        <button id="description-tab" data-tabs-target="{{ '#description_'.$bookId }}" type="button" role="tab" aria-controls="description" aria-selected="false" class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">Description</button>
                    </li>
                    <li class="me-2">
                        <button id="shop-tab" data-tabs-target="{{ '#shop_'.$bookId }}" type="button" role="tab" aria-controls="statistics" aria-selected="false" class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">Shop</button>
                    </li>
                </ul>
                <div id="defaultTabContent">
                    <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="{{ 'about_'.$bookId }}" role="tabpanel" aria-labelledby="about-tab">
                        <h2 class="mb-3 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white">{{ $title }}</h2>
                        <p class="mb-3 text-gray-500 dark:text-gray-400">{{ $searchInfo }}</p>
                    </div>
                    <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="{{ 'description_'.$bookId }}" role="tabpanel" aria-labelledby="categories-tab">
                        <ul role="list" class="space-y-4 text-gray-500 dark:text-gray-400">
                            <li class="flex space-x-2 rtl:space-x-reverse">
                                <span class="leading-tight items-center">{{ $description }}</span>
                            </li>
                        </ul>
                    </div>
                    <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="{{ 'shop_'.$bookId }}" role="tabpanel" aria-labelledby="statistics-tab">
                        <dl class="grid max-w-screen-xl grid-cols-2 gap-8 p-4 mx-auto text-gray-900 sm:grid-cols-3 xl:grid-cols-6 dark:text-white sm:p-8">
                            <div class="flex flex-col">
                                <dt class="mb-2 text-3xl font-extrabold">{{ numfmt_format_currency(numfmt_create('pt_BR', NumberFormatter::CURRENCY), floatval($saleInfo), $currencyCode) }}</dt>
                                <dd class="text-gray-500 dark:text-gray-400">Public repositories</dd>
                            </div>
                        </dl>
                    </div>
                </div>
                <a class="block font-medium rounded-lg px-5 py-2.5 text-center"
                href="{{ $clicked ? route('removeFavorite', ['bookId' => $bookId]) : route('addFavorite', ['bookId' => $bookId]) }}">
                <svg width="30px" height="30px" viewBox="0 0 24 24" fill="{{ $clicked ? 'yellow' : 'none' }}"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M14.65 8.93274L12.4852 4.30901C12.2923 3.89699 11.7077 3.897 11.5148 4.30902L9.35002 8.93274L4.45559 9.68243C4.02435 9.74848 3.84827 10.2758 4.15292 10.5888L7.71225 14.2461L6.87774 19.3749C6.80571 19.8176 7.27445 20.1487 7.66601 19.9317L12 17.5299L16.334 19.9317C16.7256 20.1487 17.1943 19.8176 17.1223 19.3749L16.2878 14.2461L19.8471 10.5888C20.1517 10.2758 19.9756 9.74848 19.5444 9.68243L14.65 8.93274Z"
                        stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </a>
            </div>
        </div>
    </div>
</div>
