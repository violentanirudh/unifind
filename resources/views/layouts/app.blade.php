<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>@yield('title', 'UniFind')</title>

        <!-- Styles -->
        @livewireStyles
        @vite('resources/css/app.css')

        <!-- Icons -->
        <link
            rel="stylesheet"
            type="text/css"
            href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.2/src/bold/style.css"
        />

        <!-- Styles -->
        <style>
            ::-webkit-scrollbar {
                display: none;
            }
        </style>


    </head>
    <body class="bg-zinc-200 min-h-screen flex flex-col items-center justify-between overflow-hidden">

        <div class="bg-white w-full sm:w-sm mx-auto min-h-screen max-h-screen overflow-y-scroll">
            <x-navbar />

            <div class="p-6">
                <x-flash />
                @yield('content')
            </div>
        </div>

        @livewireScripts
    </body>
</html>
