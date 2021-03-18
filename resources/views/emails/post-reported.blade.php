{{-- improve design --}}
<p><span>{{ $data['user']->name }}</span> has reported {{ $data['post']->user->name }}'s post.</p>

<div>
    <a href="{{ $data['post']->user->path() }}">
        <h5 class="font-bold mb-4">{{ $data['post']->user->name }}</h5>
    </a>
    <p class="text-sm mb-3">
        {{ $data['post']->body }}
    </p>
</div>

{{-- Path should be improved --}}
<a href="http://127.0.0.1:8000/post/{{ $data['post']->id }}">Check now</a>