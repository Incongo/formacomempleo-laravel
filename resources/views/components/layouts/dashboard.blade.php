<!DOCTYPE html>
<html lang="es"
    class="h-full"
    x-data="{
          darkMode: localStorage.getItem('darkMode') === 'true',
          toggleDark() {
              this.darkMode = !this.darkMode;
              localStorage.setItem('darkMode', this.darkMode);
          }
      }"
    :class="{ 'dark bg-gray-900 text-white': darkMode }">

<head>
    <meta charset="UTF-8">
    <title>Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">


    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Tailwind Elements -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
</head>

<body class="h-full">

    <div class="min-h-full">

        {{-- NAVBAR --}}
        <nav class="bg-gray-800 dark:bg-gray-900">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">

                    {{-- LOGO + LINKS --}}
                    <div class="flex items-center">
                        <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500"
                            class="size-8" alt="Logo">

                        <div class="hidden md:block">
                            <div class="ml-10 flex items-baseline space-x-4">

                                <a href="{{ route('dashboard') }}"
                                    class="rounded-md px-3 py-2 text-sm font-medium
                               {{ request()->routeIs('dashboard') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white' }}">
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

                    {{-- DARK MODE + PERFIL --}}
                    <div class="flex items-center space-x-4">

                        {{-- BOTÓN DARK MODE --}}
                        <button @click="toggleDark()"
                            class="p-2 rounded-md text-gray-300 hover:text-white hover:bg-white/10">
                            <svg x-show="!darkMode" class="size-6" fill="none" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364-.707-.707M6.343 6.343l-.707-.707m12.728 0-.707.707M6.343 17.657l-.707.707M12 8a4 4 0 1 0 0 8 4 4 0 0 0 0-8Z" />
                            </svg>

                            <svg x-show="darkMode" class="size-6" fill="none" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79Z" />
                            </svg>
                        </button>

                        {{-- DROPDOWN PERFIL --}}
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="flex items-center text-sm rounded-full">
                                    <img class="size-8 rounded-full"
                                        src="{{ Auth::user()->profile_photo_url }}"
                                        alt="{{ Auth::user()->name }}">
                                </button>
                            </x-slot>

                            <x-slot name="content">

                                <x-dropdown-link href="{{ route('profile.show') }}">
                                    Perfil de usuario
                                </x-dropdown-link>

                                {{-- SOLO EMPRESA --}}
                                @if(Auth::user()->role->value === 'empresa')
                                <x-dropdown-link href="{{ route('empresa.perfil.edit') }}">
                                    Perfil de empresa
                                </x-dropdown-link>
                                @endif

                                {{-- SOLO CANDIDATO --}}
                                @if(Auth::user()->role->value === 'candidato')
                                <x-dropdown-link href="{{ route('candidato.perfil.edit') }}">
                                    Perfil de candidato
                                </x-dropdown-link>
                                @endif

                                <div class="border-t border-gray-200 dark:border-gray-700 my-2"></div>

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

                    {{-- BOTÓN MENÚ MÓVIL --}}
                    <div class="md:hidden">
                        <button command="--toggle" commandfor="mobile-menu"
                            class="p-2 rounded-md text-gray-300 hover:text-white hover:bg-white/10">
                            <svg class="size-6 in-aria-expanded:hidden" fill="none" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                            <svg class="size-6 not-in-aria-expanded:hidden" fill="none" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6 18 18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                </div>
            </div>

            {{-- MENÚ MÓVIL --}}
            <el-disclosure id="mobile-menu" hidden class="md:hidden bg-gray-800 dark:bg-gray-900">
                <div class="px-2 pt-2 pb-3 space-y-1">
                    <a href="{{ route('dashboard') }}"
                        class="block rounded-md px-3 py-2 text-base font-medium text-white bg-gray-900">
                        Dashboard
                    </a>

                    @if(Auth::user()->role->value === 'empresa')
                    <a href="{{ route('empresa.ofertas.index') }}"
                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-white/5 hover:text-white">
                        Mis ofertas
                    </a>
                    <a href="{{ route('empresa.ofertas.create') }}"
                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-white/5 hover:text-white">
                        Crear oferta
                    </a>
                    @endif

                    @if(Auth::user()->role->value === 'candidato')
                    <a href="{{ route('candidato.ofertas.index') }}"
                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-white/5 hover:text-white">
                        Ofertas disponibles
                    </a>
                    @endif
                </div>
            </el-disclosure>
        </nav>

        {{-- HEADER --}}
        <header class="bg-white dark:bg-gray-800 shadow-sm">
            <div class="mx-auto max-w-7xl px-4 py-6">
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white">
                    {{ $header ?? 'Panel' }}
                </h1>
            </div>
        </header>

        {{-- CONTENIDO --}}
        <main>
            <div class="mx-auto max-w-7xl px-4 py-6">
                {{ $slot }}
            </div>
        </main>

    </div>

</body>

</html>