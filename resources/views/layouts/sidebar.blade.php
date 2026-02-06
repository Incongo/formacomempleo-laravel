<aside class="w-64 min-h-screen bg-[#1F4E79] text-white shadow-lg hidden md:flex flex-col">

    <!-- Header del sidebar -->
    <div class="p-6 border-b border-white/10">
        <h2 class="text-xl font-semibold">Panel</h2>
        <p class="text-white/70 text-sm mt-1">
            {{ ucfirst(auth()->user()->role->value) }}
        </p>
    </div>

    <!-- Navegación -->
    <nav class="flex-1 mt-4 space-y-1">

        <!-- Dashboard -->
        <a href="{{ route('dashboard') }}"
            class="flex items-center px-6 py-3 hover:bg-[#4DA3D9] transition">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0h6" />
            </svg>
            Dashboard
        </a>

        @if(auth()->user()->role->value === 'admin')
        <a href="{{ route('admin.dashboard') }}"
            class="flex items-center px-6 py-3 hover:bg-[#4DA3D9] transition">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3 7h18M3 12h18M3 17h18" />
            </svg>
            Admin Home
        </a>
        @endif

        @if(auth()->user()->role->value === 'empresa')
        <a href="{{ route('empresa.dashboard') }}"
            class="flex items-center px-6 py-3 hover:bg-[#4DA3D9] transition">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            Empresa Home
        </a>
        @endif

    </nav>

    <!-- Logout -->
    <form method="POST" action="{{ route('logout') }}" class="mt-auto mb-6 px-6">
        @csrf
        <button class="w-full flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 rounded-lg transition">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1m0-10V5" />
            </svg>
            Cerrar sesión
        </button>
    </form>

</aside>