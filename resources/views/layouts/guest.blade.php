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
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body>
        <header class="relative">
            <div class="px-4 sm:px-6 md:px-8">
                <div class="relative pt-6 lg:pt-8 flex items-center justify-between text-gray-700 font-semibold text-sm leading-6">
                    <div class="logo">Cursos UTE</div>
                    <div class="flex items-center">
                        <nav class="hidden  md:block">
                            <ul class="flex items-center space-x-8">
                                <li><a class="hover:text-sky-500" href="/">Home</a></li>
                                <li><a class="hover:text-sky-500" href="/">Eventos</a></li>
                                <li><a class="hover:text-sky-500" href="/">Cursos</a></li>
                                <li><a class="hover:text-sky-500" href="/">FAQ</a></li>
                                <li><a class="hover:text-sky-500" href="/">Contacto</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>
    </body>
</html>
