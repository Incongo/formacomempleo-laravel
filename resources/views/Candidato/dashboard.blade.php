<x-layouts.dashboard>

    @php
    $candidato = auth()->user()->candidato;

    $hour = now()->format('H');
    $greeting = $hour < 12 ? 'Buenos días' : ($hour < 20 ? 'Buenas tardes' : 'Buenas noches' );
        @endphp

        <x-slot name="header">
        <div class="flex items-center gap-4">

            {{-- FOTO DEL CANDIDATO --}}
            @if($candidato && $candidato->foto)
            <img src="{{ asset('storage/' . $candidato->foto) }}"
                alt="Foto candidato"
                class="w-14 h-14 rounded-full object-cover border border-gray-300 dark:border-gray-600 shadow-sm">
            @else
            <div class="w-14 h-14 rounded-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center text-gray-500 dark:text-gray-300 text-xl font-bold">
                {{ strtoupper(substr($candidato->nombre ?? Auth::user()->name, 0, 1)) }}
            </div>
            @endif

            <div>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                    {{ $greeting }}, {{ Auth::user()->name }}
                </h2>
                <p class="text-gray-700 dark:text-gray-300 mt-1">Bienvenido a tu panel personal.</p>
            </div>

        </div>
        </x-slot>


        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            <!-- Ofertas disponibles -->
            <a href="{{ route('candidato.ofertas.index') }}"
                class="bg-white dark:bg-gray-800 shadow-md rounded-xl p-6 border border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-[#1F4E79] dark:text-indigo-300">Ofertas disponibles</h3>
                    <div class="p-2 bg-[#1F4E79] dark:bg-indigo-600 text-white rounded-lg">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </div>
                </div>

                <p class="text-3xl font-bold mt-4 text-gray-900 dark:text-gray-100">{{ $ofertasDisponibles }}</p>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Ofertas activas para ti</p>
            </a>


            <!-- Solicitudes pendientes -->
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-xl p-6 border border-gray-200 dark:border-gray-700 transition">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-[#1F4E79] dark:text-indigo-300">Solicitudes pendientes</h3>
                    <div class="p-2 bg-yellow-500 text-white rounded-lg">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>

                <p class="text-3xl font-bold mt-4 text-gray-900 dark:text-gray-100">{{ $solicitudesPendientes }}</p>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Solicitudes sin revisar</p>
            </div>


            <!-- Solicitudes aceptadas -->
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-xl p-6 border border-gray-200 dark:border-gray-700 transition">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-[#1F4E79] dark:text-indigo-300">Aceptadas</h3>
                    <div class="p-2 bg-green-600 text-white rounded-lg">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                </div>

                <p class="text-3xl font-bold mt-4 text-gray-900 dark:text-gray-100">{{ $solicitudesAceptadas }}</p>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Candidaturas aceptadas</p>
            </div>


            <!-- Solicitudes rechazadas -->
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-xl p-6 border border-gray-200 dark:border-gray-700 transition">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-[#1F4E79] dark:text-indigo-300">Rechazadas</h3>
                    <div class="p-2 bg-red-500 text-white rounded-lg">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </div>
                </div>

                <p class="text-3xl font-bold mt-4 text-gray-900 dark:text-gray-100">{{ $solicitudesRechazadas }}</p>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Candidaturas rechazadas</p>
            </div>

        </div>

</x-layouts.dashboard>