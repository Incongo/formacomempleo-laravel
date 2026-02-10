<x-app-layout>
    <x-slot name="header">
        Editar oferta
    </x-slot>

    <form method="POST" action="{{ route('empresa.ofertas.update', $oferta) }}" class="space-y-12">
        @csrf

        <div class="bg-white p-8 rounded-xl shadow-md">
            <h2 class="text-xl font-semibold text-[#1F4E79]">Datos de la oferta</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">

                <div class="md:col-span-2">
                    <label class="font-semibold">Título</label>
                    <input type="text" name="titulo" value="{{ $oferta->titulo }}" class="w-full border-gray-300 rounded-lg" required>
                </div>

                <div class="md:col-span-2">
                    <label class="font-semibold">Descripción</label>
                    <textarea name="descripcion" rows="5" class="w-full border-gray-300 rounded-lg">{{ $oferta->descripcion }}</textarea>
                </div>

                <div>
                    <label class="font-semibold">Salario</label>
                    <input type="text" name="salario" value="{{ $oferta->salario }}" class="w-full border-gray-300 rounded-lg">
                </div>

                <div>
                    <label class="font-semibold">Tipo de contrato</label>
                    <input type="text" name="tipo_contrato" value="{{ $oferta->tipo_contrato }}" class="w-full border-gray-300 rounded-lg">
                </div>

                <div>
                    <label class="font-semibold">Modalidad</label>
                    <input type="text" name="modalidad" value="{{ $oferta->modalidad }}" class="w-full border-gray-300 rounded-lg">
                </div>

                <div>
                    <label class="font-semibold">Ubicación</label>
                    <input type="text" name="ubicacion" value="{{ $oferta->ubicacion }}" class="w-full border-gray-300 rounded-lg">
                </div>

                <div>
                    <label class="font-semibold">Estado</label>
                    <select name="estado" class="w-full border-gray-300 rounded-lg">
                        <option value="activa" @selected($oferta->estado === 'activa')>Activa</option>
                        <option value="pausada" @selected($oferta->estado === 'pausada')>Pausada</option>
                        <option value="cerrada" @selected($oferta->estado === 'cerrada')>Cerrada</option>
                    </select>
                </div>

            </div>
        </div>

        <div class="flex justify-end">
            <button class="bg-[#1F4E79] text-black px-6 py-3 rounded-lg font-semibold hover:bg-[#163a5c]">
                Guardar cambios
            </button>
        </div>
    </form>
</x-app-layout>