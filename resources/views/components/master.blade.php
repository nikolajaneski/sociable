<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased bg-gray-100">
        <div class="min-h-screen bg-gray-100">
            @if (Auth::user())
                <section class="8 py-4 mb-10">
                    <div class="bg-white py-2 fixed w-full z-10 top-0 shadow-md">
                        <header class="flex justify-between container mx-auto">
                            <div class="flex">
                                <img style="height: 40px;" class="mr-2" src="/images/new-logo.jpg" alt="NikolaJaneski">
            
                                @auth
                                    <form action="{{ route('search') }}" method="POST">
                                        @csrf
                                        <div class="flex justify-between">
                                            <x-input id="name" class="rounded-lg block mr-2 w-full" type="text" name="name" placeholder="Search friends" required />
                                        </div>
                                    </form>
                                @endauth
                            </div>
                            <div class="flex items-center">
                                <div>
                                    <h4 class="mr-2 text-gray-700 font-bold">{{ current_user()->name }}</h4>
                                    <h4 class="mr-2 text-gray-500 text-sm"> {{ '@'.current_user()->username }}</h4>
                                </div>
                                <img 
                                    src="{{ current_user()->avatar }}" 
                                    alt=""
                                    class="rounded-full mr-2"
                                    width="40"
                                    height="40"
                                >
                            </div>
                        </header>
                    </div>
                </section>                
            @endif

            <!-- Page Content -->
            {{ $slot }}
        </div>
    </body>
</html>
