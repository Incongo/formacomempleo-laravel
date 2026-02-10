<x-guest-layout>

    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white shadow-xl rounded-xl p-8    
                    max-w-sm w-full mx-4">

            <h1 class="text-2xl font-bold mb-6 text-center text-[#1F4E79]">
                Registro de Empresa
            </h1>

            <form method="POST" action="{{ url('/register/empresa') }}"
                enctype="multipart/form-data"
                class="grid grid-cols-1 gap-6">
                @csrf

                {{-- Nombre --}}
                <div>
                    <label class="font-semibold block mb-1">Nombre de la empresa</label>
                    <input type="text" name="nombre" class="w-full border-gray-300 rounded-lg" required>
                </div>

                {{-- CIF --}}
                <div>
                    <label class="font-semibold block mb-1">CIF</label>
                    <input type="text" name="cif" class="w-full border-gray-300 rounded-lg" required>
                </div>

                {{-- Email corporativo --}}
                <div>
                    <label class="font-semibold block mb-1">Email corporativo</label>
                    <input type="email" name="email" class="w-full border-gray-300 rounded-lg" required>
                </div>

                {{-- Teléfono --}}
                <div>
                    <label class="font-semibold block mb-1">Teléfono</label>
                    <input type="text" name="telefono" class="w-full border-gray-300 rounded-lg">
                </div>

                {{-- Web --}}
                <div>
                    <label class="font-semibold block mb-1">Página web</label>
                    <input type="text" name="web" class="w-full border-gray-300 rounded-lg">
                </div>

                {{-- Persona de contacto --}}
                <div>
                    <label class="font-semibold block mb-1">Persona de contacto</label>
                    <input type="text" name="persona_contacto" class="w-full border-gray-300 rounded-lg">
                </div>

                {{-- Email de contacto --}}
                <div>
                    <label class="font-semibold block mb-1">Email de contacto</label>
                    <input type="email" name="email_contacto" class="w-full border-gray-300 rounded-lg">
                </div>

                {{-- Dirección (fila completa) --}}
                <div class="md:col-span-2">
                    <label class="font-semibold block mb-1">Dirección</label>
                    <input type="text" name="direccion" class="w-full border-gray-300 rounded-lg">
                </div>

                {{-- Código Postal --}}
                <div>
                    <label class="font-semibold block mb-1">Código Postal</label>
                    <input type="text" name="cp" class="w-full border-gray-300 rounded-lg">
                </div>

                {{-- Ciudad --}}
                <div>
                    <label class="font-semibold block mb-1">Ciudad</label>
                    <input type="text" name="ciudad" class="w-full border-gray-300 rounded-lg">
                </div>

                {{-- Provincia --}}
                <div>
                    <label class="font-semibold block mb-1">Provincia</label>
                    <input type="text" name="provincia" class="w-full border-gray-300 rounded-lg">
                </div>

                {{-- Sectores (fila completa) --}}
                <div class="md:col-span-2">
                    <label class="font-semibold block mb-1">Sectores</label>
                    <select name="sectores[]" class="w-full border-gray-300 rounded-lg" multiple size="5">
                        @foreach($sectores as $sector)
                        <option value="{{ $sector->id }}">{{ $sector->nombre }}</option>
                        @endforeach
                    </select>
                    <p class="text-sm text-gray-500 mt-1">Puedes seleccionar varios sectores manteniendo pulsado CTRL.</p>
                </div>

                {{-- Logo --}}
                <div class="md:col-span-2">
                    <label class="font-semibold block mb-1">Logo de la empresa</label>
                    <input type="file" name="logo" accept="image/*"
                        class="w-full border-gray-300 rounded-lg">
                </div>

                {{-- Contraseña --}}
                <div>
                    <label class="font-semibold block mb-1">Contraseña</label>
                    <input type="password" name="password" class="w-full border-gray-300 rounded-lg" required>
                </div>

                {{-- Confirmación --}}
                <div>
                    <label class="font-semibold block mb-1">Confirmar contraseña</label>
                    <input type="password" name="password_confirmation" class="w-full border-gray-300 rounded-lg" required>
                </div>

                {{-- Botón --}}
                <div class="md:col-span-2">
                    <button class="w-full bg-green-600 text-black py-3 rounded-lg font-semibold hover:bg-green-700 transition">
                        Registrarme como Empresa
                    </button>
                </div>

            </form>
        </div>

</x-guest-layout>