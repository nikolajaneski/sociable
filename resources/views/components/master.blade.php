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
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-white">
            <section class="px-8 py-4 mb-8">
                <div class="bg-white py-2 fixed w-full z-10 top-0">
                    <header class="flex justify-between container mx-auto">
                        <img style="height: 40px;" src="/images/new-logo.jpg" alt="NikolaJaneski">
    
                        @auth
                            <form action="{{ route('search') }}" method="POST">
                                @csrf
                                <div class="flex justify-between">
                                    <x-input id="name" class="block mr-2 w-full" type="text" name="name" value="" required />
                                        <x-button class="bg-blue-400 hover:bg-blue-500 text-white shadow">
                                            {{ __('Search') }}
                                        </x-button>
                                </div>
                            </form>
                        @endauth
                    </header>
                </div>
            </section>

            <!-- Page Content -->
            {{ $slot }}
        </div>
    </body>
</html>
