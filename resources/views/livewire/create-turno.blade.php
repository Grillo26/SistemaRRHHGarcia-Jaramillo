<div id="form-create">
    <x-jet-form-section :submit="$action" class="mb-4">
        <x-slot name="title">
            {{ __('Turnos') }}

        </x-slot>

        <x-slot name="description">
            {{ __('Complete los siguientes datos y presione "Submit" para crear nuevos turnos') }} 
        </x-slot>


        <x-slot name="form">
        
            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="nombreTurno" value="{{ __('Nombre Turno') }}" />
                <small>Nombre de Turno</small>
                <x-jet-input id="nombreTurno" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="turno.nombreTurno" />
                <x-jet-input-error for="turno.nombreTurno" class="mt-2" />
            </div>

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="descripcion" value="{{ __('Descripcion de Turno') }}" />
                <small>Descripción de Turno</small>
                <x-jet-input id="descripcion" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="turno.descripcion" />
                <x-jet-input-error for="turno.descripcion" class="mt-2" />
            </div>
           
        
        
        </x-slot>

        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="saved">
                {{ __($button['submit_response']) }}
            </x-jet-action-message>

            <x-jet-button>
                {{ __($button['submit_text']) }}
            </x-jet-button>
        </x-slot>
    </x-jet-form-section>

    <x-notify-message on="saved" type="success" :message="__($button['submit_response_notyf'])" />
</div>
