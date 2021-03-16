@unless (current_user()->is($user))
    <form action="/profiles/{{ $user->username }}/follow">
        @csrf
        <button 
            type="submit" 
            class="ml-4 w-6 text-blue-400 hover:text-blue-500"
        >
            @if (!current_user()->following($user))
                <svg viewBox="0 0 20 20">
                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g class="fill-current">
                            <path d="M11,9 L11,5 L9,5 L9,9 L5,9 L5,11 L9,11 L9,15 L11,15 L11,11 L15,11 L15,9 L11,9 Z M10,20 C15.5228475,20 20,15.5228475 20,10 C20,4.4771525 15.5228475,0 10,0 C4.4771525,0 0,4.4771525 0,10 C0,15.5228475 4.4771525,20 10,20 Z" id="Combined-Shape"></path>
                        </g>
                    </g>
                </svg>
            @endif
        </button>
    </form>
@endunless