<div id="form-create">
    <x-jet-form-section :submit="$action" class="mb-4">
        <x-slot name="title">  
        {{ __('') }}  
        </x-slot>

        <x-slot name="description">       
        {{ __('') }}   
        </x-slot>


        <x-slot name="form">
            <div class=" grid grid-cols-1 gap-4 sm:grid-cols-3">
                <!--LOTE-->
                <div class="">
                    <x-jet-label for="lote" value="{{ __('Lote') }}" />
                    <x-jet-input id="lote" type="number" class="mt-1 block w- form-control shadow-none"  wire:model.defer="produccion.lote" required />
                    <x-jet-input-error for="produccion.lote" class="mt-2" />
                </div>

                <!--FECHA-->
                <div class="">
                    <x-jet-label for="fecha" value="{{ __('Fecha') }}" />
                    <input type="date" name="fecha" class="form-control" value="{{ now()->format('Y-m-d') }}"  wire:model.defer="produccion.fecha" required>

                </div>

                <!--TURNO-->
                <div class="">
                                 
                </div>
            </div>

            <!----Img de proceso--->
            <div class=" grid grid-cols-1 gap-4">
                <img class="d-inline-block"   src="{{URL::asset('img/pproduccion.jpg')}}" alt="">
            </div>
            
    
        </x-slot>
       

        <x-slot name="actions">
            <div class="flex pb-4 ">
                
            </div>
        </x-slot>
    </x-jet-form-section>

    <x-notify-message on="saved" type="success" :message="__($button['submit_response_notyf'])" />
</div>
