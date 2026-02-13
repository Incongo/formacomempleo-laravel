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
                Verifica tu correo electrónico
            </h1>

            <p class="text-gray-600 dark:text-gray-300 text-center mb-6">
                Antes de continuar, por favor verifica tu dirección de correo haciendo clic en el enlace que te acabamos de enviar.
                Si no lo has recibido, podemos enviarte otro sin problema.
            </p>

            {{-- Mensaje de estado --}}
            @if (session('status') == 'verification-link-sent')
            <div class="mb-4 p-3 bg-green-100 text-green-700 rounded-lg dark:bg-green-900 dark:text-green-300">
                Se ha enviado un nuevo enlace de verificación a tu correo electrónico.
            </div>
            @endif

            <div class="mt-4 flex flex-col gap-4">

                {{-- Reenviar email --}}
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button
                        class="w-full bg-[#1F4E79] dark:bg-indigo-600 text-white py-2 rounded-lg font-semibold
                               hover:bg-[#163a5c] dark:hover:bg-indigo-700 transition">
                        Reenviar correo de verificación
                    </button>
                </form>

                {{-- Editar perfil + Cerrar sesión --}}
                <div class="flex justify-between items-center text-sm">

                    <a href="{{ route('profile.show') }}"
                        class="text-gray-600 dark:text-gray-300 hover:text-[#1F4E79] dark:hover:text-indigo-400 underline">
                        Editar perfil
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="text-gray-600 dark:text-gray-300 hover:text-[#1F4E79] dark:hover:text-indigo-400 underline">
                            Cerrar sesión
                        </button>
                    </form>

                </div>

            </div>

        </div>
    </div>

</x-guest-layout>