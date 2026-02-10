<x-app-layout>
    <x-slot name="header">
        Crear nueva oferta
    </x-slot>

    <form method="POST" action="{{ route('empresa.ofertas.store') }}" class="space-y-12">
        @csrf

        <div class="bg-white p-8 rounded-xl shadow-md">
            <h2 class="text-xl font-semibold text-[#1F4E79]">Datos de la oferta</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">

                <div class="md:col-span-2">
                    <label class="font-semibold">Título</label>
                    <input type="text" name="titulo" class="w-full border-gray-300 rounded-lg" required>
                </div>

                <div class="md:col-span-2">
                    <label class="font-semibold">Descripción</label>
                    <textarea name="descripcion" rows="5" class="w-full border-gray-300 rounded-lg"></textarea>
                </div>

                <div>
                    <label class="font-semibold">Salario</label>
                    <input type="text" name="salario" class="w-full border-gray-300 rounded-lg">
                </div>

                <div>
                    <label class="font-semibold">Tipo de contrato</label>
                    <input type="text" name="tipo_contrato" class="w-full border-gray-300 rounded-lg">
                </div>

                <div>
                    <label class="font-semibold">Modalidad</label>
                    <input type="text" name="modalidad" class="w-full border-gray-300 rounded-lg">
                </div>

                <div>
                    <label class="font-semibold">Ubicación</label>
                    <input type="text" name="ubicacion" class="w-full border-gray-300 rounded-lg">
                </div>

            </div>
        </div>

        <div class="flex justify-end">
            <button class="bg-[#1F4E79] text-black px-6 py-3 rounded-lg font-semibold hover:bg-[#163a5c]">
                Crear oferta
            </button>
        </div>
    </form>
</x-app-layout>