<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-[#1F4E79]">
            {{ $oferta->titulo }}
        </h2>
        <p class="text-black/70 mt-1">{{ $oferta->empresa->nombre }}</p>
    </x-slot>

    @php
    $candidato = auth()->user()->candidato;
    $postulacion = $candidato
    ? $candidato->postulaciones()->where('oferta_id', $oferta->id)->first()
    : null;
    @endphp

    <div class="max-w-3xl mx-auto bg-white p-6 rounded-xl shadow-md space-y-6">

        {{-- Información de la oferta --}}
        <div class="space-y-2">
            <p class="text-gray-700 leading-relaxed">{{ $oferta->descripcion }}</p>

            <p><strong>Ubicación:</strong> {{ $oferta->ubicacion }}</p>
            <p><strong>Contrato:</strong> {{ $oferta->tipo_contrato }}</p>
            <p><strong>Modalidad:</strong> {{ $oferta->modalidad }}</p>
            <p><strong>Salario:</strong> {{ $oferta->salario }}</p>
        </div>

        {{-- Estado de la postulación --}}
        @if($postulacion)
        <div class="p-4 rounded-lg bg-blue-100 border border-blue-300">
            <p class="font-semibold text-blue-800">
                Ya estás inscrito en esta oferta.
            </p>
            <p class="text-blue-700 mt-1">
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
                class="bg-[#1F4E79] text-white px-6 py-3 rounded-lg font-semibold hover:bg-[#163a5c]">
                Inscribirme en esta oferta
            </button>

            <!-- Modal -->
            <div x-show="open"
                class="fixed inset-0 bg-black/50 flex items-center justify-center z-50"
                x-transition>
                <div class="bg-white w-full max-w-lg p-8 rounded-xl shadow-xl"
                    @click.away="open = false">

                    <h2 class="text-xl font-bold text-[#1F4E79] mb-4">
                        Enviar postulación
                    </h2>

                    <form @submit.prevent="enviarPostulacion"
                        enctype="multipart/form-data"
                        class="space-y-6">

                        <div>
                            <label class="font-semibold">Mensaje (opcional)</label>
                            <textarea x-model="mensaje" rows="4"
                                class="w-full border-gray-300 rounded-lg"></textarea>
                        </div>

                        <div>
                            <label class="font-semibold">CV personalizado (opcional)</label>
                            <input type="file" @change="cv = $event.target.files[0]"
                                class="w-full border-gray-300 rounded-lg">
                        </div>

                        <div class="flex justify-end space-x-3">
                            <button type="button"
                                @click="open = false"
                                class="px-4 py-2 rounded-lg border">
                                Cancelar
                            </button>

                            <button type="submit"
                                class="bg-[#1F4E79] text-white px-6 py-2 rounded-lg hover:bg-[#163a5c]">
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

                    // Cerrar modal
                    this.open = false;

                    // Limpiar formulario
                    this.mensaje = '';
                    this.cv = null;

                    // Mostrar notificación
                    this.notificacion = true;

                    // Ocultar notificación después de 3 segundos
                    setTimeout(() => {
                        this.notificacion = false;
                    }, 3000);
                }
            }
        }
    </script>

</x-app-layout>