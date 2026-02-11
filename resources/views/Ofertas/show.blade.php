<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-[#1F4E79]">
            {{ $oferta->titulo }}
        </h2>
        <p class="text-black/70 mt-1">
            Publicada por {{ $oferta->empresa->nombre }}
        </p>
    </x-slot>

    <div class="max-w-4xl mx-auto space-y-8">

        <!-- Información principal -->
        <div class="bg-white shadow-md rounded-xl p-8 border border-gray-100">
            <h3 class="text-xl font-semibold text-[#1F4E79] mb-4">Descripción del puesto</h3>
            <p class="text-gray-700 leading-relaxed">
                {{ $oferta->descripcion }}
            </p>
        </div>

        <!-- Datos adicionales -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <div class="bg-white shadow-md rounded-xl p-6 border border-gray-100">
                <h4 class="font-semibold text-[#1F4E79]">Salario</h4>
                <p class="text-gray-700 mt-2">{{ $oferta->salario ?? 'No especificado' }}</p>
            </div>

            <div class="bg-white shadow-md rounded-xl p-6 border border-gray-100">
                <h4 class="font-semibold text-[#1F4E79]">Tipo de contrato</h4>
                <p class="text-gray-700 mt-2">{{ $oferta->tipo_contrato ?? 'No especificado' }}</p>
            </div>

            <div class="bg-white shadow-md rounded-xl p-6 border border-gray-100">
                <h4 class="font-semibold text-[#1F4E79]">Modalidad</h4>
                <p class="text-gray-700 mt-2">{{ $oferta->modalidad ?? 'No especificado' }}</p>
            </div>

            <div class="bg-white shadow-md rounded-xl p-6 border border-gray-100">
                <h4 class="font-semibold text-[#1F4E79]">Ubicación</h4>
                <p class="text-gray-700 mt-2">{{ $oferta->ubicacion ?? 'No especificado' }}</p>
            </div>

        </div>
        <!--Mostrar error si ya esta inscrito-->
        @if(session('error'))
        <div class="bg-red-500  px-4 py-2 rounded mb-4">
            {{ session('error') }}
        </div>
        @endif
        <!-- Botón de inscripción -->
        @if(auth()->check() && auth()->user()->role->value === 'candidato')
        <div class="bg-white shadow-md rounded-xl p-8 border border-gray-100">
            <h3 class="text-xl font-semibold text-[#1F4E79] mb-4">Inscribirse en esta oferta</h3>

            <form action="{{ route('candidato.postular', $oferta) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div>
                    <label class="font-semibold">Mensaje (opcional)</label>
                    <textarea name="mensaje" rows="4" class="w-full border-gray-300 rounded-lg"></textarea>
                </div>

                <div>
                    <label class="font-semibold">CV personalizado (opcional)</label>
                    <input type="file" name="cv_personalizado" class="w-full border-gray-300 rounded-lg">
                </div>

                <button class="bg-[#1F4E79] text-black px-6 py-3 rounded-lg font-semibold hover:bg-[#163a5c]">
                    Inscribirme
                </button>
            </form>
        </div>
        @else
        <div class="text-center text-gray-600">
            <p>Inicia sesión como candidato para inscribirte.</p>
        </div>
        @endif

    </div>
</x-app-layout>