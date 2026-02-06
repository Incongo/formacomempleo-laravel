<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#1F4E79] leading-tight">
            {{ __('Panel de Administración') }}
        </h2>
    </x-slot>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        <!-- Empresas registradas -->
        <div class="bg-white shadow-md rounded-xl p-6 border border-gray-100">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-[#1F4E79]">Empresas registradas</h3>
                <div class="p-2 bg-[#2FBF71] text-white rounded-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 7v10a2 2 0 002 2h3V5H5a2 2 0 00-2 2zm13-2v14h3a2 2 0 002-2V7a2 2 0 00-2-2h-3z" />
                    </svg>
                </div>
            </div>

            <p class="text-3xl font-bold mt-4 text-[#2E2E2E]">34</p>
            <p class="text-sm text-gray-500 mt-1">Empresas activas en la plataforma</p>
        </div>

        <!-- Ofertas publicadas -->
        <div class="bg-white shadow-md rounded-xl p-6 border border-gray-100">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-[#1F4E79]">Ofertas publicadas</h3>
                <div class="p-2 bg-[#1F4E79] text-white rounded-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </div>
            </div>

            <p class="text-3xl font-bold mt-4 text-[#2E2E2E]">58</p>
            <p class="text-sm text-gray-500 mt-1">Ofertas activas actualmente</p>
        </div>

        <!-- Candidatos registrados -->
        <div class="bg-white shadow-md rounded-xl p-6 border border-gray-100">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-[#1F4E79]">Candidatos registrados</h3>
                <div class="p-2 bg-[#4DA3D9] text-white rounded-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m10-6a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
            </div>

            <p class="text-3xl font-bold mt-4 text-[#2E2E2E]">412</p>
            <p class="text-sm text-gray-500 mt-1">Usuarios candidatos registrados</p>
        </div>

        <!-- Solicitudes totales -->
        <div class="bg-white shadow-md rounded-xl p-6 border border-gray-100">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-[#1F4E79]">Solicitudes totales</h3>
                <div class="p-2 bg-[#1F4E79] text-white rounded-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 7h18M3 12h18M3 17h18" />
                    </svg>
                </div>
            </div>

            <p class="text-3xl font-bold mt-4 text-[#2E2E2E]">980</p>
            <p class="text-sm text-gray-500 mt-1">Solicitudes enviadas por candidatos</p>
        </div>

        <!-- Pendientes de revisión -->
        <div class="bg-white shadow-md rounded-xl p-6 border border-gray-100">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-[#1F4E79]">Pendientes de revisión</h3>
                <div class="p-2 bg-yellow-500 text-white rounded-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>

            <p class="text-3xl font-bold mt-4 text-[#2E2E2E]">73</p>
            <p class="text-sm text-gray-500 mt-1">Solicitudes sin revisar</p>
        </div>

        <!-- Aceptadas este mes -->
        <div class="bg-white shadow-md rounded-xl p-6 border border-gray-100">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-[#1F4E79]">Aceptadas este mes</h3>
                <div class="p-2 bg-green-600 text-white rounded-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M5 13l4 4L19 7" />
                    </svg>
                </div>
            </div>

            <p class="text-3xl font-bold mt-4 text-[#2E2E2E]">129</p>
            <p class="text-sm text-gray-500 mt-1">Solicitudes aceptadas recientemente</p>
        </div>

    </div>
</x-app-layout>