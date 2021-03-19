<div class="flex justify-between mb-2">
    <div class="flex">
        <div class="mr-2 flex-shrink-0">
            <a href="{{ $post->user->path() }}">
                <img 
                    src="{{ $post->user->avatar }}" 
                    alt=""
                    class="rounded-full mr-1"
                    width="40"
                    height="40"
                >
            </a>
        </div>
    
        <div> 
            <a href="{{ $post->user->path() }}">
                <h5 class="font-bold mb-4">{{ $post->user->name }}</h5>
            </a>
            <p class="text-sm mb-3">
                {{ $post->body }}
            </p>
    
            <x-like-buttons :post="$post"/>
        </div>
    </div>

    <div>
        <x-post-options :post="$post"/>
    </div>
</div>