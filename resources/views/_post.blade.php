<div class="bg-white p-4 border rounded-lg border-gray-300 mb-2">
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

    <div class="pl-12 mb-4">
        <form class="flex justify-between" method="POST" action="/post/{{ $post->id }}/comment">
            @csrf
            <x-input class="block mt-1 w-full h-8 text-xs rounded-xl" type="text" name="body" placeholder="Write a comment..." required />
            <x-send-button />
        </form>
    </div>
    
    @foreach ($post->comments as $comment)
        <x-comment :comment="$comment" />
    @endforeach
</div>