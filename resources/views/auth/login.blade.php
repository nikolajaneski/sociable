<x-master>
    <x-auth-card>
        <x-slot name="left">
            <div class="ml-10">
                <h5 class="text-6xl font-bold text-center text-gray-700">SOCIABLE</h5>
                <h4 class="font-bold text-2xl ml-8 mb-10 text-gray-400" style="width: 460px">
                    To the world you may be the one person. But for us you are the world. 
                </h4>
                <img src="/images/intro.jpg" width="500" height="500" class="ml-4" alt="Welcom image">
            </div>
        </x-slot>

        <x-slot name="right">
            <div class="ml-20">
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />
        
                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
        
                <form class="mt-56 w-80" method="POST" action="{{ route('login') }}">
                    @csrf
        
                    <!-- Email Address -->
                    <div>
                        {{-- <x-label for="email" :value="__('Email')" /> --}}
        
                        <x-input id="email" class="block mt-1 w-80" 
                                    type="email" 
                                    name="email"
                                    placeholder="Email"
                                    :value="old('email')" 
                                    required autofocus />
                    </div>
        
                    <!-- Password -->
                    <div class="mt-4">
                        {{-- <x-label for="password" :value="__('Password')" /> --}}
        
                        <x-input id="password" class="block mt-1 w-80"
                                        type="password"
                                        name="password"
                                        placeholder="Password"
                                        required autocomplete="current-password" />
                    </div>
      
                    <div class="flex items-center justify-between mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
        
                        <x-app-button>
                            LOG IN
                        </x-app-button>
                    </div>
                </form>

                <p class="text-sm mt-44">Don't have account yet? <a href="/register" class="font-bold">Register now</a> and start sharing with your friends.</p>
            </div>
        </x-slot>
    </x-auth-card>
</x-master>
