<x-app> 

    <header class="mb-6 relative">
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


        <div class="flex justify-between items-center mt-2 mb-6">
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

            
        <p class="text-sm">
            {{ $user->description }}
        </p>

    </header>

    @include('_timeline', [
        'posts' => $user->posts
    ])
</x-app>
