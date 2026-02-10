<x-app-layout>
    <x-slot name="header">
        Mis ofertas de empleo
    </x-slot>

    <div class="flex justify-end mb-6">
        <a href="{{ route('empresa.ofertas.create') }}"
            class="bg-[#1F4E79] text-white px-4 py-2 rounded-lg hover:bg-[#163a5c]">
            Crear nueva oferta
        </a>
    </div>

    <div class="bg-white shadow-md rounded-xl p-6">
        <table class="w-full text-left">
            <thead>
                <tr class="border-b">
                    <th class="py-3">Título</th>
                    <th class="py-3">Estado</th>
                    <th class="py-3">Fecha</th>
                    <th class="py-3 text-right">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($ofertas as $oferta)
                <tr class="border-b">
                    <td class="py-3">{{ $oferta->titulo }}</td>
                    <td class="py-3 capitalize">{{ $oferta->estado }}</td>
                    <td class="py-3">{{ $oferta->created_at->format('d/m/Y') }}</td>
                    <td class="py-3 text-right">
                        <a href="{{ route('empresa.ofertas.edit', $oferta) }}"
                            class="text-blue-600 hover:underline mr-3">Editar</a>

                        <form action="{{ route('empresa.ofertas.destroy', $oferta) }}"
                            method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600 hover:underline"
                                onclick="return confirm('¿Eliminar oferta?')">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="py-6 text-center text-gray-500">
                        No tienes ofertas creadas todavía.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>