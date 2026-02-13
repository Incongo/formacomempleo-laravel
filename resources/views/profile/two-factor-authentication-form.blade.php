<x-action-section>
    <x-slot name="title">
        {{ __('Autenticación en dos pasos') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Añade una capa adicional de seguridad a tu cuenta utilizando la autenticación en dos pasos.') }}
    </x-slot>

    <x-slot name="content">
        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            @if ($this->enabled)
            @if ($showingConfirmation)
            {{ __('Finaliza la activación de la autenticación en dos pasos.') }}
            @else
            {{ __('Has activado la autenticación en dos pasos.') }}
            @endif
            @else
            {{ __('No has activado la autenticación en dos pasos.') }}
            @endif
        </h3>

        <div class="mt-3 max-w-xl text-sm text-gray-600 dark:text-gray-300">
            <p>
                {{ __('Cuando la autenticación en dos pasos está activada, se te pedirá un código seguro y aleatorio durante el inicio de sesión. Puedes obtener este código desde la aplicación Google Authenticator de tu móvil.') }}
            </p>
        </div>

        @if ($this->enabled)
        @if ($showingQrCode)
        <div class="mt-4 max-w-xl text-sm text-gray-600 dark:text-gray-300">
            <p class="font-semibold">
                @if ($showingConfirmation)
                {{ __('Para finalizar la activación, escanea el siguiente código QR con tu aplicación autenticadora o introduce la clave de configuración y proporciona el código OTP generado.') }}
                @else
                {{ __('La autenticación en dos pasos está activada. Escanea el siguiente código QR con tu aplicación autenticadora o introduce la clave de configuración.') }}
                @endif
            </p>
        </div>

        <div class="mt-4 p-2 inline-block bg-white dark:bg-gray-800 rounded">
            {!! $this->user->twoFactorQrCodeSvg() !!}
        </div>

        <div class="mt-4 max-w-xl text-sm text-gray-600 dark:text-gray-300">
            <p class="font-semibold">
                {{ __('Clave de configuración') }}: {{ decrypt($this->user->two_factor_secret) }}
            </p>
        </div>

        @if ($showingConfirmation)
        <div class="mt-4">
            <x-label for="code" value="{{ __('Código') }}" class="dark:text-gray-200" />

            <x-input id="code" type="text" name="code"
                class="block mt-1 w-1/2 dark:bg-gray-800 dark:text-gray-200 dark:border-gray-600"
                inputmode="numeric" autofocus autocomplete="one-time-code"
                wire:model="code"
                wire:keydown.enter="confirmTwoFactorAuthentication" />

            <x-input-error for="code" class="mt-2" />
        </div>
        @endif
        @endif

        @if ($showingRecoveryCodes)
        <div class="mt-4 max-w-xl text-sm text-gray-600 dark:text-gray-300">
            <p class="font-semibold">
                {{ __('Guarda estos códigos de recuperación en un gestor de contraseñas seguro. Puedes usarlos para recuperar el acceso a tu cuenta si pierdes tu dispositivo de autenticación.') }}
            </p>
        </div>

        <div class="grid gap-1 max-w-xl mt-4 px-4 py-4 font-mono text-sm bg-gray-100 dark:bg-gray-800 rounded-lg text-gray-800 dark:text-gray-200">
            @foreach (json_decode(decrypt($this->user->two_factor_recovery_codes), true) as $code)
            <div>{{ $code }}</div>
            @endforeach
        </div>
        @endif
        @endif

        <div class="mt-5">
            @if (! $this->enabled)
            <x-confirms-password wire:then="enableTwoFactorAuthentication">
                <x-button type="button" wire:loading.attr="disabled">
                    {{ __('Activar') }}
                </x-button>
            </x-confirms-password>
            @else
            @if ($showingRecoveryCodes)
            <x-confirms-password wire:then="regenerateRecoveryCodes">
                <x-secondary-button class="me-3">
                    {{ __('Regenerar códigos de recuperación') }}
                </x-secondary-button>
            </x-confirms-password>
            @elseif ($showingConfirmation)
            <x-confirms-password wire:then="confirmTwoFactorAuthentication">
                <x-button type="button" class="me-3" wire:loading.attr="disabled">
                    {{ __('Confirmar') }}
                </x-button>
            </x-confirms-password>
            @else
            <x-confirms-password wire:then="showRecoveryCodes">
                <x-secondary-button class="me-3">
                    {{ __('Mostrar códigos de recuperación') }}
                </x-secondary-button>
            </x-confirms-password>
            @endif

            @if ($showingConfirmation)
            <x-confirms-password wire:then="disableTwoFactorAuthentication">
                <x-secondary-button wire:loading.attr="disabled">
                    {{ __('Cancelar') }}
                </x-secondary-button>
            </x-confirms-password>
            @else
            <x-confirms-password wire:then="disableTwoFactorAuthentication">
                <x-danger-button wire:loading.attr="disabled">
                    {{ __('Desactivar') }}
                </x-danger-button>
            </x-confirms-password>
            @endif

            @endif
        </div>
    </x-slot>
</x-action-section>