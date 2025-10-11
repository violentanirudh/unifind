<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'UniFind')</title>

    <!-- Styles -->
    @PwaHead
    @livewireStyles
    @vite('resources/css/app.css')

    <!-- Icons -->
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.2/src/bold/style.css" />

    <!-- Styles -->
    <style>
        ::-webkit-scrollbar {
            display: none;
        }
    </style>


</head>

<body class="relative bg-gradient-to-br from-white to-blue-100 flex flex-col items-center justify-between min-h-screen">

        <div class="w-full max-w-screen-xl mx-auto z-10 py-4 ">

            <x-navbar />

            <div class="p-6">
                <x-flash />
                @yield('content')
            </div>

            <div class="p-10 text-center text-gray-500">
                <div class="flex gap-6 justify-center mb-4">
                    <a href="" class="text-blue-500 hover:underline">Privacy</a>
                    <a href="" class="text-blue-500 hover:underline">Terms</a>
                    <a href="" class="text-blue-500 hover:underline">Cookies</a>
                </div>
                <span class="text-sm">
                    &copy; {{ date('Y') }} UniFind. All rights reserved.
                </span>
            </div>

    </div>


    @livewireScripts
    @RegisterServiceWorkerScript
</body>

</html>
