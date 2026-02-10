<x-app-layout>
    <x-slot name="header">
        @php
        $hour = now()->format('H');
        if ($hour >= 6 && $hour < 12) {
            $greeting='Buenos días' ;
            } elseif ($hour>= 12 && $hour < 20) {
                $greeting='Buenas tardes' ;
                } else {
                $greeting='Buenas noches' ;
                }
                @endphp

                <h2 class="text-2xl font-bold">{{ $greeting }}, {{ Auth::user()->name }}</h2>
                <p class="text-black/80 mt-1">Bienvenido a tu panel personal.</p>
    </x-slot>

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
            ...
        </div>

        <!-- Candidatos inscritos -->
        <div class="bg-white shadow-md rounded-xl p-6 border border-gray-100">
            ...
        </div>

        <!-- Solicitudes pendientes -->
        <div class="bg-white shadow-md rounded-xl p-6 border border-gray-100">
            ...
        </div>

        <!-- Solicitudes aceptadas -->
        <div class="bg-white shadow-md rounded-xl p-6 border border-gray-100">
            ...
        </div>

        <!-- Solicitudes rechazadas -->
        <div class="bg-white shadow-md rounded-xl p-6 border border-gray-100">
            ...
        </div>

    </div>
</x-app-layout>