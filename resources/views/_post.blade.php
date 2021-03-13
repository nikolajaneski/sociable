<div class="p-4 {{ $loop->last ? '' : 'border-b border-gray-200' }}">
    <div class="flex justify-between mb-2">
        <div class="flex">
            <div class="mr-2 flex-shrink-0">
                <a href="{{ $post->user->path() }}">
                    <img 
                        src="{{ $post->user->avatar }}" 
                        alt=""
                        class="rounded-full mr-2"
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
            <x-input class="block mt-1 w-full h-8 text-xs rounded-2xl" type="text" name="body" placeholder="Write a comment..." required />
            <x-send-button />
        </form>
    </div>
    
    {{-- <hr class="my-4"> --}}
    
    @foreach ($post->comments as $comment)
        
        <div class="flex pl-12">
            <div class="mr-2 flex-shrink-0">
                <a href="{{ $comment->user->path() }}">
                    <img 
                        src="{{ $comment->user->avatar }}" 
                        alt=""
                        class="rounded-full mr-2"
                        width="30"
                        height="30"
                    >
                </a>
            </div>
        
            <div class="{{ $loop->last ? '' : 'border-b border-gray-200 mb-2' }}" style="width: 528px"> 
                <a href="{{ $comment->user->path() }}">
                    <h5 class="font-bold mb-4">{{ $comment->user->name }}</h5>
                </a>
                <p class="text-sm mb-3">
                    {{ $comment->body }}
                </p>
            </div>
        </div>

    @endforeach
</div>