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
    
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
    
            <form class="w-80 ml-20" method="POST" action="{{ route('register') }}">
                @csrf
                <!-- Username -->
                <div>
                    <x-input id="username" class="block mt-1 w-full" type="text" name="username" placeholder="Username" :value="old('username')" required autofocus />
                </div>
                <!-- Name -->
                <div class="mt-4">
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" placeholder="Full Name" :value="old('name')" required autofocus />
                </div>
    
                <!-- Email Address -->
                <div class="mt-4">
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" placeholder="Email" :value="old('email')" required />
                </div>
    
                <!-- Password -->
                <div class="mt-4">
                    <x-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    placeholder="Password"
                                    required autocomplete="new-password" />
                </div>
    
                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    placeholder="Confirm Password"
                                    name="password_confirmation" required />
                </div>
    
                <div class="flex items-center justify-between mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>
    
                    <x-app-button>
                        REGISTER
                    </x-app-button>
                </div>
            </form>
        </x-slot>

    </x-auth-card>
</x-master>
