<div class="bg-white border border-gray-300 rounded-lg px-6 pt-4 mb-4">
    <h3 class="font-bold text-xl mb-4">Popular people</h3>
    <ul>
        @forelse (\App\Models\User::get()->random(3) as $user)
            <x-popular-user :user="$user"/>
        @empty
            <p>There is no people yet... :( </p>
        @endforelse
    </ul>
</div>

<div class="bg-white border border-gray-300 rounded-lg px-6 pt-4">

    <h3 class="font-bold text-xl mb-4">Popular posts</h3>
    <ul>
        @forelse (\App\Models\Post::get()->random(3) as $post)
            <x-popular-post :post="$post" :loop="$loop"/>
        @empty
            <p>The is no posts yet... :( </p>
        @endforelse
    </ul>
</div>