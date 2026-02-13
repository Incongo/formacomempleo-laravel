<x-guest-layout>

    <div class="min-h-screen flex flex-col items-center justify-center px-4">

        {{-- Logo arriba --}}
        <div class="mb-6">
            <x-authentication-card-logo />
        </div>

        {{-- Tarjeta --}}
        <div class="bg-white dark:bg-gray-800 shadow-xl rounded-xl p-10 
                    w-full max-w-md border border-gray-200 dark:border-gray-700">

            <h1 class="text-2xl font-bold mb-4 text-center text-[#1F4E79] dark:text-indigo-300">
                Confirmar contraseña
            </h1>

            <p class="text-gray-600 dark:text-gray-300 text-center mb-6">
                Esta es un área segura. Por favor, confirma tu contraseña para continuar.
            </p>

            {{-- Errores --}}
            @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg dark:bg-red-900 dark:text-red-300">
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                {{-- Contraseña --}}
                <div>
                    <label for="password" class="font-semibold dark:text-gray-200">Contraseña</label>
                    <input id="password" type="password" name="password"
                        class="block mt-1 w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg"
                        required autofocus autocomplete="current-password">
                </div>

                {{-- Botón --}}
                <div class="flex justify-end mt-6">
                    <button
                        class="bg-[#1F4E79] dark:bg-indigo-600 text-white px-6 py-2 rounded-lg font-semibold
                               hover:bg-[#163a5c] dark:hover:bg-indigo-700 transition">
                        Confirmar
                    </button>
                </div>
            </form>

        </div>
    </div>

</x-guest-layout>