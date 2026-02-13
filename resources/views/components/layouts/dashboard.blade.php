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

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
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
                        <img src="{{ asset('logo.jpg') }}" class="size-8" alt="Logo">

                        <div class="hidden md:block">
                            <div class="ml-10 flex items-baseline space-x-4">

                                <a href="{{ route('dashboard') }}"
                                    class="rounded-md px-3 py-2 text-sm font-medium
                               {{ request()->routeIs('dashboard') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white' }}">
                                    Inicio
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

                                @if(Auth::user()->role->value === 'empresa')
                                <x-dropdown-link href="{{ route('empresa.perfil.edit') }}">
                                    Perfil de empresa
                                </x-dropdown-link>
                                @endif

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

                </div>
            </div>
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

                {{-- ========================================================= --}}
                {{-- ACCESOS DIRECTOS SEGÚN EL ROL DEL USUARIO --}}
                {{-- ========================================================= --}}

                @if(Auth::user()->role->value === 'empresa')
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mt-10">

                    {{-- CREAR OFERTA --}}
                    <a href="{{ route('empresa.ofertas.create') }}"
                        class="bg-white dark:bg-gray-800 shadow-md rounded-xl p-6 border border-gray-200 
                              dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition">

                        <svg class="w-10 h-10 text-[#1F4E79] dark:text-indigo-300 mb-4"
                            fill="none" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>

                        <h3 class="font-semibold text-lg">Crear oferta</h3>
                        <p class="text-gray-500 dark:text-gray-400 text-sm">Publica una nueva vacante</p>
                    </a>

                    {{-- MIS OFERTAS --}}
                    <a href="{{ route('empresa.ofertas.index') }}"
                        class="bg-white dark:bg-gray-800 shadow-md rounded-xl p-6 border border-gray-200 
                              dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition">

                        <svg class="w-10 h-10 text-[#1F4E79] dark:text-indigo-300 mb-4"
                            fill="none" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M4.5 6.75h15m-15 4.5h15m-15 4.5h15" />
                        </svg>

                        <h3 class="font-semibold text-lg">Mis ofertas</h3>
                        <p class="text-gray-500 dark:text-gray-400 text-sm">Gestiona tus vacantes</p>
                    </a>

                    {{-- PERFIL EMPRESA --}}
                    <a href="{{ route('empresa.perfil.edit') }}"
                        class="bg-white dark:bg-gray-800 shadow-md rounded-xl p-6 border border-gray-200 
                              dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition">

                        <svg class="w-10 h-10 text-[#1F4E79] dark:text-indigo-300 mb-4"
                            fill="none" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 21V7a2 2 0 012-2h3V3h4v2h3a2 2 0 012 2v14M3 21h18M7 10h.01M7 14h.01M7 18h.01M11 10h.01M11 14h.01M11 18h.01M15 10h.01M15 14h.01M15 18h.01" />
                        </svg>

                        <h3 class="font-semibold text-lg">Perfil empresa</h3>
                        <p class="text-gray-500 dark:text-gray-400 text-sm">Actualiza tus datos</p>
                    </a>

                    {{-- ESTADÍSTICAS --}}
                    <div class="bg-white dark:bg-gray-800 shadow-md rounded-xl p-6 border border-gray-200 
                                dark:border-gray-700 opacity-50 cursor-not-allowed">

                        <svg class="w-10 h-10 text-gray-400 dark:text-gray-500 mb-4"
                            fill="none" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M4.5 19.5l3-6 4.5 9 3-6 4.5 3" />
                        </svg>

                        <h3 class="font-semibold text-lg">Estadísticas</h3>
                        <p class="text-gray-500 dark:text-gray-400 text-sm">Próximamente</p>
                    </div>

                </div>
                @endif


                {{-- ========================= --}}
                {{-- ACCESOS PARA CANDIDATO --}}
                {{-- ========================= --}}
                @if(Auth::user()->role->value === 'candidato')
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mt-10">

                    {{-- OFERTAS DISPONIBLES --}}
                    <a href="{{ route('candidato.ofertas.index') }}"
                        class="bg-white dark:bg-gray-800 shadow-md rounded-xl p-6 border border-gray-200 
                              dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition">

                        <svg class="w-10 h-10 text-[#1F4E79] dark:text-indigo-300 mb-4"
                            fill="none" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-4.35-4.35M10.5 18a7.5 7.5 0 110-15 7.5 7.5 0 010 15z" />
                        </svg>

                        <h3 class="font-semibold text-lg">Ofertas disponibles</h3>
                        <p class="text-gray-500 dark:text-gray-400 text-sm">Busca nuevas oportunidades</p>
                    </a>

                    {{-- PERFIL CANDIDATO --}}
                    <a href="{{ route('candidato.perfil.edit') }}"
                        class="bg-white dark:bg-gray-800 shadow-md rounded-xl p-6 border border-gray-200 
                              dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition">

                        <svg class="w-10 h-10 text-[#1F4E79] dark:text-indigo-300 mb-4"
                            fill="none" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 21v-6a9 9 0 0118 0v6M12 12a4 4 0 100-8 4 4 0 000 8z" />
                        </svg>

                        <h3 class="font-semibold text-lg">Mi perfil</h3>
                        <p class="text-gray-500 dark:text-gray-400 text-sm">Actualiza tu información</p>
                    </a>

                    {{-- MI CV --}}
                    <div class="bg-white dark:bg-gray-800 shadow-md rounded-xl p-6 border border-gray-200 
                                dark:border-gray-700 opacity-50 cursor-not-allowed">

                        <svg class="w-10 h-10 text-gray-400 dark:text-gray-500 mb-4"
                            fill="none" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h6l4 4v12a2 2 0 01-2 2z" />
                        </svg>

                        <h3 class="font-semibold text-lg">Mi CV</h3>
                        <p class="text-gray-500 dark:text-gray-400 text-sm">Próximamente</p>
                    </div>

                    {{-- RECOMENDACIONES --}}
                    <div class="bg-white dark:bg-gray-800 shadow-md rounded-xl p-6 border border-gray-200 
                                dark:border-gray-700 opacity-50 cursor-not-allowed">

                        <svg class="w-10 h-10 text-gray-400 dark:text-gray-500 mb-4"
                            fill="none" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 17.25l-5.197 3.07 1.49-5.727L3 9.68l5.854-.473L12 3.75l3.146 5.457L21 9.68l-5.293 4.913 1.49 5.727L12 17.25z" />
                        </svg>

                        <h3 class="font-semibold text-lg">Recomendaciones</h3>
                        <p class="text-gray-500 dark:text-gray-400 text-sm">Próximamente</p>
                    </div>

                </div>
                @endif

            </div>
        </main>

    </div>

</body>

</html>