<x-app-layout>
    <x-slot name="header">
        Editar Perfil de Empresa
    </x-slot>

    <form method="POST" action="{{ route('empresa.perfil.update') }}" enctype="multipart/form-data" class="space-y-12">
        @csrf

        <div class="bg-white p-8 rounded-xl shadow-md">
            <h2 class="text-xl font-semibold text-[#1F4E79]">Información general</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">

                <div>
                    <label class="font-semibold">Nombre</label>
                    <input type="text" name="nombre" value="{{ $empresa->nombre }}" class="w-full border-gray-300 rounded-lg">
                </div>

                <div>
                    <label class="font-semibold">CIF</label>
                    <input type="text" name="cif" value="{{ $empresa->cif }}" class="w-full border-gray-300 rounded-lg">
                </div>

                <div>
                    <label class="font-semibold">Teléfono</label>
                    <input type="text" name="telefono" value="{{ $empresa->telefono }}" class="w-full border-gray-300 rounded-lg">
                </div>

                <div>
                    <label class="font-semibold">Web</label>
                    <input type="text" name="web" value="{{ $empresa->web }}" class="w-full border-gray-300 rounded-lg">
                </div>

                <div>
                    <label class="font-semibold">Persona de contacto</label>
                    <input type="text" name="persona_contacto" value="{{ $empresa->persona_contacto }}" class="w-full border-gray-300 rounded-lg">
                </div>

                <div>
                    <label class="font-semibold">Email de contacto</label>
                    <input type="email" name="email_contacto" value="{{ $empresa->email_contacto }}" class="w-full border-gray-300 rounded-lg">
                </div>

                <div class="md:col-span-2">
                    <label class="font-semibold">Dirección</label>
                    <input type="text" name="direccion" value="{{ $empresa->direccion }}" class="w-full border-gray-300 rounded-lg">
                </div>

                <div>
                    <label class="font-semibold">Código Postal</label>
                    <input type="text" name="cp" value="{{ $empresa->cp }}" class="w-full border-gray-300 rounded-lg">
                </div>

                <div>
                    <label class="font-semibold">Ciudad</label>
                    <input type="text" name="ciudad" value="{{ $empresa->ciudad }}" class="w-full border-gray-300 rounded-lg">
                </div>

                <div>
                    <label class="font-semibold">Provincia</label>
                    <input type="text" name="provincia" value="{{ $empresa->provincia }}" class="w-full border-gray-300 rounded-lg">
                </div>

                <div class="md:col-span-2">
                    <label class="font-semibold">Sectores</label>
                    <select name="sectores[]" multiple size="5" class="w-full border-gray-300 rounded-lg">
                        @foreach($sectores as $sector)
                        <option value="{{ $sector->id }}"
                            @if($empresa->sectores->contains($sector->id)) selected @endif>
                            {{ $sector->nombre }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="md:col-span-2">
                    <label class="font-semibold">Logo</label>
                    <input type="file" name="logo" class="w-full border-gray-300 rounded-lg">
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