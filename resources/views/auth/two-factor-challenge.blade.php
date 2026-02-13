<x-guest-layout>

    <div class="min-h-screen flex flex-col items-center justify-center px-4">

        {{-- Logo arriba --}}
        <div class="mb-6">
            <x-authentication-card-logo />
        </div>

        {{-- Tarjeta --}}
        <div class="bg-white dark:bg-gray-800 shadow-xl rounded-xl p-10 
                    w-full max-w-md border border-gray-200 dark:border-gray-700"
            x-data="{ recovery: false }">

            <h1 class="text-2xl font-bold mb-4 text-center text-[#1F4E79] dark:text-indigo-300">
                Autenticación en dos pasos
            </h1>

            {{-- Texto modo normal --}}
            <p class="text-gray-600 dark:text-gray-300 mb-6" x-show="!recovery">
                Confirma el acceso introduciendo el código generado por tu aplicación de autenticación.
            </p>

            {{-- Texto modo recuperación --}}
            <p class="text-gray-600 dark:text-gray-300 mb-6" x-show="recovery" x-cloak>
                Introduce uno de tus códigos de recuperación para acceder a tu cuenta.
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

            <form method="POST" action="{{ route('two-factor.login') }}">
                @csrf

                {{-- Código normal --}}
                <div x-show="!recovery">
                    <label for="code" class="font-semibold dark:text-gray-200">Código</label>
                    <input id="code" type="text" name="code" inputmode="numeric"
                        class="block mt-1 w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg"
                        autofocus autocomplete="one-time-code"
                        x-ref="code">
                </div>

                {{-- Código de recuperación --}}
                <div x-show="recovery" x-cloak>
                    <label for="recovery_code" class="font-semibold dark:text-gray-200">Código de recuperación</label>
                    <input id="recovery_code" type="text" name="recovery_code"
                        class="block mt-1 w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg"
                        autocomplete="one-time-code"
                        x-ref="recovery_code">
                </div>

                {{-- Acciones --}}
                <div class="flex items-center justify-between mt-6">

                    {{-- Cambiar a código de recuperación --}}
                    <button type="button"
                        class="text-sm text-gray-600 dark:text-gray-300 hover:text-[#1F4E79] dark:hover:text-indigo-400 underline"
                        x-show="!recovery"
                        x-on:click="
                            recovery = true;
                            $nextTick(() => { $refs.recovery_code.focus() })
                        ">
                        Usar un código de recuperación
                    </button>

                    {{-- Cambiar a código normal --}}
                    <button type="button"
                        class="text-sm text-gray-600 dark:text-gray-300 hover:text-[#1F4E79] dark:hover:text-indigo-400 underline"
                        x-show="recovery"
                        x-cloak
                        x-on:click="
                            recovery = false;
                            $nextTick(() => { $refs.code.focus() })
                        ">
                        Usar un código de autenticación
                    </button>

                    {{-- Botón de enviar --}}
                    <button
                        class="bg-[#1F4E79] dark:bg-indigo-600 text-white px-6 py-2 rounded-lg font-semibold
                               hover:bg-[#163a5c] dark:hover:bg-indigo-700 transition ms-4">
                        Entrar
                    </button>
                </div>

            </form>

        </div>
    </div>

</x-guest-layout>