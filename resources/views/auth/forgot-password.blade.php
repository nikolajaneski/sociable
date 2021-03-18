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
            <div class="w-96 ml-20">
                <div class="mb-4 text-sm text-gray-600">
                    {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                </div>
        
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />
        
                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
        
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
        
                    <!-- Email Address -->
                    <div>
                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" placeholder="Email" :value="old('email')" required autofocus />
                    </div>
        
                    <div class="flex items-center justify-end mt-4">
                        <x-app-button>
                            SEND RESET LINK
                        </x-app-button>
                    </div>
                </form>
            </div>
        </x-slot>

    </x-auth-card>
</x-master>
