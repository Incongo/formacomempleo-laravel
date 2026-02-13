<nav x-data="{ open: false }"
    class="bg-[#1F4E79] dark:bg-gray-900 text-white shadow-md transition">

    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <!-- Left side -->
            <div class="flex items-center space-x-6">

                <!-- Logo -->
                <a href="{{ route('dashboard') }}" class="flex items-center">
                    <x-application-mark class="block h-9 w-auto" />
                </a>

                <!-- Desktop Navigation Links -->
                <div class="hidden sm:flex space-x-6">

                    <!-- Dashboard -->
                    <x-nav-link href="{{ route('dashboard') }}" class="text-white/90 hover:text-white transition">
                        <span class="flex items-center space-x-2">
                            <!-- Home icon -->
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 12l9-9 9 9M4 10v10h6v-6h4v6h6V10" />
                            </svg>
                            <span>Inicio</span>
                        </span>
                    </x-nav-link>

                    <!-- SOLO EMPRESA -->
                    @if(auth()->user()->role->value === 'empresa')
                    <x-nav-link href="{{ route('empresa.ofertas.index') }}" class="text-white/90 hover:text-white transition">
                        <span class="flex items-center space-x-2">
                            <!-- Briefcase icon -->
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4 7h16M4 7v10a2 2 0 002 2h12a2 2 0 002-2V7M10 7V5a2 2 0 012-2h0a2 2 0 012 2v2" />
                            </svg>
                            <span>Mis ofertas</span>
                        </span>
                    </x-nav-link>
                    @endif

                    <!-- SOLO CANDIDATO -->
                    @if(auth()->user()->role->value === 'candidato')
                    <x-nav-link href="{{ route('candidato.ofertas.index') }}" class="text-white/90 hover:text-white transition">
                        <span class="flex items-center space-x-2">
                            <!-- Clipboard icon -->
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 2h6a2 2 0 012 2v1H7V4a2 2 0 012-2zM7 7h10v12a2 2 0 01-2 2H9a2 2 0 01-2-2V7z" />
                            </svg>
                            <span>Ofertas</span>
                        </span>
                    </x-nav-link>
                    @endif

                </div>
            </div>

            <!-- Right side -->
            <div class="hidden sm:flex items-center space-x-4">

                <!-- Dark Mode Toggle -->
                <button @click="document.documentElement.classList.toggle('dark')"
                    class="p-2 rounded-md hover:bg-white/10 transition">
                    <!-- Sun -->
                    <svg class="w-6 h-6 dark:hidden" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 4V2m0 20v-2m8-8h2M2 12h2m14.364 6.364l1.414 1.414M4.222 4.222l1.414 1.414m12.728 0l1.414-1.414M4.222 19.778l1.414-1.414M12 8a4 4 0 100 8 4 4 0 000-8z" />
                    </svg>
                    <!-- Moon -->
                    <svg class="w-6 h-6 hidden dark:block" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z" />
                    </svg>
                </button>

                <!-- Profile Dropdown -->
                <div x-data="{ openProfile: false }" class="relative">

                    <!-- Trigger -->
                    <button @click="openProfile = !openProfile"
                        class="flex items-center focus:outline-none">
                        <img class="h-9 w-9 rounded-full border border-white/30 object-cover"
                            src="{{ Auth::user()->profile_photo_url }}"
                            alt="{{ Auth::user()->name }}" />
                    </button>

                    <!-- Dropdown -->
                    <div x-show="openProfile"
                        @click.away="openProfile = false"
                        x-transition
                        class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-200 rounded-lg shadow-lg py-2 z-50">

                        <div class="px-4 py-2 text-xs text-gray-500 dark:text-gray-300">
                            Administrar Perfil
                        </div>

                        <!-- Perfil Jetstream -->
                        <a href="{{ route('profile.show') }}"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">
                            Perfil de usuario
                        </a>

                        <!-- SOLO EMPRESA -->
                        @if(auth()->user()->role->value === 'empresa')
                        <a href="{{ route('empresa.perfil.edit') }}"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">
                            Perfil de empresa
                        </a>
                        @endif

                        <!-- SOLO CANDIDATO -->
                        @if(auth()->user()->role->value === 'candidato')
                        <a href="{{ route('candidato.perfil.edit') }}"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">
                            Perfil de candidato
                        </a>
                        @endif

                        <div class="border-t border-gray-200 dark:border-gray-700 my-2"></div>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="w-full text-left px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">
                                Cerrar sesión
                            </button>
                        </form>

                    </div>
                </div>


                <!-- Mobile Hamburger -->
                <div class="sm:hidden flex items-center">
                    <button @click="open = ! open"
                        class="text-white hover:text-[#4DA3D9] focus:outline-none transition">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor">
                            <path :class="{'hidden': open, 'inline-flex': !open}"
                                class="inline-flex"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': !open, 'inline-flex': open}"
                                class="hidden"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div :class="{'block': open, 'hidden': ! open}"
        class="hidden sm:hidden bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-200 shadow-lg transition">

        <div class="px-4 py-3 space-y-2">

            <x-responsive-nav-link href="{{ route('dashboard') }}">
                Inicio
            </x-responsive-nav-link>

            @if(auth()->user()->role->value === 'empresa')
            <x-responsive-nav-link href="{{ route('empresa.ofertas.index') }}">
                Mis ofertas
            </x-responsive-nav-link>
            @endif

            @if(auth()->user()->role->value === 'candidato')
            <x-responsive-nav-link href="{{ route('candidato.ofertas.index') }}">
                Ofertas disponibles
            </x-responsive-nav-link>
            @endif

            <x-responsive-nav-link href="{{ route('profile.show') }}">
                Perfil de usuario
            </x-responsive-nav-link>

            @if(auth()->user()->role->value === 'empresa')
            <x-responsive-nav-link href="{{ route('empresa.perfil.edit') }}">
                Perfil de empresa
            </x-responsive-nav-link>
            @endif

            @if(auth()->user()->role->value === 'candidato')
            <x-responsive-nav-link href="{{ route('candidato.perfil.edit') }}">
                Perfil de candidato
            </x-responsive-nav-link>
            @endif

            <form method="POST" action="{{ route('logout') }}" x-data>
                @csrf
                <x-responsive-nav-link href="{{ route('logout') }}"
                    @click.prevent="$root.submit();">
                    Cerrar sesión
                </x-responsive-nav-link>
            </form>

        </div>
    </div>
</nav>