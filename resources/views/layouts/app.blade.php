<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 lg:flex lg:justify-between">
                        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 lg:w-1/6">
                            @include('timeline.sidebar_links')
                        </div>
                        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg lg:flex-1 lg:mx-10 p-8">
                            {{ $slot }}
                        </div>
                        <div class="bg-blue-100 overflow-hidden shadow-xl sm:rounded-lg p-6 lg:w-1/6">
                            @include('timeline._friends-list')
                        </div>
                    </div>
                </div>
            </main>
        </div>

        @stack('modals')

        @livewireScripts
        <script src="http://unpkg.com/turbolinks"></script>
    </body>
</html>
