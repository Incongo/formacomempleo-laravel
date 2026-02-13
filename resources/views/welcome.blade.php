<x-guest-layout>

    <div class="min-h-screen flex flex-col items-center justify-start pt-10 px-4">

        {{-- Logo --}}
        <div class="mb-10">
            <x-authentication-card-logo class="w-24 h-24" />
        </div>

        {{-- HERO --}}
        <div class="max-w-5xl w-full flex flex-col md:flex-row items-center gap-10 mb-20">

            {{-- Texto --}}
            <div class="flex-1 text-center md:text-left">
                <h1 class="text-4xl md:text-5xl font-bold text-[#1F4E79] dark:text-indigo-300 leading-tight mb-6">
                    Conecta talento y oportunidades en un solo lugar
                </h1>

                <p class="text-gray-600 dark:text-gray-300 text-lg mb-8">
                    Formacom Empleo es la plataforma donde empresas encuentran candidatos cualificados
                    y los profesionales descubren nuevas oportunidades laborales.
                </p>

                <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">

                    <a href="{{ url('/register/candidato') }}"
                        class="bg-[#1F4E79] dark:bg-indigo-600 text-white px-8 py-3 rounded-lg font-semibold
                               hover:bg-[#163a5c] dark:hover:bg-indigo-700 transition text-center w-full sm:w-auto">
                        Soy Candidato
                    </a>

                    <a href="{{ url('/register/empresa') }}"
                        class="bg-gray-500 dark:bg-gray-700 text-white px-8 py-3 rounded-lg font-semibold
                               hover:bg-gray-600 dark:hover:bg-gray-800 transition text-center w-full sm:w-auto">
                        Soy Empresa
                    </a>

                </div>
            </div>

            {{-- Imagen Hero --}}
            <div class="flex-1">
                <img src="https://images.unsplash.com/photo-1521791136064-7986c2920216?q=80&w=1200"
                    class="rounded-xl shadow-lg border border-gray-200 dark:border-gray-700"
                    alt="Personas trabajando">
            </div>

        </div>

        {{-- SECCIÓN DE CARACTERÍSTICAS --}}
        <div class="max-w-6xl w-full mb-20">
            <h2 class="text-3xl font-bold text-center text-[#1F4E79] dark:text-indigo-300 mb-10">
                ¿Por qué elegir Formacom Empleo?
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

                <div class="bg-white dark:bg-gray-800 shadow-md rounded-xl p-8 border border-gray-200 dark:border-gray-700 text-center">
                    <div class="text-4xl mb-4">👤</div>
                    <h3 class="text-xl font-semibold text-[#1F4E79] dark:text-indigo-300 mb-2">Para Candidatos</h3>
                    <p class="text-gray-600 dark:text-gray-300">
                        Crea tu perfil, sube tu CV y accede a ofertas adaptadas a tu experiencia.
                    </p>
                </div>

                <div class="bg-white dark:bg-gray-800 shadow-md rounded-xl p-8 border border-gray-200 dark:border-gray-700 text-center">
                    <div class="text-4xl mb-4">🏢</div>
                    <h3 class="text-xl font-semibold text-[#1F4E79] dark:text-indigo-300 mb-2">Para Empresas</h3>
                    <p class="text-gray-600 dark:text-gray-300">
                        Publica ofertas, gestiona candidatos y encuentra el talento ideal.
                    </p>
                </div>

                <div class="bg-white dark:bg-gray-800 shadow-md rounded-xl p-8 border border-gray-200 dark:border-gray-700 text-center">
                    <div class="text-4xl mb-4">⚡</div>
                    <h3 class="text-xl font-semibold text-[#1F4E79] dark:text-indigo-300 mb-2">Rápido y sencillo</h3>
                    <p class="text-gray-600 dark:text-gray-300">
                        Un sistema intuitivo, moderno y accesible desde cualquier dispositivo.
                    </p>
                </div>

            </div>
        </div>

        {{-- BENEFICIOS EXTRA --}}
        <div class="max-w-6xl w-full mb-20">
            <h2 class="text-3xl font-bold text-center text-[#1F4E79] dark:text-indigo-300 mb-10">
                Todo lo que necesitas para avanzar
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

                <div class="bg-white dark:bg-gray-800 shadow-md rounded-xl p-8 border border-gray-200 dark:border-gray-700">
                    <h3 class="text-xl font-semibold text-[#1F4E79] dark:text-indigo-300 mb-3">🔍 Búsqueda avanzada</h3>
                    <p class="text-gray-600 dark:text-gray-300">
                        Filtra ofertas por ubicación, sector, experiencia y más.
                    </p>
                </div>

                <div class="bg-white dark:bg-gray-800 shadow-md rounded-xl p-8 border border-gray-200 dark:border-gray-700">
                    <h3 class="text-xl font-semibold text-[#1F4E79] dark:text-indigo-300 mb-3">📄 Gestión de CVs</h3>
                    <p class="text-gray-600 dark:text-gray-300">
                        Sube tu currículum y actualízalo fácilmente.
                    </p>
                </div>

                <div class="bg-white dark:bg-gray-800 shadow-md rounded-xl p-8 border border-gray-200 dark:border-gray-700">
                    <h3 class="text-xl font-semibold text-[#1F4E79] dark:text-indigo-300 mb-3">📢 Publicación de ofertas</h3>
                    <p class="text-gray-600 dark:text-gray-300">
                        Las empresas pueden publicar y gestionar sus vacantes en minutos.
                    </p>
                </div>

                <div class="bg-white dark:bg-gray-800 shadow-md rounded-xl p-8 border border-gray-200 dark:border-gray-700">
                    <h3 class="text-xl font-semibold text-[#1F4E79] dark:text-indigo-300 mb-3">📱 Acceso desde cualquier lugar</h3>
                    <p class="text-gray-600 dark:text-gray-300">
                        Plataforma responsive y accesible desde móvil, tablet o PC.
                    </p>
                </div>

            </div>
        </div>

        {{-- TESTIMONIOS --}}
        <div class="max-w-6xl w-full mb-20">
            <h2 class="text-3xl font-bold text-center text-[#1F4E79] dark:text-indigo-300 mb-10">
                Lo que dicen nuestros usuarios
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

                <div class="bg-white dark:bg-gray-800 shadow-md rounded-xl p-6 border border-gray-200 dark:border-gray-700">
                    <p class="text-gray-600 dark:text-gray-300 mb-4">
                        “Encontré trabajo en menos de una semana. La plataforma es súper intuitiva.”
                    </p>
                    <p class="font-semibold text-[#1F4E79] dark:text-indigo-300">— Laura, Candidata</p>
                </div>

                <div class="bg-white dark:bg-gray-800 shadow-md rounded-xl p-6 border border-gray-200 dark:border-gray-700">
                    <p class="text-gray-600 dark:text-gray-300 mb-4">
                        “Publicar ofertas y gestionar candidatos nunca fue tan fácil.”
                    </p>
                    <p class="font-semibold text-[#1F4E79] dark:text-indigo-300">— Javier, Empresa</p>
                </div>

                <div class="bg-white dark:bg-gray-800 shadow-md rounded-xl p-6 border border-gray-200 dark:border-gray-700">
                    <p class="text-gray-600 dark:text-gray-300 mb-4">
                        “Una herramienta imprescindible para conectar talento con oportunidades reales.”
                    </p>
                    <p class="font-semibold text-[#1F4E79] dark:text-indigo-300">— Marta, Consultora</p>
                </div>

            </div>
        </div>

        {{-- CTA FINAL --}}
        <div class="text-center mb-20">
            <h2 class="text-3xl font-bold text-[#1F4E79] dark:text-indigo-300 mb-6">
                ¿Listo para comenzar?
            </h2>

            <div class="flex flex-col sm:flex-row gap-4 justify-center">

                <a href="{{ route('login') }}"
                    class="bg-[#1F4E79] dark:bg-indigo-600 text-white px-8 py-3 rounded-lg font-semibold
                           hover:bg-[#163a5c] dark:hover:bg-indigo-700 transition w-full sm:w-auto text-center">
                    Iniciar sesión
                </a>

                <a href="{{ route('register') }}"
                    class="bg-gray-500 dark:bg-gray-700 text-white px-8 py-3 rounded-lg font-semibold
                           hover:bg-gray-600 dark:hover:bg-gray-800 transition w-full sm:w-auto text-center">
                    Crear cuenta
                </a>

            </div>
        </div>

        {{-- FOOTER --}}
        <footer class="w-full py-6 border-t border-gray-300 dark:border-gray-700 text-center text-gray-600 dark:text-gray-400">
            © {{ date('Y') }} Formacom Empleo — Todos los derechos reservados
        </footer>

    </div>

</x-guest-layout>