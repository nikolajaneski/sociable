<x-master>
    <section class="px-8">
        <main class="container mx-auto">
            <div class="lg:flex lg:justify-between">
                @auth
                    <div class="lg:w-52">
                        @include('_sidebar-links')
                    </div>
                @endauth

                <div class="lg:flex-1 lg:mx-10" style="max-width: 700px">
                    {{ $slot }}
                </div>
                
                @auth
                    <div class="lg:w-1/5">
                        @if (request()->routeIs('profile') && request()->user->id === auth()->user()->id)
                            @include('_friends-list')
                        @else 
                            @include('_suggestions')
                        @endif
                        
                    </div>
                @endauth
            </div>
        </main>
    </section>
</x-master>