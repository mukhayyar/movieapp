<div class="relative mt-3 md:mt-0" x-data={isOpen:true} @click.away="isOpen = false">
    <input wire:model.debounce.500ms="search" type="text" x-ref="search" @keydown.window="
        if (event.keyCode == 191) {
            event.preventDefault();
            $refs.search.focus();
        }
        " class="bg-gray-800 rounded-full w-64 px-4 pl-8 py-1 focus:outline-none focus:shadow-outline"
        placeholder="Search" @focus="isOpen = true" @keydown.escape.window="isOpen = false"
        @keydown.shift.tab="isOpen = false" @keydown="isOpen=true">

    <div class="absolute top-0">
        <svg class="fill-current w-4 text-gray-500 mt-2 ml-2" viewBox="0 0 32 32">
            <title>zoom-2</title>
            <g fill="#111111">
                <path fill="#111111"
                    d="M31.414,28.586l-7.931-7.931C25.058,18.505,26,15.864,26,13c0-7.168-5.832-13-13-13S0,5.832,0,13 s5.832,13,13,13c2.863,0,5.505-0.942,7.655-2.517l7.931,7.931L31.414,28.586z M2,13C2,6.935,6.935,2,13,2s11,4.935,11,11 s-4.935,11-11,11S2,19.065,2,13z">
                </path>
            </g>
        </svg>
    </div>

    <div wire:loading class="spinner top-0 right-0 mr-4 mt-3">
    </div>

    @if(strlen($search) > 2)
    <div class="z-50 absolute bg-gray-800 text-sm rounded w-64 mt-4" x-show.transition.opacity="isOpen"
        @keydown.escape.windows="isOpen = false">
        @if($searchResults->count() > 0)
        <ul>
            @foreach($searchResults as $search)

            <li class="border-b border-gray-700">
                <a href="{{route('movies.show', $search['id'])}}"
                    class="block hover:bg-gray-700 px-3 py-3 flex items-center" @if($loop->last)
                    @keydown.tab.exact="isOpen =
                    false" @endif
                    >
                    @if($search['poster_path'])
                    <img src="https://image.tmdb.org/t/p/w92{{$search['poster_path']}}" alt="poster" class="w-8">
                    @else
                    <img src="https://via.placeholder.com/50x75" alt="">
                    @endif
                    <span class="ml-4">
                        {{$search['title']}}
                    </span>

                </a>
            </li>
            @endforeach
        </ul>
        @else
        <div class="px-3 py-3">No Results for "{{$search}}"</div>
        @endif
    </div>
    @endif
</div>