<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased bg-[#F4F6F8] text-[#2E2E2E]">

    <x-banner />

    <!-- NAV SIEMPRE ARRIBA -->
    @livewire('navigation-menu')

    <!-- CONTENEDOR PRINCIPAL -->
    <div class="min-h-screen flex">

        <!-- SIDEBAR -->
        @if(auth()->check() && in_array(auth()->user()->role->value, ['admin', 'empresa']))
        @include('layouts.sidebar')
        @endif

        <!-- CONTENIDO -->
        <div class="flex-1">

            <!-- Page Heading -->
            @if (isset($header))
            <header class="bg-white shadow-sm border-b border-gray-200">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <h1 class="text-2xl font-semibold text-[#1F4E79]">
                        {{ $header }}
                    </h1>
                </div>
            </header>
            @endif

            <!-- Page Content -->
            <main class="px-4 sm:px-6 lg:px-8 py-8">
                <div class="bg-white shadow-md rounded-xl p-6">
                    {{ $slot }}
                </div>
            </main>

        </div>

    </div>

    @stack('modals')
    @livewireScripts

</body>

</html>