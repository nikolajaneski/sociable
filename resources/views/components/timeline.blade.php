<div>
    @forelse ($posts as $post)
        <x-post-container :post="$post" />
    @empty
        <h3 class="p-4">There is no posts yet.</h3>
    @endforelse
</div>