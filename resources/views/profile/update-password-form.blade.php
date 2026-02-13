<x-form-section submit="updatePassword">
    <x-slot name="title">
        {{ __('Actualizar contraseña') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Asegúrate de que tu cuenta utiliza una contraseña larga y segura para mantener tu información protegida.') }}
    </x-slot>

    <x-slot name="form">
        {{-- Contraseña actual --}}
        <div class="col-span-6 sm:col-span-4">
            <x-label for="current_password" value="{{ __('Contraseña actual') }}" class="dark:text-gray-200" />
            <x-input id="current_password" type="password"
                class="mt-1 block w-full dark:bg-gray-800 dark:text-gray-200 dark:border-gray-600"
                wire:model="state.current_password"
                autocomplete="current-password" />
            <x-input-error for="current_password" class="mt-2" />
        </div>

        {{-- Nueva contraseña --}}
        <div class="col-span-6 sm:col-span-4">
            <x-label for="password" value="{{ __('Nueva contraseña') }}" class="dark:text-gray-200" />
            <x-input id="password" type="password"
                class="mt-1 block w-full dark:bg-gray-800 dark:text-gray-200 dark:border-gray-600"
                wire:model="state.password"
                autocomplete="new-password" />
            <x-input-error for="password" class="mt-2" />
        </div>

        {{-- Confirmación --}}
        <div class="col-span-6 sm:col-span-4">
            <x-label for="password_confirmation" value="{{ __('Confirmar contraseña') }}" class="dark:text-gray-200" />
            <x-input id="password_confirmation" type="password"
                class="mt-1 block w-full dark:bg-gray-800 dark:text-gray-200 dark:border-gray-600"
                wire:model="state.password_confirmation"
                autocomplete="new-password" />
            <x-input-error for="password_confirmation" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="me-3" on="saved">
            {{ __('Guardado.') }}
        </x-action-message>

        <x-button>
            {{ __('Guardar') }}
        </x-button>
    </x-slot>
</x-form-section>