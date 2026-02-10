<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#1F4E79] leading-tight">
            {{ __('Panel de Administrador') }}
        </h2>
    </x-slot>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        <!-- Ofertas activas -->
        <div class="bg-white shadow-md rounded-xl p-6 border border-gray-100">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-[#1F4E79]">Ofertas activas</h3>
            </div>

            <p class="text-3xl font-bold mt-4 text-[#2E2E2E]">
                {{ $ofertasActivas }}
            </p>
            <p class="text-sm text-gray-500 mt-1">Ofertas publicadas actualmente</p>
        </div>

        <!-- Candidatos inscritos -->
        <div class="bg-white shadow-md rounded-xl p-6 border border-gray-100">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-[#1F4E79]">Candidatos inscritos</h3>
            </div>

            <p class="text-3xl font-bold mt-4 text-[#2EE2E2]">
                {{ $candidatosInscritos }}
            </p>
            <p class="text-sm text-gray-500 mt-1">Candidatos inscritos en tus ofertas</p>
        </div>

        <!-- Solicitudes pendientes -->
        <div class="bg-white shadow-md rounded-xl p-6 border border-gray-100">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-[#1F4E79]">Solicitudes pendientes</h3>
            </div>

            <p class="text-3xl font-bold mt-4 text-[#2E2E2E]">
                {{ $solicitudesPendientes }}
            </p>
            <p class="text-sm text-gray-500 mt-1">Solicitudes sin revisar</p>
        </div>

        <!-- Solicitudes aceptadas -->
        <div class="bg-white shadow-md rounded-xl p-6 border border-gray-100">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-[#1F4E79]">Aceptadas</h3>
            </div>

            <p class="text-3xl font-bold mt-4 text-[#2E2E2E]">
                {{ $solicitudesAceptadas }}
            </p>
            <p class="text-sm text-gray-500 mt-1">Candidatos aceptados</p>
        </div>

        <!-- Solicitudes rechazadas -->
        <div class="bg-white shadow-md rounded-xl p-6 border border-gray-100">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-[#1F4E79]">Rechazadas</h3>
            </div>

            <p class="text-3xl font-bold mt-4 text-[#2E2E2E]">
                {{ $solicitudesRechazadas }}
            </p>
            <p class="text-sm text-gray-500 mt-1">Solicitudes rechazadas</p>
        </div>

    </div>
</x-app-layout>