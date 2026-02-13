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

        {{-- Mensaje de estado --}}
        @if (session('status'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded-lg dark:bg-green-900 dark:text-green-300">
            {{ session('status') }}
        </div>
        @endif

        <h2 class="text-2xl font-bold text-center text-[#1F4E79] dark:text-indigo-300 mb-6">
            Iniciar sesión
        </h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            {{-- Email --}}
            <div>
                <label for="email" class="font-semibold dark:text-gray-200">Correo electrónico</label>
                <input id="email" type="email" name="email"
                    class="block mt-1 w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg"
                    value="{{ old('email') }}" required autofocus autocomplete="username">
            </div>

            {{-- Contraseña --}}
            <div class="mt-4">
                <label for="password" class="font-semibold dark:text-gray-200">Contraseña</label>
                <input id="password" type="password" name="password"
                    class="block mt-1 w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg"
                    required autocomplete="current-password">
            </div>

            {{-- Recordarme --}}
            <div class="flex items-center mt-4">
                <input id="remember_me" type="checkbox" name="remember"
                    class="rounded border-gray-300 dark:border-gray-600 dark:bg-gray-700 text-indigo-600">
                <label for="remember_me" class="ms-2 text-sm text-gray-600 dark:text-gray-300">
                    Recuérdame
                </label>
            </div>

            {{-- Botones --}}
            <div class="flex items-center justify-between mt-6">

                @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}"
                    class="text-sm text-gray-600 dark:text-gray-300 hover:text-[#1F4E79] dark:hover:text-indigo-400">
                    ¿Olvidaste tu contraseña?
                </a>
                @endif

                <button
                    class="bg-[#1F4E79] dark:bg-indigo-600 text-white px-6 py-2 rounded-lg font-semibold hover:bg-[#163a5c] dark:hover:bg-indigo-700 transition">
                    Entrar
                </button>
            </div>

            {{-- Registro --}}
            <div class="text-center mt-6">
                <p class="text-gray-600 dark:text-gray-300">
                    ¿No tienes cuenta?
                    <a href="{{ route('register') }}"
                        class="text-[#1F4E79] dark:text-indigo-400 font-semibold hover:underline">
                        Regístrate aquí
                    </a>
                </p>
            </div>

        </form>
    </div>

</x-guest-layout>