<x-layouts.dashboard>

    @php
    $empresa = auth()->user()->empresa;

    $hour = now()->format('H');
    $greeting = $hour < 12 ? 'Buenos días' : ($hour < 20 ? 'Buenas tardes' : 'Buenas noches' );

        $totalOfertas=$empresa->ofertas()->count();
        $ofertasActivas = $empresa->ofertas()->where('estado', 'activa')->count();

        $postulaciones = \App\Models\Postulacion::whereHas('oferta', function ($q) use ($empresa) {
        $q->where('empresa_id', $empresa->id);
        });

        $totalPostulaciones = $postulaciones->count();
        $pendientes = $postulaciones->where('estado', 'pendiente')->count();
        $aceptadas = $postulaciones->where('estado', 'aceptado')->count();
        $rechazadas = $postulaciones->where('estado', 'rechazado')->count();
        @endphp

        <x-slot name="header">
            <div class="flex items-center gap-4">

                {{-- LOGO DE EMPRESA --}}
                @if($empresa && $empresa->logo)
                <img src="{{ asset('storage/' . $empresa->logo) }}"
                    alt="Logo empresa"
                    class="w-14 h-14 rounded-full object-cover border border-gray-300 dark:border-gray-600 shadow-sm">
                @else
                <div class="w-14 h-14 rounded-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center text-gray-500 dark:text-gray-300 text-xl font-bold">
                    {{ strtoupper(substr($empresa->nombre ?? 'E', 0, 1)) }}
                </div>
                @endif

                <div>
                    <h2 class="text-2xl font-bold text-[#1F4E79] dark:text-indigo-300">
                        {{ $greeting }}, {{ Auth::user()->name }}
                    </h2>
                    <p class="text-black/80 dark:text-gray-300 mt-1">Bienvenido a tu panel de empresa.</p>
                </div>

            </div>
        </x-slot>

        <!-- ACCESOS RÁPIDOS -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">

            <a href="{{ route('empresa.ofertas.index') }}"
                class="bg-white dark:bg-gray-800 shadow-md p-6 rounded-xl border border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                <h3 class="text-lg font-semibold text-[#1F4E79] dark:text-indigo-300">Mis ofertas</h3>
                <p class="text-gray-600 dark:text-gray-300 mt-2">Gestiona todas tus ofertas de empleo.</p>
            </a>

            <a href="{{ route('empresa.ofertas.create') }}"
                class="bg-white dark:bg-gray-800 shadow-md p-6 rounded-xl border border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                <h3 class="text-lg font-semibold text-[#1F4E79] dark:text-indigo-300">Crear oferta</h3>
                <p class="text-gray-600 dark:text-gray-300 mt-2">Publica una nueva oferta de empleo.</p>
            </a>


            <a href="{{ route('empresa.postulaciones') }}"
                class="bg-white dark:bg-gray-800 shadow-md p-6 rounded-xl border border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                <h3 class="text-lg font-semibold text-[#1F4E79] dark:text-indigo-300">Candidatos inscritos</h3>
                <p class="text-gray-600 dark:text-gray-300 mt-2">Revisa y gestiona las solicitudes recibidas.</p>
            </a>

        </div>

        <!-- TARJETAS DE ESTADÍSTICAS -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            @foreach([
            ['Ofertas activas', $ofertasActivas],
            ['Total de ofertas', $totalOfertas],
            ['Candidatos inscritos', $totalPostulaciones],
            ['Pendientes', $pendientes],
            ['Aceptadas', $aceptadas],
            ['Rechazadas', $rechazadas],
            ] as [$titulo, $valor])

            <div class="bg-white dark:bg-gray-800 shadow-md rounded-xl p-6 border border-gray-200 dark:border-gray-700">
                <h3 class="text-lg font-semibold text-[#1F4E79] dark:text-indigo-300">{{ $titulo }}</h3>
                <p class="text-4xl font-bold mt-2 text-gray-900 dark:text-gray-100">{{ $valor }}</p>
                <p class="text-gray-500 dark:text-gray-400 mt-1">Estadística general</p>
            </div>

            @endforeach

        </div>

</x-layouts.dashboard>