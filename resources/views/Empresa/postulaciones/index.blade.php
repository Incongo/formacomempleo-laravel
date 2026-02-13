<x-layouts.dashboard>

    <x-slot name="header">
        <h2 class="text-2xl font-bold text-[#1F4E79] dark:text-indigo-300">
            Candidatos inscritos en tus ofertas
        </h2>
    </x-slot>

    <form method="GET" class="mb-8 bg-white dark:bg-gray-800 p-6 rounded-xl shadow-md border border-gray-200 dark:border-gray-700">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">

            {{-- Estado --}}
            <div>
                <label class="font-semibold dark:text-gray-200">Estado</label>
                <select name="estado" class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg">
                    <option value="">Todos</option>
                    <option value="pendiente" {{ request('estado') == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                    <option value="aceptado" {{ request('estado') == 'aceptado' ? 'selected' : '' }}>Aceptado</option>
                    <option value="rechazada" {{ request('estado') == 'rechazada' ? 'selected' : '' }}>Rechazada</option>
                </select>
            </div>

            {{-- Fecha desde --}}
            <div>
                <label class="font-semibold dark:text-gray-200">Fecha desde</label>
                <input type="date" name="fecha_desde" value="{{ request('fecha_desde') }}"
                    class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg">
            </div>

            {{-- Fecha hasta --}}
            <div>
                <label class="font-semibold dark:text-gray-200">Fecha hasta</label>
                <input type="date" name="fecha_hasta" value="{{ request('fecha_hasta') }}"
                    class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg">
            </div>

            {{-- Palabras clave --}}
            <div>
                <label class="font-semibold dark:text-gray-200">Buscar en CV o mensaje</label>
                <input type="text" name="keyword" value="{{ request('keyword') }}"
                    placeholder="Ej: Java, atención al cliente..."
                    class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg">
            </div>

        </div>

        <div class="flex justify-end mt-4">
            <button class="bg-[#1F4E79] dark:bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-[#163a5c] dark:hover:bg-indigo-700">
                Filtrar
            </button>
        </div>
    </form>


    <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-md border border-gray-200 dark:border-gray-700">

        {{-- VERSIÓN PC (tabla) --}}
        <div class="hidden md:block overflow-x-auto">
            <table class="w-full text-left min-w-max">
                <thead>
                    <tr class="border-b dark:border-gray-700">
                        <th class="py-3">Candidato</th>
                        <th class="py-3">Oferta</th>
                        <th class="py-3">Estado</th>
                        <th class="py-3">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($postulaciones as $postulacion)
                    <tr class="border-b dark:border-gray-700">

                        <td class="py-3 flex items-center gap-3">
                            @if($postulacion->candidato->foto)
                            <img src="{{ asset('storage/' . $postulacion->candidato->foto) }}"
                                class="w-10 h-10 rounded-full object-cover">
                            @else
                            <div class="w-10 h-10 rounded-full bg-gray-300 dark:bg-gray-700 flex items-center justify-center">
                                {{ strtoupper(substr($postulacion->candidato->name, 0, 1)) }}
                            </div>
                            @endif

                            <div>
                                <p class="font-semibold">{{ $postulacion->candidato->name }} {{ $postulacion->candidato->apellidos }}</p>
                                <p class="text-sm text-gray-500">{{ $postulacion->candidato->email }}</p>
                            </div>
                        </td>

                        <td class="py-3">
                            {{ $postulacion->oferta->titulo }}
                        </td>

                        <td class="py-3">
                            <span class="px-3 py-1 rounded-lg text-sm
                                @if($postulacion->estado == 'pendiente') bg-yellow-500 text-white
                                @elseif($postulacion->estado == 'aceptado') bg-green-600 text-white
                                @else bg-red-500 text-white @endif">
                                {{ ucfirst($postulacion->estado) }}
                            </span>
                        </td>

                        <td class="py-3">
                            <div class="flex items-center gap-3">

                                @if($postulacion->candidato->cv)
                                <a href="{{ asset('storage/' . $postulacion->candidato->cv) }}"
                                    target="_blank"
                                    class="px-3 py-1 bg-blue-600 text-white rounded-lg text-sm">
                                    Ver CV
                                </a>
                                @endif

                                <form method="POST" action="{{ route('empresa.postulaciones.update', $postulacion->id) }}">
                                    @csrf
                                    @method('PUT')

                                    <select name="estado"
                                        class="border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg text-sm"
                                        onchange="this.form.submit()">
                                        <option value="pendiente" {{ $postulacion->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                                        <option value="aceptado" {{ $postulacion->estado == 'aceptado' ? 'selected' : '' }}>Aceptar</option>
                                        <option value="rechazado" {{ $postulacion->estado == 'rechazado' ? 'selected' : '' }}>Rechazar</option>
                                    </select>
                                </form>

                            </div>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- VERSIÓN MÓVIL (cards) --}}
        <div class="md:hidden space-y-4 mt-4">
            @foreach($postulaciones as $postulacion)
            <div class="p-4 rounded-xl border dark:border-gray-700 bg-gray-50 dark:bg-gray-900">

                <div class="flex items-center gap-3 mb-3">
                    @if($postulacion->candidato->foto)
                    <img src="{{ asset('storage/' . $postulacion->candidato->foto) }}"
                        class="w-12 h-12 rounded-full object-cover">
                    @else
                    <div class="w-12 h-12 rounded-full bg-gray-300 dark:bg-gray-700 flex items-center justify-center">
                        {{ strtoupper(substr($postulacion->candidato->name, 0, 1)) }}
                    </div>
                    @endif

                    <div>
                        <p class="font-semibold">{{ $postulacion->candidato->name }} {{ $postulacion->candidato->apellidos }}</p>
                        <p class="text-sm text-gray-500">{{ $postulacion->candidato->email }}</p>
                    </div>
                </div>

                <p class="text-sm"><strong>Oferta:</strong> {{ $postulacion->oferta->titulo }}</p>

                <p class="text-sm mt-1">
                    <strong>Estado:</strong>
                    <span class="px-2 py-1 rounded-lg text-xs
                            @if($postulacion->estado == 'pendiente') bg-yellow-500 text-white
                            @elseif($postulacion->estado == 'aceptado') bg-green-600 text-white
                            @else bg-red-500 text-white @endif">
                        {{ ucfirst($postulacion->estado) }}
                    </span>
                </p>

                <div class="mt-3 flex flex-col gap-3">

                    @if($postulacion->candidato->cv)
                    <a href="{{ asset('storage/' . $postulacion->candidato->cv) }}"
                        target="_blank"
                        class="px-3 py-2 bg-blue-600 text-white rounded-lg text-sm text-center">
                        Ver CV
                    </a>
                    @endif

                    <form method="POST" action="{{ route('empresa.postulaciones.update', $postulacion->id) }}">
                        @csrf
                        @method('PUT')

                        <select name="estado"
                            class="w-full md:w-auto border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg text-sm"
                            onchange="this.form.submit()">
                            <option value="pendiente" {{ $postulacion->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                            <option value="aceptado" {{ $postulacion->estado == 'aceptado' ? 'selected' : '' }}>Aceptar</option>
                            <option value="rechazado" {{ $postulacion->estado == 'rechazado' ? 'selected' : '' }}>Rechazar</option>
                        </select>
                    </form>


                </div>

            </div>
            @endforeach
        </div>

    </div>

</x-layouts.dashboard>