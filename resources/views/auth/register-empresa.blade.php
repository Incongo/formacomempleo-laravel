<x-guest-layout>

    <div class="bg-white dark:bg-gray-800 shadow-xl rounded-xl p-10 
                mx-4 sm:mx-8 lg:mx-20 
                max-w-4xl mt-10 border border-gray-200 dark:border-gray-700">

        {{-- Logo --}}
        <div class="flex justify-center mb-6">
            <x-authentication-card-logo />
        </div>

        {{-- Título --}}
        <h1 class="text-2xl font-bold mb-6 text-center text-[#1F4E79] dark:text-indigo-300">
            Registro de Empresa
        </h1>

        {{-- Errores --}}
        @if ($errors->any())
        <div class="mb-6 p-4 bg-red-100 text-red-700 rounded-lg dark:bg-red-900 dark:text-red-300">
            <ul class="list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{ url('/register/empresa') }}"
            enctype="multipart/form-data"
            class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @csrf

            {{-- Nombre --}}
            <div>
                <label class="font-semibold block mb-1 dark:text-gray-200">Nombre de la empresa</label>
                <input type="text" name="nombre"
                    class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg"
                    required>
            </div>

            {{-- CIF --}}
            <div>
                <label class="font-semibold block mb-1 dark:text-gray-200">CIF</label>
                <input type="text" name="cif"
                    class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg"
                    required>
            </div>

            {{-- Email corporativo --}}
            <div>
                <label class="font-semibold block mb-1 dark:text-gray-200">Email corporativo</label>
                <input type="email" name="email"
                    class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg"
                    required>
            </div>

            {{-- Teléfono --}}
            <div>
                <label class="font-semibold block mb-1 dark:text-gray-200">Teléfono</label>
                <input type="text" name="telefono"
                    class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg">
            </div>

            {{-- Web --}}
            <div>
                <label class="font-semibold block mb-1 dark:text-gray-200">Página web</label>
                <input type="text" name="web"
                    class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg">
            </div>

            {{-- Persona de contacto --}}
            <div>
                <label class="font-semibold block mb-1 dark:text-gray-200">Persona de contacto</label>
                <input type="text" name="persona_contacto"
                    class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg">
            </div>

            {{-- Email de contacto --}}
            <div>
                <label class="font-semibold block mb-1 dark:text-gray-200">Email de contacto</label>
                <input type="email" name="email_contacto"
                    class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg">
            </div>

            {{-- Dirección --}}
            <div class="md:col-span-2">
                <label class="font-semibold block mb-1 dark:text-gray-200">Dirección</label>
                <input type="text" name="direccion"
                    class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg">
            </div>

            {{-- Código Postal --}}
            <div>
                <label class="font-semibold block mb-1 dark:text-gray-200">Código Postal</label>
                <input type="text" name="cp"
                    class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg">
            </div>

            {{-- Ciudad --}}
            <div>
                <label class="font-semibold block mb-1 dark:text-gray-200">Ciudad</label>
                <input type="text" name="ciudad"
                    class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg">
            </div>

            {{-- Provincia --}}
            <div>
                <label class="font-semibold block mb-1 dark:text-gray-200">Provincia</label>
                <input type="text" name="provincia"
                    class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg">
            </div>

            {{-- Sectores --}}
            <div class="md:col-span-2">
                <label class="font-semibold block mb-1 dark:text-gray-200">Sectores</label>
                <select name="sectores[]" multiple size="5"
                    class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg">
                    @foreach($sectores as $sector)
                    <option value="{{ $sector->id }}">{{ $sector->nombre }}</option>
                    @endforeach
                </select>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                    Puedes seleccionar varios sectores manteniendo pulsado CTRL.
                </p>
            </div>

            {{-- Logo --}}
            <div class="md:col-span-2">
                <label class="font-semibold block mb-1 dark:text-gray-200">Logo de la empresa</label>
                <input type="file" name="logo" accept="image/*"
                    class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg">
            </div>

            {{-- Contraseña --}}
            <div>
                <label class="font-semibold block mb-1 dark:text-gray-200">Contraseña</label>
                <input type="password" name="password"
                    class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg"
                    required>
            </div>

            {{-- Confirmación --}}
            <div>
                <label class="font-semibold block mb-1 dark:text-gray-200">Confirmar contraseña</label>
                <input type="password" name="password_confirmation"
                    class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg"
                    required>
            </div>

            {{-- Botón --}}
            <div class="md:col-span-2">
                <button
                    class="w-full bg-gray-500 dark:bg-gray-700 text-white py-3 rounded-lg font-semibold
                           hover:bg-gray-600 dark:hover:bg-gray-800 transition">
                    Registrarme como Empresa
                </button>
            </div>

        </form>
    </div>

</x-guest-layout>