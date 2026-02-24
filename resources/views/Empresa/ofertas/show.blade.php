<x-layouts.dashboard>

    <x-slot name="header">
        <h2 class="text-2xl font-bold text-[#1F4E79] dark:text-indigo-300">
            Detalles de la oferta: {{ $oferta->titulo }}
        </h2>
    </x-slot>

    <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-md border border-gray-200 dark:border-gray-700">

        {{-- INFORMACIÓN DE LA OFERTA --}}
        <h3 class="text-xl font-semibold text-[#1F4E79] dark:text-indigo-300 mb-4">Información de la oferta</h3>

        <p><strong>Título:</strong> {{ $oferta->titulo }}</p>
        <p><strong>Estado:</strong> {{ ucfirst($oferta->estado) }}</p>
        <p><strong>Fecha de publicación:</strong> {{ $oferta->created_at->format('d/m/Y') }}</p>

        @if($oferta->descripcion)
        <p class="mt-4"><strong>Descripción:</strong></p>
        <p class="bg-gray-100 dark:bg-gray-700 p-3 rounded-lg">{{ $oferta->descripcion }}</p>
        @endif

        <hr class="my-6 border-gray-300 dark:border-gray-700">

        {{-- CANDIDATOS --}}
        <h3 class="text-xl font-semibold text-[#1F4E79] dark:text-indigo-300 mb-4">
            Candidatos inscritos ({{ $postulaciones->count() }})
        </h3>

        @if($postulaciones->isEmpty())
        <p class="text-gray-500 dark:text-gray-400">No hay candidatos inscritos todavía.</p>
        @else

        {{-- GRID RESPONSIVE: 1 columna en móvil, 3 columnas en PC --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

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

                <p class="text-sm"><strong>Mensaje:</strong></p>
                <p class="bg-gray-100 dark:bg-gray-700 p-3 rounded-lg text-sm">
                    {{ $postulacion->mensaje ?? 'Sin mensaje' }}
                </p>

                <div class="mt-3 flex gap-3">

                    @if($postulacion->candidato->cv)
                    <a href="{{ asset('storage/' . $postulacion->candidato->cv) }}"
                        target="_blank"
                        class="px-3 py-2 bg-blue-600 text-white rounded-lg text-sm">
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

            </div>
            @endforeach

        </div>
        @endif

    </div>

</x-layouts.dashboard>