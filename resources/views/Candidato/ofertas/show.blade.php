<x-layouts.dashboard>

    <x-slot name="header">
        <h2 class="text-2xl font-bold text-[#1F4E79] dark:text-indigo-300">
            {{ $oferta->titulo }}
        </h2>
        <p class="text-black/70 dark:text-gray-300 mt-1">
            {{ $oferta->empresa->nombre }}
        </p>
    </x-slot>

    @php
    $candidato = auth()->user()->candidato;
    $postulacion = $candidato
    ? $candidato->postulaciones()->where('oferta_id', $oferta->id)->first()
    : null;
    @endphp

    <div class="max-w-3xl mx-auto bg-white dark:bg-gray-800 p-6 rounded-xl shadow-md space-y-6 border border-gray-200 dark:border-gray-700">

        {{-- Información de la oferta --}}
        <div class="space-y-2">
            <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                {{ $oferta->descripcion }}
            </p>
            <p class="text-gray-700 dark:text-gray-300"><strong class="dark:text-gray-200">Sector:</strong>{{ $oferta->sector->nombre ?? 'Sin sector' }}</p>
            <p class="text-gray-700 dark:text-gray-300"><strong class="dark:text-gray-200">Ubicación:</strong> {{ $oferta->ubicacion }}</p>
            <p class="text-gray-700 dark:text-gray-300"><strong class="dark:text-gray-200">Contrato:</strong> {{ $oferta->tipo_contrato }}</p>
            <p class="text-gray-700 dark:text-gray-300"><strong class="dark:text-gray-200">Modalidad:</strong> {{ $oferta->modalidad }}</p>
            <p class="text-gray-700 dark:text-gray-300"><strong class="dark:text-gray-200">Salario:</strong> {{ $oferta->salario }}</p>
        </div>

        {{-- Estado de la postulación --}}
        @if($postulacion)
        <div class="p-4 rounded-lg bg-blue-100 dark:bg-blue-900 border border-blue-300 dark:border-blue-700">
            <p class="font-semibold text-blue-800 dark:text-blue-200">
                Ya estás inscrito en esta oferta.
            </p>
            <p class="text-blue-700 dark:text-blue-300 mt-1">
                Estado actual:
                <strong class="capitalize">{{ $postulacion->estado }}</strong>
            </p>
        </div>
        @endif

        {{-- Botón o modal --}}
        @if(!$postulacion)
        <div x-data="postulacionModal()">

            <!-- Botón que abre el modal -->
            <button @click="open = true"
                class="bg-[#1F4E79] dark:bg-indigo-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-[#163a5c] dark:hover:bg-indigo-700">
                Inscribirme en esta oferta
            </button>

            <!-- Modal -->
            <div x-show="open"
                class="fixed inset-0 bg-black/50 flex items-center justify-center z-50"
                x-transition>
                <div class="bg-white dark:bg-gray-800 w-full max-w-lg p-8 rounded-xl shadow-xl border border-gray-200 dark:border-gray-700"
                    @click.away="open = false">

                    <h2 class="text-xl font-bold text-[#1F4E79] dark:text-indigo-300 mb-4">
                        Enviar postulación
                    </h2>

                    <form @submit.prevent="enviarPostulacion"
                        enctype="multipart/form-data"
                        class="space-y-6">

                        <div>
                            <label class="font-semibold dark:text-gray-200">Mensaje (opcional)</label>
                            <textarea x-model="mensaje" rows="4"
                                class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg"></textarea>
                        </div>

                        <div>
                            <label class="font-semibold dark:text-gray-200">CV personalizado (opcional)</label>
                            <input type="file" @change="cv = $event.target.files[0]"
                                class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg">
                        </div>

                        <div class="flex justify-end space-x-3">
                            <button type="button"
                                @click="open = false"
                                class="px-4 py-2 rounded-lg border dark:border-gray-600 dark:text-gray-200">
                                Cancelar
                            </button>

                            <button type="submit"
                                class="bg-[#1F4E79] dark:bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-[#163a5c] dark:hover:bg-indigo-700">
                                Enviar postulación
                            </button>
                        </div>
                    </form>

                </div>
            </div>

            <!-- Notificación flotante -->
            <div x-show="notificacion"
                x-transition
                class="fixed bottom-6 right-6 bg-green-600 text-white px-6 py-3 rounded-lg shadow-lg z-50">
                Postulación enviada correctamente
            </div>

        </div>
        @endif

    </div>

    {{-- Script del modal --}}
    <script>
        function postulacionModal() {
            return {
                open: false,
                mensaje: '',
                cv: null,
                notificacion: false,

                async enviarPostulacion() {
                    const formData = new FormData();
                    formData.append('mensaje', this.mensaje);
                    if (this.cv) formData.append('cv_personalizado', this.cv);

                    const url = "{{ route('candidato.postular', $oferta->id) }}";

                    const response = await fetch(url, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: formData
                    });

                    this.open = false;
                    this.mensaje = '';
                    this.cv = null;

                    this.notificacion = true;

                    setTimeout(() => {
                        this.notificacion = false;
                    }, 3000);
                }
            }
        }
    </script>

</x-layouts.dashboard>