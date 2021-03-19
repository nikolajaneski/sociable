<div class="bg-white p-4 border rounded-lg border-gray-300 mb-2">
    <x-post :post="$post" />

    <div class="pl-12 mb-4">
        <x-comment-panel :post="$post"/>
    </div>
    
    @foreach ($post->comments as $comment)
        <x-comment :comment="$comment" />
    @endforeach
</div>