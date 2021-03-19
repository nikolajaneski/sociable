<form class="flex justify-between" method="POST" action="/post/{{ $post->id }}/comment">
    @csrf
    <x-input class="block mt-1 w-full h-8 text-xs rounded-xl" type="text" name="body" placeholder="Write a comment..." required />
    <x-send-button />
</form>