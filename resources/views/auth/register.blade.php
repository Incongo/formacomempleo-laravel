<x-guest-layout>

    <div class="max-w-md mx-auto bg-white dark:bg-gray-800 p-8 rounded-xl shadow-md border border-gray-200 dark:border-gray-700">

        {{-- Logo --}}
        <div class="flex justify-center mb-6">
            <x-authentication-card-logo />
        </div>

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

        <h2 class="text-2xl font-bold text-center text-[#1F4E79] dark:text-indigo-300 mb-6">
            Crear cuenta
        </h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            {{-- Nombre --}}
            <div>
                <label for="name" class="font-semibold dark:text-gray-200">Nombre completo</label>
                <input id="name" type="text" name="name"
                    class="block mt-1 w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg"
                    value="{{ old('name') }}" required autofocus autocomplete="name">
            </div>

            {{-- Email --}}
            <div class="mt-4">
                <label for="email" class="font-semibold dark:text-gray-200">Correo electrónico</label>
                <input id="email" type="email" name="email"
                    class="block mt-1 w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg"
                    value="{{ old('email') }}" required autocomplete="username">
            </div>

            {{-- Contraseña --}}
            <div class="mt-4">
                <label for="password" class="font-semibold dark:text-gray-200">Contraseña</label>
                <input id="password" type="password" name="password"
                    class="block mt-1 w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg"
                    required autocomplete="new-password">
            </div>

            {{-- Confirmar contraseña --}}
            <div class="mt-4">
                <label for="password_confirmation" class="font-semibold dark:text-gray-200">Confirmar contraseña</label>
                <input id="password_confirmation" type="password" name="password_confirmation"
                    class="block mt-1 w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg"
                    required autocomplete="new-password">
            </div>

            {{-- Términos y condiciones --}}
            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
            <div class="mt-4">
                <label for="terms" class="flex items-center dark:text-gray-200">
                    <input id="terms" type="checkbox" name="terms"
                        class="rounded border-gray-300 dark:border-gray-600 dark:bg-gray-700 text-indigo-600" required>

                    <span class="ms-2 text-sm text-gray-600 dark:text-gray-300">
                        Acepto los
                        <a href="{{ route('terms.show') }}" target="_blank"
                            class="text-[#1F4E79] dark:text-indigo-400 hover:underline">
                            Términos del servicio
                        </a>
                        y la
                        <a href="{{ route('policy.show') }}" target="_blank"
                            class="text-[#1F4E79] dark:text-indigo-400 hover:underline">
                            Política de privacidad
                        </a>.
                    </span>
                </label>
            </div>
            @endif

            {{-- Botones --}}
            <div class="flex items-center justify-between mt-6">

                <a href="{{ route('login') }}"
                    class="text-sm text-gray-600 dark:text-gray-300 hover:text-[#1F4E79] dark:hover:text-indigo-400">
                    ¿Ya tienes cuenta?
                </a>

                <button
                    class="bg-[#1F4E79] dark:bg-indigo-600 text-white px-6 py-2 rounded-lg font-semibold hover:bg-[#163a5c] dark:hover:bg-indigo-700 transition">
                    Registrarme
                </button>
            </div>

        </form>
    </div>

</x-guest-layout>