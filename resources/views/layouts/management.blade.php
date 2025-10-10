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

        <!-- Font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Parkinsans:wght@300..800&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>

            * {
                font-family: 'Parkinsans', sans-serif;
            }
            ::-webkit-scrollbar {
                display: none;
            }
        </style>


    </head>
    <body class="bg-zinc-200 min-h-screen flex flex-col items-center justify-between overflow-hidden">

        <div class="bg-white w-full mx-auto min-h-screen max-h-screen overflow-hidden flex"  x-data="{ showSidebar: false }">

            <x-sidebar />

            <div class="w-full min-h-screen bg-zinc-100 max-h-screen overflow-y-scroll">

                <div class="mb-6 flex items-center justify-between h-16 px-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl font-semibold text-gray-800">@yield('header', 'Dashboard')</h1>
                    <div>
                        {{-- Alpine Navbar Component --}}
                    </div>
                </div>

                <div class="p-6">
                <x-flash />
                    @yield('content')
                </div>

                <x-form-sidebar />
            </div>
        </div>

        @livewireScripts
    </body>
</html>
