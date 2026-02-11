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



    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        <!-- Ofertas disponibles -->
        <a href="{{ route('candidato.ofertas.index') }}"
            class="bg-white shadow-md rounded-xl p-6 border border-gray-100 hover:bg-gray-50 transition">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-[#1F4E79]">Ofertas disponibles</h3>
                <div class="p-2 bg-[#1F4E79] text-white rounded-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </div>
            </div>

            <p class="text-3xl font-bold mt-4 text-[#2E2E2E]">{{ $ofertasDisponibles }}</p>
            <p class="text-sm text-gray-500 mt-1">Ofertas activas para ti</p>
        </a>

        <!-- Solicitudes pendientes -->
        <div class="bg-white shadow-md rounded-xl p-6 border border-gray-100">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-[#1F4E79]">Solicitudes pendientes</h3>
                <div class="p-2 bg-yellow-500 text-white rounded-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>

            <p class="text-3xl font-bold mt-4 text-[#2E2E2E]">{{ $solicitudesPendientes }}</p>
            <p class="text-sm text-gray-500 mt-1">Solicitudes sin revisar</p>
        </div>

        <!-- Solicitudes aceptadas -->
        <div class="bg-white shadow-md rounded-xl p-6 border border-gray-100">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-[#1F4E79]">Aceptadas</h3>
                <div class="p-2 bg-green-600 text-white rounded-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M5 13l4 4L19 7" />
                    </svg>
                </div>
            </div>

            <p class="text-3xl font-bold mt-4 text-[#2E2E2E]">{{ $solicitudesAceptadas }}</p>
            <p class="text-sm text-gray-500 mt-1">Candidatos aceptados</p>
        </div>

        <!-- Solicitudes rechazadas -->
        <div class="bg-white shadow-md rounded-xl p-6 border border-gray-100">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-[#1F4E79]">Rechazadas</h3>
                <div class="p-2 bg-red-500 text-white rounded-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </div>
            </div>

            <p class="text-3xl font-bold mt-4 text-[#2E2E2E]">{{ $solicitudesRechazadas }}</p>
            <p class="text-sm text-gray-500 mt-1">Solicitudes rechazadas</p>
        </div>

    </div>

</x-app-layout>