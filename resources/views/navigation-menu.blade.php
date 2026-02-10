<nav x-data="{ open: false }" class="bg-[#1F4E79] text-white shadow-md">
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
                    <x-nav-link href="{{ route('dashboard') }}" class="text-white/90 hover:text-white">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Right side -->
            <div class="hidden sm:flex items-center space-x-4">

                <!-- Teams Dropdown -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                <div class="relative">
                    <x-dropdown align="right" width="60">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 bg-[#1F4E79] text-white/90 hover:text-white rounded-md focus:outline-none">
                                {{ Auth::user()->currentTeam->name }}
                                <svg class="ms-2 -me-0.5 size-4" fill="none" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <div class="w-60">
                                <div class="px-4 py-2 text-xs text-gray-500">Manage Team</div>

                                <x-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                    Team Settings
                                </x-dropdown-link>

                                @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                <x-dropdown-link href="{{ route('teams.create') }}">
                                    Create New Team
                                </x-dropdown-link>
                                @endcan

                                @if (Auth::user()->allTeams()->count() > 1)
                                <div class="border-t border-gray-200 my-2"></div>
                                <div class="px-4 py-2 text-xs text-gray-500">Switch Teams</div>

                                @foreach (Auth::user()->allTeams() as $team)
                                <x-switchable-team :team="$team" />
                                @endforeach
                                @endif
                            </div>
                        </x-slot>
                    </x-dropdown>
                </div>
                @endif

                <!-- Profile Dropdown -->
                <div class="relative">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center focus:outline-none">
                                <img class="h-9 w-9 rounded-full border border-white/30 object-cover"
                                    src="{{ Auth::user()->profile_photo_url }}"
                                    alt="{{ Auth::user()->name }}" />
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <div class="px-4 py-2 text-xs text-gray-500">Administrar Perfil</div>

                            <!-- Perfil de usuario (Jetstream) -->
                            <x-dropdown-link href="{{ route('profile.show') }}">
                                Perfil de usuario
                            </x-dropdown-link>

                            <!-- SOLO EMPRESA -->
                            @if(auth()->user()->role->value === 'empresa')
                            <x-dropdown-link href="{{ route('empresa.perfil.edit') }}">
                                Perfil de empresa
                            </x-dropdown-link>
                            @endif

                            <!-- SOLO CANDIDATO -->
                            @if(auth()->user()->role->value === 'candidato')
                            <x-dropdown-link href="{{ route('candidato.perfil.edit') }}">
                                Perfil de candidato
                            </x-dropdown-link>
                            @endif

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                            <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                API Tokens
                            </x-dropdown-link>
                            @endif

                            <div class="border-t border-gray-200 my-2"></div>

                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf
                                <x-dropdown-link href="{{ route('logout') }}"
                                    @click.prevent="$root.submit();">
                                    Cerrar sesión
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>

                <!-- Mobile Hamburger -->
                <div class="sm:hidden flex items-center">
                    <button @click="open = ! open"
                        class="text-white hover:text-[#4DA3D9] focus:outline-none">
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

        <!-- Mobile Menu -->
        <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-white text-gray-800 shadow-lg">
            <div class="px-4 py-3 space-y-2">

                <x-responsive-nav-link href="{{ route('dashboard') }}">
                    Dashboard
                </x-responsive-nav-link>

                <x-responsive-nav-link href="{{ route('profile.show') }}">
                    Profile
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf
                    <x-responsive-nav-link href="{{ route('logout') }}"
                        @click.prevent="$root.submit();">
                        Log Out
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
</nav>