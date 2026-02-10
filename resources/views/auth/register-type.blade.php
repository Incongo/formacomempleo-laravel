<x-guest-layout>

    <div class="max-w-md mx-auto mt-10 bg-white p-8 rounded-xl shadow-md text-center">

        <h1 class="text-2xl font-bold mb-6 text-gray-800">
            ¿Cómo quieres registrarte?
        </h1>

        <div class="space-y-4">

            <a href="{{ url('/register/candidato') }}"
                class="block w-full bg-blue-600 text-black py-3 rounded-lg hover:bg-blue-700 transition">
                Soy Candidato
            </a>

            <a href="{{ url('/register/empresa') }}"
                class="block w-full bg-green-600 text-black py-3 rounded-lg hover:bg-green-700 transition">
                Soy Empresa
            </a>

        </div>

    </div>

</x-guest-layout>