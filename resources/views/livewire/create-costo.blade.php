<div id="form-create">
    <x-jet-form-section :submit="$action" class="mb-4">
        <x-slot name="title">
            {{ __('') }}
        </x-slot>

        <x-slot name="description">

        @if ($action == "createCosto")
            <div class="table-responsive">
                <table class="table table-bordered table-md">
                    <tbody>
                        <tr>
                            <th colspan="4" class="text-center">%RENDIMIENTO</th>
                        </tr>
                        <tr>
                            <th>#</th>
                            <th>MATERIA</th>
                            <th>KG</th>
                            <th>%</th>        
                        </tr>
                        <tr>
                        @if ($producciones)
                            <td>1</td>
                            <td>Grano de Soya</td>
                            <td>{{$producciones->secado}}</td>
                            <td>100%</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Agua</td>
                            <td>{{$producciones->agua2}}</td>
                            <td>{{$producciones->aguaP2}}%</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Aceite</td>
                            <td>{{$producciones->aceite}}</td>
                            <td>{{$producciones->aceiteP}}%</td>            
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Solvente</td>
                            <td>{{$producciones->harina}}</td>
                            <td>{{$producciones->solventeP}}%</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        @endif

            <div class="card-body">
            @if ($action == "createCosto")
            {{ __('Complete los siguientes datos en el formulario para agregar un nuevo costo de la producción. Los precios estan calculados en Bolivianos 00/100') }} 
            @endif
            

            @if($action == "updateProduccion")
            {{ __('Complete los siguientes datos para editar la producción que seleccionó. Nota: lea correctamente los campos y verifique  si están escritos de
                manera adecuada dentro del formulario.') }} 
            
            @endif
            </div>

        <div class="d-flex justify-content-center align-items-center pt-3">
            <x-jet-action-message class="mr-3" on="saved">
                    {{ __($button['submit_response']) }}
                </x-jet-action-message>
            <x-jet-button>
                    {{ __($button['submit_text']) }}
            </x-jet-button>
        </div>
       

        </x-slot>
        

        <x-slot name="form">
            <div class=" grid grid-cols-1 gap-4 sm:grid-cols-4">
                
                <!--PRODUCCION ID-->
                <div class="">
                    <x-jet-label for="produccion.lote" value="{{ __('N° LOTE') }}" />
                    
                    <select wire:model="selectedId" tabindex="-1" class="form-control " wire:change="$emit('calcular')"  required>
                        <option selected >Seleccione Lote</option>
                        @foreach ( $produccions as $produccion )    
                        <option  value="{{$produccion->id}}" data-index="0">{{$produccion->lote}}</option>
                        @endforeach 
                    </select>    
                </div>
                <!--En este codigo podemos capturar dependiendo del id seleccionado desde el select-->
                @if ($producciones)
                <div class="">
                    <x-jet-label for="bolsas" value="{{ __('Cargado') }}" />
                    <x-jet-input id="bolsas" type="text" class="mt-1 block w-full form-control shadow-none" disabled value=" " />
                </div>
                <div class="">
                    <x-jet-label for="bolsas" value="{{ __('Fecha') }}" />
                    <x-jet-input id="bolsas" type="text" class="mt-1 block w-full form-control shadow-none" disabled value="{{ $producciones->fecha}}" />
                </div>
                <div class="">
                    <x-jet-label for="bolsas" value="{{ __('merma') }}" />
                    <x-jet-input id="bolsas" type="text" class="mt-1 block w-full form-control shadow-none" disabled value="{{ $producciones->merma}}" />
                    
                </div>
                @endif
            </div>

            <div class=" grid grid-cols-1 gap-4 sm:grid-cols-3 pt-2">
                <!--GRANO DE SOYA-->
                <div class="">
                    <x-jet-label for="soya" value="{{ __('Soya en Grano') }}" />
                    <x-jet-input id="soya" type="number" class="mt-1 block w- form-control shadow-none" placeholder="Cantidad Kg"  wire:model="soya" wire:model.defer="costo.soya" required />
                    @if($action == "updateCosto")
                    <small>Edite la cantidad de grano de soya</small>
                    <x-jet-input id="soya" type="text" class="mt-1 block w- form-control shadow-none"  wire:model.defer="costo.soya" />
                    @endif
                    <x-jet-input-error for="costo.soya" class="mt-2" />
                </div>

                 <!--COSTO PREDETERMINADO DE GRANO SOYA-->
                <div class="">
                    <x-jet-label for="precioSoya" value="{{ __('Precio') }}" />
                    @if($action == "updateCosto")
                    <x-jet-input id="precioSoya" type="text" class="mt-1 block w-full form-control shadow-none" wire:change="$emit('calcular')"  wire:model.defer="costo.precioSoya" />
                    @endif
                    <x-jet-input id="precioSoya" class="mt-1 block w-full form-control shadow-none" type="text" wire:model="precioSoya" wire:change="$emit('calcular')" wire:model.defer="costo.precioSoya" required/>
                    <x-jet-input-error for="costo.precioSoya" class="mt-2" />
                </div>

                <!--COSTO TOTAL DE GRANO SOYA-->
                <div class="">
                    <x-jet-label for="costoSoya" value="{{ __('Costo Bs.') }}" />
                    @if($action == "updateCosto")
                    <x-jet-input id="costoSoya" type="text" class="mt-1 block w-full form-control shadow-none" wire:change="$emit('calcular')"  wire:model.defer="costo.costoSoya" />
                    @endif
                    <x-jet-input id="costoSoya" class="mt-1 block w-full form-control shadow-none" type="text" wire:model="costoSoya" wire:change="$emit('calcular')" wire:model.defer="costo.costoSoya" required/>
                    <x-jet-input-error for="costo.costoSoya" class="mt-2" />
                </div>
            </div>

            <div class=" grid grid-cols-1 gap-4 sm:grid-cols-3 pt-2">
                <!--GAS LICUADO-->
                <div class="">
                    <x-jet-label for="gasLicuado" value="{{ __('Gas Licuado') }}" />
                    <x-jet-input id="gasLicuado" type="number" class="mt-1 block w- form-control shadow-none" placeholder="Cantidad Kg"  wire:model="gasLicuado" wire:model.defer="costo.gasLicuado" required />
                    @if($action == "updateCosto")
                    <small>Edite la cantidad de grano de soya</small>
                    <x-jet-input id="gasLicuado" type="text" class="mt-1 block w- form-control shadow-none"  wire:model.defer="costo.gasLicuado" />
                    @endif
                    <x-jet-input-error for="costo.gasLicuado" class="mt-2" />
                </div>

                 <!--COSTO PREDETERMINADO-->
                <div class="">
                    <x-jet-label for="precioGasLicuado" value="{{ __('Precio ') }}" />
                    @if($action == "updateCosto")
                    <small>Edite la cantidad de precioGasLicuado en %</small>
                    <x-jet-input id="precioGasLicuado" type="text" class="mt-1 block w-full form-control shadow-none" wire:change="$emit('calcular')"  wire:model.defer="costo.precioGasLicuado" />
                    @endif
                    <x-jet-input id="precioGasLicuado" class="mt-1 block w-full form-control shadow-none" type="text" wire:model="precioGasLicuado" wire:change="$emit('calcular')" wire:model.defer="costo.precioGasLicuado" required/>
                    <x-jet-input-error for="costo.precioGasLicuado" class="mt-2" />
                </div>

                <!--Costo Bs.-->
                <div class="">
                    <x-jet-label for="costoGasLicuado" value="{{ __('Costo Bs.') }}" />
                    @if($action == "updateCosto")
                    <small>Edite la cantidad de costoGasLicuado en %</small>
                    <x-jet-input id="costoGasLicuado" type="text" class="mt-1 block w-full form-control shadow-none" wire:change="$emit('calcular')"  wire:model.defer="costo.costoGasLicuado" />
                    @endif
                    <x-jet-input id="costoGasLicuado" class="mt-1 block w-full form-control shadow-none" type="text" wire:model="costoGasLicuado" wire:change="$emit('calcular')" wire:model.defer="costo.costoGasLicuado" required/>
                    <x-jet-input-error for="costo.costoGasLicuado" class="mt-2" />
                </div>
            </div>

            <div class=" grid grid-cols-1 gap-4 sm:grid-cols-3 pt-2">
                <!--ELECTRICIDAD-->
                <div class="">
                    <x-jet-label for="electricidad" value="{{ __('Electricidad') }}" />
                    <x-jet-input id="electricidad" type="number" class="mt-1 block w- form-control shadow-none" placeholder="Cantidad Kwh"  wire:model="electricidad" wire:model.defer="costo.electricidad" required />
                    @if($action == "updateCosto")
                    <small>Edite la cantidad de grano de soya</small>
                    <x-jet-input id="electricidad" type="text" class="mt-1 block w- form-control shadow-none"  wire:model.defer="costo.electricidad" />
                    @endif
                    <x-jet-input-error for="costo.electricidad" class="mt-2" />
                </div>

                 <!--COSTO PREDETERMINADO-->
                <div class="">
                    <x-jet-label for="precioElectricidad" value="{{ __('Precio ') }}" />
                    @if($action == "updateCosto")
                    <small>Edite la cantidad de precioElectricidad en %</small>
                    <x-jet-input id="precioElectricidad" type="text" class="mt-1 block w-full form-control shadow-none" wire:change="$emit('calcular')"  wire:model.defer="costo.precioElectricidad" />
                    @endif
                    <x-jet-input id="precioElectricidad" class="mt-1 block w-full form-control shadow-none" type="text" wire:model="precioElectricidad" wire:change="$emit('calcular')" wire:model.defer="costo.precioElectricidad" required/>
                    <x-jet-input-error for="costo.precioElectricidad" class="mt-2" />
                </div>

                <!--Costo Bs.-->
                <div class="">
                    <x-jet-label for="costoElectricidad" value="{{ __('Costo Bs.') }}" />
                    @if($action == "updateCosto")
                    <small>Edite la cantidad de costoElectricidad en %</small>
                    <x-jet-input id="costoElectricidad" type="text" class="mt-1 block w-full form-control shadow-none" wire:change="$emit('calcular')"  wire:model.defer="costo.costoElectricidad" />
                    @endif
                    <x-jet-input id="costoElectricidad" class="mt-1 block w-full form-control shadow-none" type="text" wire:model="costoElectricidad" wire:change="$emit('calcular')" wire:model.defer="costo.costoElectricidad" required/>
                    <x-jet-input-error for="costo.costoElectricidad" class="mt-2" />
                </div>
            </div>

            <div class=" grid grid-cols-1 gap-4 sm:grid-cols-3 pt-2">
                <!--TOTAL-->
                <div class="">
                    <x-jet-label for="total" value="{{ __('TOTAL') }}" />
                    <x-jet-input id="total" type="number" class="mt-1 block w- form-control shadow-none"   wire:model="total" wire:model.defer="costo.total" required />
                    @if($action == "updateCosto")
                    <small>Edite la cantidad de grano de soya</small>
                    <x-jet-input id="total" type="text" class="mt-1 block w- form-control shadow-none"  wire:model.defer="costo.total" />
                    @endif
                    <x-jet-input-error for="costo.total" class="mt-2" />
                </div>
                
            </div>

            <div class=" grid grid-cols-1 gap-4 sm:grid-cols-3 pt-2">
                <!--ELECTRICIDAD2-->
                <div class="">
                    <x-jet-label for="electricidad2" value="{{ __('Electricidad') }}" />
                    <x-jet-input id="electricidad2" type="number" class="mt-1 block w- form-control shadow-none" placeholder="Cantidad Kwh"  wire:model="electricidad2" wire:model.defer="costo.electricidad2" required />
                    @if($action == "updateCosto")
                    <small>Edite la cantidad de grano de soya</small>
                    <x-jet-input id="electricidad2" type="text" class="mt-1 block w- form-control shadow-none"  wire:model.defer="costo.electricidad2" />
                    @endif
                    <x-jet-input-error for="costo.electricidad2" class="mt-2" />
                </div>

                 <!--COSTO PREDETERMINADO-->
                <div class="">
                    <x-jet-label for="precioElectricidad2" value="{{ __('Precio ') }}" />
                    @if($action == "updateCosto")
                    <small>Edite la cantidad de precioElectricidad2 en %</small>
                    <x-jet-input id="precioElectricidad2" type="text" class="mt-1 block w-full form-control shadow-none" wire:change="$emit('calcular')"  wire:model.defer="costo.precioElectricidad2" />
                    @endif
                    <x-jet-input id="precioElectricidad2" class="mt-1 block w-full form-control shadow-none" type="text" wire:model="precioElectricidad2" wire:change="$emit('calcular')" wire:model.defer="costo.precioElectricidad2" required/>
                    <x-jet-input-error for="costo.precioElectricidad2" class="mt-2" />
                </div>

                <!--Costo Bs.-->
                <div class="">
                    <x-jet-label for="costoElectricidad2" value="{{ __('Costo Bs.') }}" />
                    @if($action == "updateCosto")
                    <small>Edite la cantidad de costoElectricidad2 en %</small>
                    <x-jet-input id="costoElectricidad2" type="text" class="mt-1 block w-full form-control shadow-none" wire:change="$emit('calcular')"  wire:model.defer="costo.costoElectricidad2" />
                    @endif
                    <x-jet-input id="costoElectricidad2" class="mt-1 block w-full form-control shadow-none" type="text" wire:model="costoElectricidad2" wire:change="$emit('calcular')" wire:model.defer="costo.costoElectricidad2" required/>
                    <x-jet-input-error for="costo.costoElectricidad2" class="mt-2" />
                </div>
            </div>

            <div class=" grid grid-cols-1 gap-4 sm:grid-cols-3 pt-2">
                <!--BOLSAS-->
                <div class="">
                    <x-jet-label for="bolsas" value="{{ __('Bolsas') }}" />
                    <x-jet-input id="bolsas" type="number" class="mt-1 block w- form-control shadow-none" placeholder="Unidades"  wire:model="bolsas" wire:model.defer="costo.bolsas" required />
                    @if($action == "updateCosto")
                    <small>Edite la cantidad de grano de soya</small>
                    <x-jet-input id="bolsas" type="text" class="mt-1 block w- form-control shadow-none"  wire:model.defer="costo.bolsas" />
                    @endif
                    <x-jet-input-error for="costo.bolsas" class="mt-2" />
                </div>

                 <!--COSTO PREDETERMINADO-->
                <div class="">
                    <x-jet-label for="precioBolsas" value="{{ __('Precio ') }}" />
                    @if($action == "updateCosto")
                    <small>Edite la cantidad de precioBolsas en %</small>
                    <x-jet-input id="precioBolsas" type="text" class="mt-1 block w-full form-control shadow-none" wire:change="$emit('calcular')"  wire:model.defer="costo.precioBolsas" />
                    @endif
                    <x-jet-input id="precioBolsas" class="mt-1 block w-full form-control shadow-none" type="text" wire:model="precioBolsas" wire:change="$emit('calcular')" wire:model.defer="costo.precioBolsas" required/>
                    <x-jet-input-error for="costo.precioBolsas" class="mt-2" />
                </div>

                <!--Costo Bs.-->
                <div class="">
                    <x-jet-label for="costoBolsas" value="{{ __('Costo Bs.') }}" />
                    @if($action == "updateCosto")
                    <small>Edite la cantidad de costoBolsas en %</small>
                    <x-jet-input id="costoBolsas" type="text" class="mt-1 block w-full form-control shadow-none" wire:change="$emit('calcular')"  wire:model.defer="costo.costoBolsas" />
                    @endif
                    <x-jet-input id="costoBolsas" class="mt-1 block w-full form-control shadow-none" type="text" wire:model="costoBolsas" wire:change="$emit('calcular')" wire:model.defer="costo.costoBolsas" required/>
                    <x-jet-input-error for="costo.costoBolsas" class="mt-2" />
                </div>
            </div>

            <div class=" grid grid-cols-1 gap-4 sm:grid-cols-3 pt-2">
                <!--TOTAL COSTO -->
                <div class="">
                    <x-jet-label for="costo_total" value="{{ __('TOTAL COSTO') }}" />
                    @if($action == "updateCosto")
                    <small>Edite la cantidad de costo_total en %</small>
                    <x-jet-input id="costo_total" type="text" class="mt-1 block w-full form-control shadow-none" wire:change="$emit('calcular')"  wire:model.defer="costo.costo_total" />
                    @endif
                    <x-jet-input id="costo_total" class="mt-1 block w-full form-control shadow-none" type="text" wire:model="costo_total" wire:change="$emit('calcular')" wire:model.defer="costo.costo_total" required/>
                    <x-jet-input-error for="costo.costo_total" class="mt-2" />
                </div>

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
