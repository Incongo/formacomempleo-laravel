<x-layouts.dashboard>

    <x-slot name="header">
        <h2 class="text-2xl font-bold text-[#1F4E79] dark:text-indigo-300">
            Editar Perfil de Empresa
        </h2>
    </x-slot>

    <form method="POST" action="{{ route('empresa.perfil.update') }}" enctype="multipart/form-data" class="space-y-12">
        @csrf

        <div class="bg-white dark:bg-gray-800 p-8 rounded-xl shadow-md border border-gray-200 dark:border-gray-700">
            <h2 class="text-xl font-semibold text-[#1F4E79] dark:text-indigo-300">
                Información general
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">

                {{-- Nombre --}}
                <div>
                    <label class="font-semibold dark:text-gray-200">Nombre</label>
                    <input type="text" name="nombre" value="{{ $empresa->nombre }}"
                        class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg">
                </div>

                {{-- CIF --}}
                <div>
                    <label class="font-semibold dark:text-gray-200">CIF</label>
                    <input type="text" name="cif" value="{{ $empresa->cif }}"
                        class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg">
                </div>

                {{-- Teléfono --}}
                <div>
                    <label class="font-semibold dark:text-gray-200">Teléfono</label>
                    <input type="text" name="telefono" value="{{ $empresa->telefono }}"
                        class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg">
                </div>

                {{-- Web --}}
                <div>
                    <label class="font-semibold dark:text-gray-200">Web</label>
                    <input type="text" name="web" value="{{ $empresa->web }}"
                        class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg">
                </div>

                {{-- Persona de contacto --}}
                <div>
                    <label class="font-semibold dark:text-gray-200">Persona de contacto</label>
                    <input type="text" name="persona_contacto" value="{{ $empresa->persona_contacto }}"
                        class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg">
                </div>

                {{-- Email de contacto --}}
                <div>
                    <label class="font-semibold dark:text-gray-200">Email de contacto</label>
                    <input type="email" name="email_contacto" value="{{ $empresa->email_contacto }}"
                        class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg">
                </div>

                {{-- Dirección --}}
                <div class="md:col-span-2">
                    <label class="font-semibold dark:text-gray-200">Dirección</label>
                    <input type="text" name="direccion" value="{{ $empresa->direccion }}"
                        class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg">
                </div>

                {{-- Código Postal --}}
                <div>
                    <label class="font-semibold dark:text-gray-200">Código Postal</label>
                    <input type="text" name="cp" value="{{ $empresa->cp }}"
                        class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg">
                </div>

                {{-- Ciudad --}}
                <div>
                    <label class="font-semibold dark:text-gray-200">Ciudad</label>
                    <input type="text" name="ciudad" value="{{ $empresa->ciudad }}"
                        class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg">
                </div>

                {{-- Provincia --}}
                <div>
                    <label class="font-semibold dark:text-gray-200">Provincia</label>
                    <input type="text" name="provincia" value="{{ $empresa->provincia }}"
                        class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg">
                </div>

                {{-- Sectores --}}
                <div class="md:col-span-2">
                    <label class="font-semibold dark:text-gray-200">Sectores</label>
                    <select name="sectores[]" multiple size="5"
                        class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg">
                        @foreach($sectores as $sector)
                        <option value="{{ $sector->id }}"
                            @if($empresa->sectores->contains($sector->id)) selected @endif>
                            {{ $sector->nombre }}
                        </option>
                        @endforeach
                    </select>
                </div>

                {{-- Logo --}}
                <div class="md:col-span-2">
                    <label class="font-semibold dark:text-gray-200">Logo</label>
                    <input type="file" name="logo"
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