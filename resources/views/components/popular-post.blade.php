<li class="mb-4">
    <div class="text-sm {{ $loop->last ? '' : 'border-b border-gray-200' }} pb-2">
        <a 
            href="{{ $post->user->path() }}"
            class="flex mb-2 font-bold items-center hover:underline" >
            {{ $post->user->name }}
        </a>
        <p class="text-sm mb-2">{{ $post->body }}</p>
        <a class="font-bold" href="\post\{{ $post->id }}">Read more</a>
    </div>
</li>     