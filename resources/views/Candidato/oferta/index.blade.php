<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-[#1F4E79]">Ofertas disponibles</h2>
        <p class="text-black/70 mt-1">Explora las oportunidades laborales activas.</p>
    </x-slot>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        @forelse($ofertas as $oferta)
        <div class="bg-white shadow-md rounded-xl p-6 border border-gray-100">
            <h3 class="text-xl font-semibold text-[#1F4E79]">
                {{ $oferta->titulo }}
            </h3>

            <p class="text-gray-600 mt-2">
                {{ Str::limit($oferta->descripcion, 120) }}
            </p>

            <p class="text-sm text-gray-500 mt-3">
                Empresa: <strong>{{ $oferta->empresa->nombre }}</strong>
            </p>

            <a href="{{ route('ofertas.show', $oferta) }}"
                class="mt-4 inline-block bg-[#1F4E79] text-white px-4 py-2 rounded-lg hover:bg-[#163a5c]">
                Ver oferta
            </a>
        </div>
        @empty
        <p class="text-gray-600">No hay ofertas disponibles en este momento.</p>
        @endforelse

    </div>
</x-app-layout>