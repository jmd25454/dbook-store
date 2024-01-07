<div class="basis-1/4 grow shrink bg-white flex rounded-lg" style="filter: drop-shadow(0 20px 13px rgb(0 0 0 / 0.03)) drop-shadow(0 8px 5px rgb(0 0 0 / 0.08));">
    <div class="h-48 grow-0 lg:w-32 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden"
        style="background-image: url('{{ $thumbnail }}')">
    </div>
    <div class="flex flex-col grow justify-between p-4 leading-normal">
        <div class="text-gray-900 font-bold text-xl mb-2">{{ $title ?? '' }}</div>
        <div class="justify-end flex">
            <a href="{{ $clicked ? route('removeFavorite', ['bookId' => $bookId]) : route('addFavorite', ['bookId' => $bookId])}}">
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
