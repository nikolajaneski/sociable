<x-app> 
    <div class="border border-gray-300 rounded-lg">
        @forelse ($notifications as $n)
            <div class="flex justify-between p-3 {{ $loop->last ? '' : 'border-b border-gray-200' }}">
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
                        <p class="text-sm mb-1">
                            <a href="{{ $n->data['user_path'] }}" class="font-bold hover:underline">{{ $n->data['user_name'] }}</a> reacted on your <a href="/post/{{ $n->data['post_id'] }}" class="font-bold hover:underline">post</a>
                        </p>
                        <p class="text-xs text-gray-400">
                            {{ $n->created_at->diffForHumans()}}
                        </p>
              
                    </div>
                </div>
            
                <div>
                    <x-notification-options />
                </div>
            
            </div>                
        @empty
            <div class="flex justify-between p-3">
                There is no new notification.
            </div>
        @endforelse
        </ul>
    </div>
</x-app>
