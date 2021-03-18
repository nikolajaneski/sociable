<ul>
    <li><a 
        class="font-bold text-lg mb-4 block {{ request()->is('posts') ? 'text-blue-500' : '' }}"
        href="{{ route('posts') }}"
    >Home</a></li>
    <li><a 
        class="font-bold text-lg mb-4 block  {{ request()->is('explore') ? 'text-blue-500' : '' }}"
        href="{{ route('explore') }}"
    >Explore</a></li>
    <li>
        <a 
            class="flex font-bold text-lg mb-4 {{ request()->is('notifications') ? 'text-blue-500' : '' }}"
            href="{{ route('notifications') }}"
        >
            Notifications 
            @if (!auth()->user()->unreadNotifications->isEmpty())
                <span class="text-red-500 ml-1">
                    <svg class="w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                </span>
            @endif
        </a>
    </li>

    <li><a 
        class="font-bold text-lg mb-4 block {{ request()->routeIs('profile') && request()->user->id === auth()->user()->id ? 'text-blue-500' : '' }}"
        href="{{ current_user()->path() }}"
    >My profile</a></li>
    <li>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button
                class="font-bold text-lg mb-4 block"
                type="submit"
            >Logout</button>
        </form>
    </li>
</ul>