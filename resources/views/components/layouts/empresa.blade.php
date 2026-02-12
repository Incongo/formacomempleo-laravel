<!DOCTYPE html>
<html lang="es"
    class="h-full"
    x-data="{
          darkMode: localStorage.getItem('darkMode') === 'true',
          toggleDark() {
              this.darkMode = !this.darkMode;
              localStorage.setItem('darkMode', this.darkMode);
          }
      }"
    :class="{ 'dark bg-gray-900 text-white': darkMode }">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? 'Panel empresa' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="h-full">

    <div class="min-h-screen flex">

        {{-- SIDEBAR DE JETSTREAM --}}
        @include('navigation-menu')
        {{-- este es el sidebar original --}}

        {{-- CONTENIDO PRINCIPAL --}}
        <div class="flex-1">

            {{-- HEADER --}}
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4">
                    <div class="flex justify-between items-center">

                        <div>
                            {{ $header }}
                        </div>

                        {{-- BOTÓN DARK MODE --}}
                        <button @click="toggleDark()"
                            class="p-2 rounded-md text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700">
                            <svg x-show="!darkMode" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364-.707-.707M6.343 6.343l-.707-.707m12.728 0-.707.707M6.343 17.657l-.707.707M12 8a4 4 0 1 0 0 8 4 4 0 0 0 0-8Z" />
                            </svg>

                            <svg x-show="darkMode" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79Z" />
                            </svg>
                        </button>

                    </div>
                </div>
            </header>

            {{-- CONTENIDO --}}
            <main class="py-6 px-4 max-w-7xl mx-auto">
                {{ $slot }}
            </main>

        </div>

    </div>

</body>

</html>