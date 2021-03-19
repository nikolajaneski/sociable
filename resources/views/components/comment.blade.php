<div class="flex pl-12">
    <div class="mr-2 flex-shrink-0">
        <a href="{{ $comment->user->path() }}">
            <img 
                src="{{ $comment->user->avatar }}" 
                alt=""
                class="rounded-full mr-1"
                width="30"
                height="30"
            >
        </a>
    </div>

    <div class="items-center flex">

        <div class="bg-gray-50 p-1 pl-2 border rounded-lg border-gray-300 mb-2 text-sm" style="width: 528px"> 
            <a class="w-auto" href="{{ $comment->user->path() }}">
                <h5 class="font-bold">{{ $comment->user->name }}</h5>
            </a>
            <p>
                {{ $comment->body }}
            </p>
        </div>

        <x-comment-options :comment="$comment"/>
    </div>
</div>