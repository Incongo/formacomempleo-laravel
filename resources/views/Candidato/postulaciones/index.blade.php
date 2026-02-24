<x-layouts.dashboard>

    <x-slot name="header">
        <h2 class="text-2xl font-bold text-[#1F4E79] dark:text-indigo-300">
            Mis postulaciones
        </h2>
    </x-slot>

    {{-- FILTROS --}}
    <form method="GET" class="mb-6 bg-white dark:bg-gray-800 p-4 rounded-xl shadow border border-gray-200 dark:border-gray-700">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

            <div>
                <label class="font-semibold dark:text-gray-200">Estado</label>
                <select name="estado" class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg">
                    <option value="">Todos</option>
                    <option value="pendiente" {{ request('estado') == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                    <option value="aceptado" {{ request('estado') == 'aceptado' ? 'selected' : '' }}>Aceptado</option>
                    <option value="rechazado" {{ request('estado') == 'rechazado' ? 'selected' : '' }}>Rechazado</option>
                </select>
            </div>

            <div>
                <label class="font-semibold dark:text-gray-200">Fecha desde</label>
                <input type="date" name="desde" value="{{ request('desde') }}"
                    class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg">
            </div>

            <div>
                <label class="font-semibold dark:text-gray-200">Fecha hasta</label>
                <input type="date" name="hasta" value="{{ request('hasta') }}"
                    class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg">
            </div>

        </div>

        <div class="flex justify-end mt-4">
            <button class="bg-[#1F4E79] dark:bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-[#163a5c] dark:hover:bg-indigo-700">
                Filtrar
            </button>
        </div>
    </form>

    {{-- LISTADO --}}
    <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow border border-gray-200 dark:border-gray-700">

        @php
        $filtradas = $postulaciones
        ->when(request('estado'), fn($q) => $q->where('estado', request('estado')))
        ->when(request('desde'), fn($q) => $q->where('created_at', '>=', request('desde')))
        ->when(request('hasta'), fn($q) => $q->where('created_at', '<=', request('hasta')));
            @endphp

            {{-- GRID RESPONSIVE: 1 columna en móvil, 3 columnas en PC --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            @forelse($filtradas as $postulacion)
            <div class="p-4 rounded-xl border dark:border-gray-700 bg-gray-50 dark:bg-gray-900">

                <h3 class="font-semibold text-lg">{{ $postulacion->oferta->titulo }}</h3>

                <p class="text-sm mt-1">
                    <strong>Estado:</strong>
                    <span class="px-2 py-1 rounded-lg text-xs
                    @if($postulacion->estado == 'pendiente') bg-yellow-500 text-white
                    @elseif($postulacion->estado == 'aceptado') bg-green-600 text-white
                    @else bg-red-500 text-white @endif">
                        {{ ucfirst($postulacion->estado) }}
                    </span>
                </p>

                <p class="text-sm mt-2"><strong>Mensaje enviado:</strong></p>
                <p class="bg-gray-100 dark:bg-gray-700 p-3 rounded-lg text-sm">
                    {{ $postulacion->mensaje ?? 'Sin mensaje' }}
                </p>

                @if($postulacion->candidato->cv)
                <a href="{{ asset('storage/' . $postulacion->candidato->cv) }}"
                    target="_blank"
                    class="mt-3 inline-block px-3 py-2 bg-blue-600 text-white rounded-lg text-sm">
                    Ver mi CV
                </a>
                @endif

            </div>
            @empty
            <p class="text-gray-500 dark:text-gray-400 col-span-3">No te has inscrito en ninguna oferta todavía.</p>
            @endforelse

    </div>

    </div>


</x-layouts.dashboard>