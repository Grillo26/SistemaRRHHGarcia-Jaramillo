<div id="form-create">
    <x-jet-form-section :submit="$action" class="mb-4">
        <x-slot name="title">
            {{ __('') }}
        </x-slot>

        <x-slot name="description">



        </x-slot>
        

        <x-slot name="form">
            <div class=" grid grid-cols-1 gap-4 sm:grid-cols-3 pt-2">
                <!--COSTO GAS LICUADO-->
                <div class="">
                    <x-jet-label for="precioGasLicuado" value="{{ __('Gas Licuado (Bs)') }}" />
                    <x-jet-input id="precioGasLicuado" type="text" class="mt-1 block w- form-control shadow-none" wire:model.defer="costo.precioGasLicuado" required />
                    <x-jet-input-error for="costo.precioGasLicuado" class="mt-2" />
                </div>

                 <!--COSTO PERSONAL-->
                <div class="">
                    <x-jet-label for="precioPersonal" value="{{ __('Costo Personal (Bs)') }}" />
                    <x-jet-input id="precioPersonal" class="mt-1 block w-full form-control shadow-none" type="text" wire:model.defer="costo.precioPersonal"  required/>
                    <x-jet-input-error for="costo.precioPersonal" class="mt-2" />
                </div>

                <!--Costo ELECTRICIDAD-->
                <div class="">
                    <x-jet-label for="precioElectricidad" value="{{ __('Costo Electricidad (Bs)') }}" />
                    <x-jet-input id="precioElectricidad" class="mt-1 block w-full form-control shadow-none" type="text" wire:model.defer="costo.precioElectricidad"  required/>
                    <x-jet-input-error for="costo.precioElectricidad" class="mt-2" />
                </div>
            </div>

            <div class=" grid grid-cols-1 gap-4 sm:grid-cols-2 pt-2">
                <!--COSTO BOLSAS-->
                <div class="">
                    <x-jet-label for="precioBolsas" value="{{ __('Costo Bolsas (Bs)') }}" />
                    <x-jet-input id="precioBolsas" type="text" class="mt-1 block w- form-control shadow-none"  wire:model.defer="costo.precioBolsas" required />
                    <x-jet-input-error for="costo.precioBolsas" class="mt-2" />
                </div>

                 <!--COSTO ACEITE-->
                <div class="">
                    <x-jet-label for="precioAceite" value="{{ __('Costo Aceite (Bs)') }}" />
                    <x-jet-input id="precioAceite" class="mt-1 block w-full form-control shadow-none" type="text" wire:model.defer="costo.precioAceite"  required/>
                    <x-jet-input-error for="costo.precioAceite" class="mt-2" />
                </div>

            </div>
            <br>
            <x-jet-action-message class="mr-3" on="saved">
                    {{ __($button['submit_response']) }}
                </x-jet-action-message>
            <x-jet-button>
                    {{ __($button['submit_text']) }}
            </x-jet-button>
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
