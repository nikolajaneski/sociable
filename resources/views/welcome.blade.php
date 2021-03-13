<x-master>
    <div class="mt-8 md:container md:mx-auto">

        <div class="box-border md:box-content">
            <h1 class="text-9xl	font-semibold text-center text-gray-400	uppercase font-sans">
                Sociable
            </h1>

            <div class="text-center hidden md:block md:ml-10 md:pr-4 md:space-x-8">
                @auth
                    <a href="{{ url('/posts') }}" class="font-medium text-gray-500 hover:text-gray-900">Home</a>
                @else
                    <a href="{{ route('register') }}" class="font-medium text-gray-500 hover:text-gray-900">Register</a>
                    <a href="{{ url('/login') }}" class="font-medium text-indigo-600 hover:text-indigo-500">Log in</a>
                @endauth
            </div>

        </div>


            {{-- <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
            </div> --}}
    </div>    
</x-master>