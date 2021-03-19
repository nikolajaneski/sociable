<x-app>
    <div>
        @foreach ($users as $user)
            <x-user-explore :user="$user" />
        @endforeach

        {{ $users->links() }}
    </div>
</x-app>