<x-app-layout>

    <x-slot name="header">
        @php
        $hour = now()->format('H');
        $greeting = $hour < 12 ? 'Buenos días' : ($hour < 20 ? 'Buenas tardes' : 'Buenas noches' );
            @endphp

            <h2 class="text-2xl font-bold text-[#1F4E79]">
            {{ $greeting }}, {{ Auth::user()->name }}
            </h2>
            <p class="text-black/80 mt-1">Bienvenido a tu panel de empresa.</p>
    </x-slot>

    @php
    $empresa = auth()->user()->empresa;

    $totalOfertas = $empresa->ofertas()->count();
    $ofertasActivas = $empresa->ofertas()->where('estado', 'activa')->count();

    $postulaciones = \App\Models\Postulacion::whereHas('oferta', function ($q) use ($empresa) {
    $q->where('empresa_id', $empresa->id);
    });

    $totalPostulaciones = $postulaciones->count();
    $pendientes = $postulaciones->where('estado', 'pendiente')->count();
    $aceptadas = $postulaciones->where('estado', 'aceptado')->count();
    $rechazadas = $postulaciones->where('estado', 'rechazado')->count();
    @endphp

    <!-- ACCESOS RÁPIDOS -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">

        <a href="{{ route('empresa.ofertas.index') }}"
            class="bg-white shadow-md p-6 rounded-xl border border-gray-200 hover:bg-gray-50 transition">
            <h3 class="text-lg font-semibold text-[#1F4E79]">Mis ofertas</h3>
            <p class="text-gray-600 mt-2">Gestiona todas tus ofertas de empleo.</p>
        </a>

        <a href="{{ route('empresa.ofertas.create') }}"
            class="bg-white shadow-md p-6 rounded-xl border border-gray-200 hover:bg-gray-50 transition">
            <h3 class="text-lg font-semibold text-[#1F4E79]">Crear oferta</h3>
            <p class="text-gray-600 mt-2">Publica una nueva oferta de empleo.</p>
        </a>

    </div>

    <!-- TARJETAS DE ESTADÍSTICAS -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        <!-- Ofertas activas -->
        <div class="bg-white shadow-md rounded-xl p-6 border border-gray-100">
            <h3 class="text-lg font-semibold text-[#1F4E79]">Ofertas activas</h3>
            <p class="text-4xl font-bold mt-2">{{ $ofertasActivas }}</p>
            <p class="text-gray-500 mt-1">Publicadas actualmente</p>
        </div>

        <!-- Total ofertas -->
        <div class="bg-white shadow-md rounded-xl p-6 border border-gray-100">
            <h3 class="text-lg font-semibold text-[#1F4E79]">Total de ofertas</h3>
            <p class="text-4xl font-bold mt-2">{{ $totalOfertas }}</p>
            <p class="text-gray-500 mt-1">Histórico de publicaciones</p>
        </div>

        <!-- Candidatos inscritos -->
        <div class="bg-white shadow-md rounded-xl p-6 border border-gray-100">
            <h3 class="text-lg font-semibold text-[#1F4E79]">Candidatos inscritos</h3>
            <p class="text-4xl font-bold mt-2">{{ $totalPostulaciones }}</p>
            <p class="text-gray-500 mt-1">En todas tus ofertas</p>
        </div>

        <!-- Solicitudes pendientes -->
        <div class="bg-white shadow-md rounded-xl p-6 border border-gray-100">
            <h3 class="text-lg font-semibold text-[#1F4E79]">Pendientes</h3>
            <p class="text-4xl font-bold mt-2">{{ $pendientes }}</p>
            <p class="text-gray-500 mt-1">Aún sin revisar</p>
        </div>

        <!-- Solicitudes aceptadas -->
        <div class="bg-white shadow-md rounded-xl p-6 border border-gray-100">
            <h3 class="text-lg font-semibold text-[#1F4E79]">Aceptadas</h3>
            <p class="text-4xl font-bold mt-2">{{ $aceptadas }}</p>
            <p class="text-gray-500 mt-1">Candidatos seleccionados</p>
        </div>

        <!-- Solicitudes rechazadas -->
        <div class="bg-white shadow-md rounded-xl p-6 border border-gray-100">
            <h3 class="text-lg font-semibold text-[#1F4E79]">Rechazadas</h3>
            <p class="text-4xl font-bold mt-2">{{ $rechazadas }}</p>
            <p class="text-gray-500 mt-1">Candidatos descartados</p>
        </div>

    </div>

</x-app-layout>