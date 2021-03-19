<x-app> 

    <header class="mb-4 relative bg-white rounded-b-lg border-l border border-t-0 border-gray-300">
        <div class="relative">
            <img 
                src="{{ $user->cover }}" 
                alt=""
            >
    
            <img 
                src="{{ $user->avatar }}" 
                alt="{{ $user->name }}"
                class="rounded-full mr-2 absolute bottom-0 transform -translate-x-1/2 translate-y-1/2"
                style="left: 50%"
                width="150"
            >
        </div>

        <div class="p-4">
            <div class="flex justify-between items-center mt-2 mb-4">
                <div>
                    <h2 class="font-bold text-2xl">{{ $user->name }}</h2>
                    <p class="text-sm">Joined {{ $user->created_at->diffForHumans() }}</p>
                </div>
    
                <div class="flex items-center">
                    @can('edit', $user)
                        <a
                            href="{{ $user->path('edit') }}" 
                            class="border shadow rounded-lg py-2 px-4 mr-2 text-black hover:bg-gray-50"
                        >
                            Edit Profile
                        </a>
                    @endcan
                    
                    <x-follow-button :user="$user"></x-follow-button>
                </div>
            </div>
    
                
            <p class="text-sm mb-4">
                {{ $user->description }}
            </p>
    
            <div class="flex justify-start">
                <p class="text-xs mr-2"><span class="font-bold">{{ $user->follows->count() }}</span> following</p>
                <p class="text-xs"><span class="font-bold">{{ $user->followers->count() }}</span> followers</p>
            </div>
        </div>

    </header>

    <x-post-panel />

    <x-timeline :posts="$user->posts" />
</x-app>
