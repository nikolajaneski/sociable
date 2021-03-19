<li class="mb-4">
    <div class="flex justify-between items-center">
        <div class="flex items-center">
            <img 
                src="{{ $user->avatar }}" 
                alt=""
                class="rounded-full mr-2"
                width="50"
                height="50"
            >
            <div>
                <a 
                    href="{{ $user->path() }}"
                    class="flex  text-sm" >
                    {{ $user->name }}
                </a>
                <p class="text-xs text-gray-500">{{ '@'.$user->username }}</p>
            </div>
        </div>
        <x-follow-icon-button :user="$user"></x-follow-icon-button>
    </div>
</li>     