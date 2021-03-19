<div class="flex justify-between bg-white p-4 border rounded-lg border-gray-300 mb-2">
    <div class="flex">
        <div class="mr-2 flex-shrink-0">
            <a href="{{ $n->data['user_path'] }}">
                <img 
                    src="{{ $n->data['user_avatar'] }}" 
                    alt=""
                    class="rounded-full mr-2"
                    width="40"
                    height="40"
                >
            </a>
        </div>
    
        <div>
            @switch($n->type)
                @case('App\Notifications\UserFollowed')
                    <x-follow-notification :n="$n" :loop="$loop"/>
                    @break
                @case('App\Notifications\PostLiked')
                    <x-react-notification :n="$n" :loop="$loop"/>
                    @break
                @case('App\Notifications\PostCommented')
                    <x-comment-notification :n="$n" :loop="$loop"/>
                    @break
            @endswitch
            
            <p class="text-xs text-gray-400">
                {{ $n->created_at->diffForHumans()}}
            </p>
  
        </div>
    </div>

    <div>
        <x-notification-options />
    </div>
    {{ $n->markAsRead() }}
</div>        