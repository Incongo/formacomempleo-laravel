<x-layouts.dashboard>

    <x-slot name="header">
        <h2 class="text-2xl font-bold text-[#1F4E79] dark:text-indigo-300">
            Mis ofertas de empleo
        </h2>
    </x-slot>

    <div class="flex justify-end mb-6">
        <a href="{{ route('empresa.ofertas.create') }}"
            class="bg-[#1F4E79] dark:bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-[#163a5c] dark:hover:bg-indigo-700 transition">
            Crear nueva oferta
        </a>
    </div>

    <div class="bg-white dark:bg-gray-800 shadow-md rounded-xl p-6 border border-gray-200 dark:border-gray-700">

        <table class="w-full text-left">
            <thead>
                <tr class="border-b border-gray-200 dark:border-gray-700">
                    <th class="py-3 text-gray-700 dark:text-gray-300">Título</th>
                    <th class="py-3 text-gray-700 dark:text-gray-300">Estado</th>
                    <th class="py-3 text-gray-700 dark:text-gray-300">Fecha</th>
                    <th class="py-3 text-right text-gray-700 dark:text-gray-300">Acciones</th>
                </tr>
            </thead>

            <tbody>
                @forelse($ofertas as $oferta)
                <tr class="border-b border-gray-200 dark:border-gray-700">
                    <td class="py-3 text-gray-800 dark:text-gray-200">{{ $oferta->titulo }}</td>
                    <td class="py-3 capitalize text-gray-800 dark:text-gray-200">{{ $oferta->estado }}</td>
                    <td class="py-3 text-gray-800 dark:text-gray-200">{{ $oferta->created_at->format('d/m/Y') }}</td>

                    <td class="py-3 text-right">
                        <a href="{{ route('empresa.ofertas.edit', $oferta) }}"
                            class="text-blue-600 dark:text-blue-400 hover:underline mr-3">
                            Editar
                        </a>

                        <form action="{{ route('empresa.ofertas.destroy', $oferta) }}"
                            method="POST" class="inline">
                            @csrf
                            @method('DELETE')

                            <button class="text-red-600 dark:text-red-400 hover:underline"
                                onclick="return confirm('¿Eliminar oferta?')">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="py-6 text-center text-gray-500 dark:text-gray-400">
                        No tienes ofertas creadas todavía.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

    </div>

</x-layouts.dashboard>