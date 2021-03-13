<div @click.away="open = false" class="relative" x-data="{ open: false }">
    <button @click="open = !open" class="inline-flex justify-center w-full bg-white text-sm text-gray-700">
        <svg viewBox="0 0 20 20" class="w-4">
            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g class="fill-current">
                    <path d="M10,12 C11.1045695,12 12,11.1045695 12,10 C12,8.8954305 11.1045695,8 10,8 C8.8954305,8 8,8.8954305 8,10 C8,11.1045695 8.8954305,12 10,12 Z M10,6 C11.1045695,6 12,5.1045695 12,4 C12,2.8954305 11.1045695,2 10,2 C8.8954305,2 8,2.8954305 8,4 C8,5.1045695 8.8954305,6 10,6 Z M10,18 C11.1045695,18 12,17.1045695 12,16 C12,14.8954305 11.1045695,14 10,14 C8.8954305,14 8,14.8954305 8,16 C8,17.1045695 8.8954305,18 10,18 Z" id="Combined-Shape"></path>
                </g>
            </g>
        </svg>
    </button>
    <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48">
        <div class="px-2 py-2 bg-white rounded-md shadow dark-mode:bg-gray-800">
            {{-- @if ($post->user->id == current_user()->id) --}}
                {{-- <form method="POST" action="/post/{{ $post->id }}"> --}}
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="pl-2 pr-32 py-2 text-sm text-gray-700" role="menuitem">Delete</button>
                {{-- </form> --}}
            {{-- @endif --}}
            <button class="pl-2 pr-32 py-2 text-sm text-gray-700" role="menuitem">Report</button>
        </div>
    </div>
</div>    