<x-app> 
    <div class="">
        @if (!$unreadNotifications->isEmpty())
            <h2 class="font-bold text-lg p-2">Latest notifications</h2>
            @foreach ($unreadNotifications as $n)
                <x-notification :n="$n" :loop="$loop"/>
            @endforeach
        @endif

        @if (!$readNotifications->isEmpty())
            <h2 class="font-bold text-lg p-2">Older notifications</h2>
            @foreach ($readNotifications as $n)
                <x-notification :n="$n" :loop="$loop"/>
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
