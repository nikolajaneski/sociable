<div class="bg-white border border-gray-300 rounded-lg pl-6 pt-4">
    <h3 class="font-bold text-xl mb-4">Following</h3>

    <ul>
        @forelse (current_user()->follows as $user)
            <li class="mb-4">
                <div>
                    <a 
                        href="{{ $user->path() }}"
                        class="flex items-center text-small" >
                        <img 
                            src="{{ $user->avatar }}" 
                            alt=""
                            class="rounded-full mr-2"
                            width="50"
                            height="50"
                        >
                        {{ $user->name }}
                    </a>
                    
                </div>
            </li>     
        @empty
            <p>No friends yet.</p>
        @endforelse
    </ul>
</div>