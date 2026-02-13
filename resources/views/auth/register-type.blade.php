<x-guest-layout>

    <div class="max-w-md mx-auto mt-16 bg-white dark:bg-gray-800 p-8 rounded-xl shadow-md border border-gray-200 dark:border-gray-700">

        {{-- Logo --}}
        <div class="flex justify-center mb-6">
            <x-authentication-card-logo />
        </div>

        <h1 class="text-2xl font-bold mb-6 text-center text-[#1F4E79] dark:text-indigo-300">
            ¿Cómo quieres registrarte?
        </h1>

        <p class="text-center text-gray-600 dark:text-gray-300 mb-6">
            Selecciona el tipo de cuenta que deseas crear.
        </p>

        <div class="space-y-4">

            {{-- Candidato --}}
            <a href="{{ url('/register/candidato') }}"
                class="block w-full text-center bg-[#1F4E79] dark:bg-indigo-600 text-white py-3 rounded-lg font-semibold
                       hover:bg-[#163a5c] dark:hover:bg-indigo-700 transition">
                Soy Candidato
            </a>

            {{-- Empresa --}}
            <a href="{{ url('/register/empresa') }}"
                class="block w-full text-center bg-gray-500 dark:bg-gray-700 text-white py-3 rounded-lg font-semibold
           hover:bg-gray-600 dark:hover:bg-gray-800 transition">
                Soy Empresa
            </a>



        </div>

        <div class="text-center mt-6">
            <p class="text-gray-600 dark:text-gray-300">
                ¿Ya tienes cuenta?
                <a href="{{ route('login') }}"
                    class="text-[#1F4E79] dark:text-indigo-400 font-semibold hover:underline">
                    Inicia sesión aquí
                </a>
            </p>
        </div>

    </div>

</x-guest-layout>