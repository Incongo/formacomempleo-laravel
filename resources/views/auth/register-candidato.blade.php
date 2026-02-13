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
            Registro de Candidato
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

        <form method="POST" action="{{ route('register.candidato.store') }}"
            class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @csrf

            {{-- Nombre --}}
            <div>
                <label class="font-semibold block mb-1 dark:text-gray-200">Nombre</label>
                <input type="text" name="name"
                    class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg"
                    required>
            </div>

            {{-- Apellidos --}}
            <div>
                <label class="font-semibold block mb-1 dark:text-gray-200">Apellidos</label>
                <input type="text" name="apellidos"
                    class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg"
                    required>
            </div>

            {{-- DNI --}}
            <div>
                <label class="font-semibold block mb-1 dark:text-gray-200">DNI</label>
                <input type="text" name="dni"
                    class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg">
            </div>

            {{-- Email --}}
            <div>
                <label class="font-semibold block mb-1 dark:text-gray-200">Email</label>
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

            {{-- LinkedIn --}}
            <div>
                <label class="font-semibold block mb-1 dark:text-gray-200">LinkedIn</label>
                <input type="text" name="linkedin"
                    class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg">
            </div>

            {{-- Web --}}
            <div>
                <label class="font-semibold block mb-1 dark:text-gray-200">Web personal</label>
                <input type="text" name="web"
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

            {{-- Fecha de nacimiento --}}
            <div>
                <label class="font-semibold block mb-1 dark:text-gray-200">Fecha de nacimiento</label>
                <input type="date" name="fecha_nacimiento"
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
                    class="w-full bg-[#1F4E79] dark:bg-indigo-600 text-white py-3 rounded-lg font-semibold
                           hover:bg-[#163a5c] dark:hover:bg-indigo-700 transition">
                    Registrarme como Candidato
                </button>
            </div>

        </form>
    </div>

</x-guest-layout>