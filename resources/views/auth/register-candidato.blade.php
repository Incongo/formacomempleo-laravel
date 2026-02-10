<x-guest-layout>

    <div class="bg-white shadow-xl rounded-xl p-10 
            mx-4 sm:mx-8 lg:mx-20 
            max-w-4xl mt-10">


        <h1 class="text-2xl font-bold mb-6 text-center text-[#1F4E79]">
            Registro de Candidato
        </h1>

        <form method="POST" action="{{ route('register.candidato.store') }}" class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @csrf

            {{-- Nombre --}}
            <div>
                <label class="font-semibold block mb-1">Nombre</label>
                <input type="text" name="name" class="w-full border-gray-300 rounded-lg" required>
            </div>

            {{-- Apellidos --}}
            <div>
                <label class="font-semibold block mb-1">Apellidos</label>
                <input type="text" name="apellidos" class="w-full border-gray-300 rounded-lg" required>
            </div>

            {{-- DNI --}}
            <div>
                <label class="font-semibold block mb-1">DNI</label>
                <input type="text" name="dni" class="w-full border-gray-300 rounded-lg">
            </div>

            {{-- Email --}}
            <div>
                <label class="font-semibold block mb-1">Email</label>
                <input type="email" name="email" class="w-full border-gray-300 rounded-lg" required>
            </div>

            {{-- Teléfono --}}
            <div>
                <label class="font-semibold block mb-1">Teléfono</label>
                <input type="text" name="telefono" class="w-full border-gray-300 rounded-lg">
            </div>

            {{-- LinkedIn --}}
            <div>
                <label class="font-semibold block mb-1">LinkedIn</label>
                <input type="text" name="linkedin" class="w-full border-gray-300 rounded-lg">
            </div>

            {{-- Web --}}
            <div>
                <label class="font-semibold block mb-1">Web personal</label>
                <input type="text" name="web" class="w-full border-gray-300 rounded-lg">
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

            {{-- Fecha de nacimiento --}}
            <div>
                <label class="font-semibold block mb-1">Fecha de nacimiento</label>
                <input type="date" name="fecha_nacimiento" class="w-full border-gray-300 rounded-lg">
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
                <button class="w-full bg-[#1F4E79] text-black py-3 rounded-lg font-semibold hover:bg-[#163a5c] transition">
                    Registrarme como Candidato
                </button>
            </div>

        </form>
    </div>

</x-guest-layout>