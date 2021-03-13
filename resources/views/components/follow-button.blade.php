@unless (current_user()->is($user))
    <form action="/profiles/{{ $user->username }}/follow">
        @csrf
        <button 
            type="submit" 
            class="bg-blue-400 rounded-lg shadow py-2 px-4 text-white hover:bg-blue-500"
        >
            {{ current_user()->following($user) ? 'Unfollow' : 'Follow' }}
        </button>
    </form>
@endunless