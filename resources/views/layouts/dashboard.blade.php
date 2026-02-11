<!DOCTYPE html>
<html lang="es" class="h-full bg-gray-900">

<head>
    <meta charset="UTF-8">
    <title>Panel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-full text-white">

    <div class="min-h-full">

        {{-- NAVBAR --}}
        <nav class="bg-gray-800/50">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">

                    {{-- LOGO + LINKS --}}
                    <div class="flex items-center">
                        <div class="shrink-0">
                            <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500"
                                class="size-8" alt="Logo">
                        </div>

                        <div class="hidden md:block">
                            <div class="ml-10 flex items-baseline space-x-4">

                                <a href="{{ route('dashboard') }}"
                                    class="rounded-md px-3 py-2 text-sm font-medium
                               {{ request()->routeIs('dashboard') ? 'bg-gray-950/50 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white' }}">
                                    Dashboard
                                </a>

                                @if(Auth::user()->role->value === 'empresa')
                                <a href="{{ route('empresa.ofertas.index') }}"
                                    class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">
                                    Mis ofertas
                                </a>
                                <a href="{{ route('empresa.ofertas.create') }}"
                                    class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">
                                    Crear oferta
                                </a>
                                @endif

                                @if(Auth::user()->role->value === 'candidato')
                                <a href="{{ route('candidato.ofertas.index') }}"
                                    class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">
                                    Ofertas disponibles
                                </a>
                                @endif

                            </div>
                        </div>
                    </div>

                    {{-- PERFIL --}}
                    <div class="hidden md:block">
                        <div class="ml-4 flex items-center md:ml-6">

                            {{-- NOTIFICACIONES --}}
                            <button class="relative rounded-full p-1 text-gray-400 hover:text-white">
                                <svg class="size-6" fill="none" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                                </svg>
                            </button>

                            {{-- DROPDOWN --}}
                            <div class="relative ml-3">
                                <x-dropdown align="right" width="48">
                                    <x-slot name="trigger">
                                        <button class="flex items-center text-sm rounded-full focus:outline-none">
                                            <img class="size-8 rounded-full"
                                                src="{{ Auth::user()->profile_photo_url }}"
                                                alt="{{ Auth::user()->name }}">
                                        </button>
                                    </x-slot>

                                    <x-slot name="content">
                                        <x-dropdown-link href="{{ route('profile.show') }}">
                                            Perfil
                                        </x-dropdown-link>

                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <x-dropdown-link href="{{ route('logout') }}"
                                                onclick="event.preventDefault(); this.closest('form').submit();">
                                                Cerrar sesión
                                            </x-dropdown-link>
                                        </form>
                                    </x-slot>
                                </x-dropdown>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </nav>

        {{-- HEADER --}}
        <header class="relative bg-gray-800 border-y border-white/10">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-white">
                    {{ $header ?? 'Panel' }}
                </h1>
            </div>
        </header>

        {{-- CONTENIDO --}}
        <main>
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        </main>

    </div>

</body>

</html>