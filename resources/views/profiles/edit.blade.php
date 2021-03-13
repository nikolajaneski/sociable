<x-app>
    <form action="{{ $user->path() }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <div>
            <x-label for="username" :value="__('Username')" />

            <x-input id="username" class="block mt-1 w-full" type="text" name="username" value="{{ $user->username }}" required autofocus />
        </div>

        <div class="mt-4">
            <x-label for="name" :value="__('Name')" />

            <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $user->name }}" required autofocus />
        </div>

        <div class="mt-4">
            <x-label for="email" :value="__('Email')" />

            <x-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ $user->email }}" required />
        </div>

        <div class="mt-4">
            <x-label for="avatar" :value="__('Avatar')" />

            <div class="flex">
                <x-input id="avatar" class="block mt-1 w-full" type="file" name="avatar" />
    
                <img 
                    src="{{ $user->avatar }}" 
                    alt=""
                    class="rounded-full mr-2"
                    width="40"
                    height="40"
                >
            </div>
        </div>

        <div class="mt-4">
            <x-label for="cover" :value="__('Cover Image')" />

            <div class="flex">
                <x-input id="cover" class="block mt-1 w-full" type="file" name="cover" />
    
                <img 
                    src="{{ $user->cover }}" 
                    alt=""
                    class="rounded-full mr-2"
                    width="40"
                    height="40"
                >
            </div>
        </div>

        <div class="mt-4">
            <x-label for="description" :value="__('Description')" />

            <textarea id="description" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="description" required autofocus >{{ $user->description }}</textarea>
        </div>

        <div class="mt-4">
            <x-label for="password" :value="__('Password')" />

            <x-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
        </div>

        <div class="mt-4">
            <x-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required />
        </div>

        <div class="flex items-center">
            <div class="flex items-center justify-start mt-4">
                <x-button class="bg-blue-400 hover:bg-blue-500 text-white">
                    {{ __('Update') }}
                </x-button>
            </div>

            <a 
                href="{{ $user->path() }}"
                class="hover:underline mt-4 ml-4"
            >Cancel</a>
        </div>
    </form>
</x-app>