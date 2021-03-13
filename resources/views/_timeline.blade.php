<div class="border border-gray-300 rounded-lg">
    @forelse ($posts as $post)
        @include('_post')
    @empty
        <h3 class="p-4">There is no posts yet.</h3>
    @endforelse
</div>