<div class="flex justify-between items-center bg-white p-4 border rounded-lg border-gray-300 mb-2">
    <div>
        <a href="{{ $user->path() }}" class="flex items-center">
            <img 
                src="{{ $user->avatar }}" 
                alt="{{ $user->name }}'s avatar"
                width="60"
                class="mr-4 rounded-full"
            >
            
            <div class="items-center">
                <h4 class="font-bold">{{ $user->name }}</h4>
                <h6 class="text-gray-400">{{ '@' . $user->username }}</h4>
            </div>
        </a>
    </div>
    <div>
        @unless (current_user()->following($user))
            <x-follow-button :user="$user" />
        @endunless
    </div>
</div>