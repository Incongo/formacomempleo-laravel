<x-action-section>
    <x-slot name="title">
        {{ __('Eliminar cuenta') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Elimina tu cuenta de forma permanente.') }}
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm text-gray-600 dark:text-gray-300">
            {{ __('Una vez que elimines tu cuenta, todos sus datos y recursos serán eliminados permanentemente. Antes de continuar, asegúrate de descargar cualquier información que desees conservar.') }}
        </div>

        <div class="mt-5">
            <x-danger-button wire:click="confirmUserDeletion" wire:loading.attr="disabled">
                {{ __('Eliminar cuenta') }}
            </x-danger-button>
        </div>

        <!-- Modal de confirmación para eliminar cuenta -->
        <x-dialog-modal wire:model.live="confirmingUserDeletion">
            <x-slot name="title">
                {{ __('Eliminar cuenta') }}
            </x-slot>

            <x-slot name="content">
                {{ __('¿Estás seguro de que deseas eliminar tu cuenta? Una vez eliminada, todos tus datos serán borrados permanentemente. Por favor, introduce tu contraseña para confirmar que deseas eliminar tu cuenta de forma definitiva.') }}

                <div class="mt-4"
                    x-data="{}"
                    x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                    <x-input type="password"
                        class="mt-1 block w-3/4 dark:bg-gray-800 dark:text-gray-200 dark:border-gray-600"
                        autocomplete="current-password"
                        placeholder="{{ __('Contraseña') }}"
                        x-ref="password"
                        wire:model="password"
                        wire:keydown.enter="deleteUser" />

                    <x-input-error for="password" class="mt-2" />
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="$toggle('confirmingUserDeletion')" wire:loading.attr="disabled">
                    {{ __('Cancelar') }}
                </x-secondary-button>

                <x-danger-button class="ms-3"
                    wire:click="deleteUser"
                    wire:loading.attr="disabled">
                    {{ __('Eliminar cuenta') }}
                </x-danger-button>
            </x-slot>
        </x-dialog-modal>
    </x-slot>
</x-action-section>