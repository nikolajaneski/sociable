
<div class="bg-white border border-gray-300 rounded-lg px-6 pt-4 mb-4">
    <h3 class="font-bold text-xl mb-4">Popular people</h3>
    <ul>
        @forelse (\App\Models\User::get()->random(3) as $user)
            <li class="mb-4">
                <div class="flex justify-between items-center">
                    <div class="flex items-center">
                        <img 
                            src="{{ $user->avatar }}" 
                            alt=""
                            class="rounded-full mr-2"
                            width="50"
                            height="50"
                        >
                        <div>
                            <a 
                                href="{{ $user->path() }}"
                                class="flex  text-sm" >
                                {{ $user->name }}
                            </a>
                            <p class="text-xs text-gray-500">@ {{ $user->username }}</p>
                        </div>
                    </div>
                    <x-follow-icon-button :user="$user"></x-follow-icon-button>
    
                    
                </div>
            </li>     
        @empty
            <p>There is no people yet... :( </p>
        @endforelse
    </ul>
</div>
{{-- <hr class="h-1 bg-gray-400 my-6"> --}}

<div class="bg-white border border-gray-300 rounded-lg px-6 pt-6">

<h3 class="font-bold text-xl mb-4">Popular posts</h3>
    <ul>
        @forelse (\App\Models\Post::get()->random(3) as $post)
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
        @empty
            <p>The is no posts yet... :( </p>
        @endforelse
    </ul>
</div>