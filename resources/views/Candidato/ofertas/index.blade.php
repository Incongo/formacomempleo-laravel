<x-layouts.dashboard>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-[#1F4E79] dark:text-indigo-300">
            Ofertas disponibles
        </h2>
        <p class="text-black/70 dark:text-gray-300 mt-1">
            Explora las oportunidades laborales activas.
        </p>
    </x-slot>

    <form method="GET" class="mb-8 bg-white dark:bg-gray-800 p-6 rounded-xl shadow-md border border-gray-200 dark:border-gray-700">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">

            {{-- Sector --}}
            <div>
                <label class="font-semibold dark:text-gray-200">Sector</label>
                <select name="sector_id" class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg">
                    <option value="">Todos</option>
                    @foreach($sectores as $sector)
                    <option value="{{ $sector->id }}" {{ request('sector_id') == $sector->id ? 'selected' : '' }}>
                        {{ $sector->nombre }}
                    </option>
                    @endforeach
                </select>
            </div>

            {{-- Ubicación --}}
            <div>
                <label class="font-semibold dark:text-gray-200">Ubicación</label>
                <input type="text" name="ubicacion" value="{{ request('ubicacion') }}"
                    class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg">
            </div>

            {{-- Modalidad --}}
            <div>
                <label class="font-semibold dark:text-gray-200">Modalidad</label>
                <select name="modalidad" class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg">
                    <option value="">Todas</option>
                    <option value="Presencial" {{ request('modalidad') == 'Presencial' ? 'selected' : '' }}>Presencial</option>
                    <option value="Híbrido" {{ request('modalidad') == 'Híbrido' ? 'selected' : '' }}>Híbrido</option>
                    <option value="Remoto" {{ request('modalidad') == 'Remoto' ? 'selected' : '' }}>Remoto</option>
                </select>
            </div>

            {{-- Salario mínimo --}}
            <div>
                <label class="font-semibold dark:text-gray-200">Salario mínimo (€)</label>
                <input type="number" name="salario_min" value="{{ request('salario_min') }}"
                    class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg">
            </div>

        </div>

        <div class="flex justify-end mt-4">
            <button class="bg-[#1F4E79] dark:bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-[#163a5c] dark:hover:bg-indigo-700">
                Filtrar
            </button>
        </div>
    </form>


    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        @forelse($ofertas as $oferta)
        <a href="{{ route('candidato.ofertas.show', $oferta->id) }}"
            class="block bg-white dark:bg-gray-800 shadow-md rounded-xl p-6 
                  border border-gray-200 dark:border-gray-700 
                  hover:shadow-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition">

            <h3 class="text-xl font-semibold text-[#1F4E79] dark:text-indigo-300">
                {{ $oferta->titulo }}
            </h3>

            <p class="text-gray-600 dark:text-gray-300 mt-2">
                {{ Str::limit($oferta->descripcion, 120) }}
            </p>

            <div class="mt-4 space-y-1 text-sm text-gray-500 dark:text-gray-400">
                <p><strong class="text-gray-700 dark:text-gray-300">Sector:</strong> {{ $oferta->sector->nombre ?? 'Sin sector' }}</p>
                <p><strong class="text-gray-700 dark:text-gray-300">Empresa:</strong> {{ $oferta->empresa->nombre }}</p>
                <p><strong class="text-gray-700 dark:text-gray-300">Ubicación:</strong> {{ $oferta->ubicacion }}</p>
                <p><strong class="text-gray-700 dark:text-gray-300">Modalidad:</strong> {{ $oferta->modalidad }}</p>
            </div>

            <span class="mt-4 inline-block bg-[#1F4E79] dark:bg-indigo-600 
                         text-white px-4 py-2 rounded-lg hover:bg-[#163a5c] dark:hover:bg-indigo-700">
                Ver oferta
            </span>

        </a>

        @empty
        <p class="text-gray-600 dark:text-gray-300">No hay ofertas disponibles en este momento.</p>
        @endforelse

    </div>
</x-layouts.dashboard>