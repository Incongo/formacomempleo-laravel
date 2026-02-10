<x-app-layout>
    <x-slot name="header">
        Editar Perfil de Candidato
    </x-slot>

    <form method="POST" action="{{ route('candidato.perfil.update') }}" enctype="multipart/form-data" class="space-y-12">
        @csrf

        <div class="bg-white p-8 rounded-xl shadow-md">
            <h2 class="text-xl font-semibold text-[#1F4E79]">Información personal</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">

                <div>
                    <label class="font-semibold">Nombre</label>
                    <input type="text" name="name" value="{{ $candidato->name }}" class="w-full border-gray-300 rounded-lg">
                </div>

                <div>
                    <label class="font-semibold">Apellidos</label>
                    <input type="text" name="apellidos" value="{{ $candidato->apellidos }}" class="w-full border-gray-300 rounded-lg">
                </div>

                <div>
                    <label class="font-semibold">DNI</label>
                    <input type="text" name="dni" value="{{ $candidato->dni }}" class="w-full border-gray-300 rounded-lg">
                </div>

                <div>
                    <label class="font-semibold">Teléfono</label>
                    <input type="text" name="telefono" value="{{ $candidato->telefono }}" class="w-full border-gray-300 rounded-lg">
                </div>

                <div>
                    <label class="font-semibold">LinkedIn</label>
                    <input type="text" name="linkedin" value="{{ $candidato->linkedin }}" class="w-full border-gray-300 rounded-lg">
                </div>

                <div>
                    <label class="font-semibold">Web personal</label>
                    <input type="text" name="web" value="{{ $candidato->web }}" class="w-full border-gray-300 rounded-lg">
                </div>

                <div class="md:col-span-2">
                    <label class="font-semibold">Dirección</label>
                    <input type="text" name="direccion" value="{{ $candidato->direccion }}" class="w-full border-gray-300 rounded-lg">
                </div>

                <div>
                    <label class="font-semibold">Código Postal</label>
                    <input type="text" name="cp" value="{{ $candidato->cp }}" class="w-full border-gray-300 rounded-lg">
                </div>

                <div>
                    <label class="font-semibold">Ciudad</label>
                    <input type="text" name="ciudad" value="{{ $candidato->ciudad }}" class="w-full border-gray-300 rounded-lg">
                </div>

                <div>
                    <label class="font-semibold">Provincia</label>
                    <input type="text" name="provincia" value="{{ $candidato->provincia }}" class="w-full border-gray-300 rounded-lg">
                </div>

                <div>
                    <label class="font-semibold">Fecha de nacimiento</label>
                    <input type="date" name="fecha_nacimiento" value="{{ $candidato->fecha_nacimiento }}" class="w-full border-gray-300 rounded-lg">
                </div>

                <div>
                    <label class="font-semibold">Foto</label>
                    <input type="file" name="foto" class="w-full border-gray-300 rounded-lg">
                </div>

                <div>
                    <label class="font-semibold">CV</label>
                    <input type="file" name="cv" class="w-full border-gray-300 rounded-lg">
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