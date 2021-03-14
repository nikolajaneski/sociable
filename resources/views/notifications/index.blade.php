<x-app> 
    <div class="border border-gray-300 rounded-lg">
        @if (!$unreadNotifications->isEmpty())
            <h2 class="font-bold text-lg p-2">Latest notifications</h2>
            @foreach ($unreadNotifications as $n)
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
            @endforeach
        @endif

        @if (!$readNotifications->isEmpty())
            <h2 class="font-bold text-lg p-2">Older notifications</h2>
            @foreach ($readNotifications as $n)
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
            @endforeach
        @endif

        @if ($readNotifications->isEmpty() && $unreadNotifications->isEmpty())
            <div class="flex justify-between p-3">
                You dont have notifications.
            </div>
        @endif
        </ul>
    </div>
</x-app>
