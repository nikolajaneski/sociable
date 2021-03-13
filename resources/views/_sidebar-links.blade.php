<ul>
    <li><a 
        class="font-bold text-lg mb-4 block"
        href="{{ route('posts') }}"
    >Home</a></li>
    <li><a 
        class="font-bold text-lg mb-4 block"
        href="{{ route('explore') }}"
    >Explore</a></li>
    <li><a 
        class="font-bold text-lg mb-4 block"
    href="{{ route('notifications') }}"
    >Notifications</a></li>
    <li><a 
        class="font-bold text-lg mb-4 block"
        href="{{ current_user()->path() }}"
    >Profile</a></li>
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