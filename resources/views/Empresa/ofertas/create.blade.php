<x-layouts.dashboard>

    <x-slot name="header">
        <h2 class="text-2xl font-bold text-[#1F4E79] dark:text-indigo-300">
            Crear nueva oferta
        </h2>
    </x-slot>

    <form method="POST" action="{{ route('empresa.ofertas.store') }}" class="space-y-12">
        @csrf

        <div class="bg-white dark:bg-gray-800 p-8 rounded-xl shadow-md border border-gray-200 dark:border-gray-700">
            <h2 class="text-xl font-semibold text-[#1F4E79] dark:text-indigo-300">
                Datos de la oferta
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">

                {{-- Título --}}
                <div class="md:col-span-2">
                    <label class="font-semibold dark:text-gray-200">Título</label>
                    <input type="text" name="titulo"
                        class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg"
                        required>
                </div>

                {{-- Descripción --}}
                <div class="md:col-span-2">
                    <label class="font-semibold dark:text-gray-200">Descripción</label>
                    <textarea name="descripcion" rows="5"
                        class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg"></textarea>
                </div>

                {{-- Salario --}}
                <div>
                    <label class="font-semibold dark:text-gray-200">Salario</label>
                    <input type="text" name="salario"
                        class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg">
                </div>

                {{-- Tipo de contrato --}}
                <div>
                    <label class="font-semibold dark:text-gray-200">Tipo de contrato</label>
                    <input type="text" name="tipo_contrato"
                        class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg">
                </div>

                {{-- Modalidad --}}
                <div>
                    <label class="font-semibold dark:text-gray-200">Modalidad</label>
                    <input type="text" name="modalidad"
                        class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg">
                </div>

                {{-- Ubicación --}}
                <div>
                    <label class="font-semibold dark:text-gray-200">Ubicación</label>
                    <input type="text" name="ubicacion"
                        class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg">
                </div>

            </div>
        </div>

        <div class="flex justify-end">
            <button
                class="bg-[#1F4E79] dark:bg-indigo-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-[#163a5c] dark:hover:bg-indigo-700 transition">
                Crear oferta
            </button>
        </div>
    </form>

</x-layouts.dashboard>