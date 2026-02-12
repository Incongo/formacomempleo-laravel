<x-layouts.dashboard>

    <x-slot name="header">
        <h2 class="text-2xl font-bold text-[#1F4E79] dark:text-indigo-300">
            Editar Perfil de Candidato
        </h2>
    </x-slot>

    <form method="POST" action="{{ route('candidato.perfil.update') }}" enctype="multipart/form-data" class="space-y-12">
        @csrf

        <div class="bg-white dark:bg-gray-800 p-8 rounded-xl shadow-md border border-gray-200 dark:border-gray-700">
            <h2 class="text-xl font-semibold text-[#1F4E79] dark:text-indigo-300">Información personal</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">

                {{-- Nombre --}}
                <div>
                    <label class="font-semibold dark:text-gray-200">Nombre</label>
                    <input type="text" name="name" value="{{ $candidato->name }}"
                        class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg">
                </div>

                {{-- Apellidos --}}
                <div>
                    <label class="font-semibold dark:text-gray-200">Apellidos</label>
                    <input type="text" name="apellidos" value="{{ $candidato->apellidos }}"
                        class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg">
                </div>

                {{-- DNI --}}
                <div>
                    <label class="font-semibold dark:text-gray-200">DNI</label>
                    <input type="text" name="dni" value="{{ $candidato->dni }}"
                        class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg">
                </div>

                {{-- Teléfono --}}
                <div>
                    <label class="font-semibold dark:text-gray-200">Teléfono</label>
                    <input type="text" name="telefono" value="{{ $candidato->telefono }}"
                        class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg">
                </div>

                {{-- LinkedIn --}}
                <div>
                    <label class="font-semibold dark:text-gray-200">LinkedIn</label>
                    <input type="text" name="linkedin" value="{{ $candidato->linkedin }}"
                        class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg">
                </div>

                {{-- Web --}}
                <div>
                    <label class="font-semibold dark:text-gray-200">Web personal</label>
                    <input type="text" name="web" value="{{ $candidato->web }}"
                        class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg">
                </div>

                {{-- Dirección --}}
                <div class="md:col-span-2">
                    <label class="font-semibold dark:text-gray-200">Dirección</label>
                    <input type="text" name="direccion" value="{{ $candidato->direccion }}"
                        class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg">
                </div>

                {{-- CP --}}
                <div>
                    <label class="font-semibold dark:text-gray-200">Código Postal</label>
                    <input type="text" name="cp" value="{{ $candidato->cp }}"
                        class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg">
                </div>

                {{-- Ciudad --}}
                <div>
                    <label class="font-semibold dark:text-gray-200">Ciudad</label>
                    <input type="text" name="ciudad" value="{{ $candidato->ciudad }}"
                        class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg">
                </div>

                {{-- Provincia --}}
                <div>
                    <label class="font-semibold dark:text-gray-200">Provincia</label>
                    <input type="text" name="provincia" value="{{ $candidato->provincia }}"
                        class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg">
                </div>

                {{-- Fecha nacimiento --}}
                <div>
                    <label class="font-semibold dark:text-gray-200">Fecha de nacimiento</label>
                    <input type="date" name="fecha_nacimiento" value="{{ $candidato->fecha_nacimiento }}"
                        class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg">
                </div>

                {{-- Foto --}}
                <div>
                    <label class="font-semibold dark:text-gray-200">Foto</label>
                    <input type="file" name="foto"
                        class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg">
                </div>

                {{-- CV --}}
                <div>
                    <label class="font-semibold dark:text-gray-200">CV</label>
                    <input type="file" name="cv"
                        class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg">
                </div>

            </div>
        </div>

        <div class="flex justify-end">
            <button
                class="bg-[#1F4E79] dark:bg-indigo-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-[#163a5c] dark:hover:bg-indigo-700 transition">
                Guardar cambios
            </button>
        </div>
    </form>

</x-layouts.dashboard>