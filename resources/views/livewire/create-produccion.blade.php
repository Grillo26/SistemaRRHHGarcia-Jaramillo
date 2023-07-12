<div id="form-create">
    <x-jet-form-section :submit="$action" class="mb-4">
        <x-slot name="title">
            {{ __('Producción') }}

        </x-slot>

        <x-slot name="description">
            @if ($action == "createProduccion")
            {{ __('Complete los siguientes datos para registrar una nueva producción. Nota: lea correctamente los campos y verifique si están escritos de
                manera adecuada dentro del formulario. El formato de los campos con decimales es de X.XXX Tres decimales.') }} 
            
            @endif

            @if($action == "updateProduccion")
            {{ __('Complete los siguientes datos para editar la producción que seleccionó. Nota: lea correctamente los campos y verifique  si están escritos de
                manera adecuada dentro del formulario.') }} 
            
            @endif

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
                            <td>1</td>
                            <td>Soya</td>
                            <td>{{$granoDeSoya}}</td>
                            <td>100%</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Merma</td>
                            <td>{{$merma}}</td>
                            <td>{{$mermaP}}%</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Agua</td>
                            <td>{{$agua}}</td>
                            <td>{{$aguaP}}%</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Soya Final</td>
                            <td>{{$secado}}</td>
                            <td>{{$secadoP}}%</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </x-slot>

        
        <x-slot name="form">
             <div class=" grid grid-cols-1 gap-4 sm:grid-cols-3">
                <!--LOTE-->
                <div class="">
                    <x-jet-label for="lote" value="{{ __('Lote') }}" />
                    @if($action == "updateProduccion")
                    <small>Edite el número del lote</small>
                    @endif
                    @if($action == "createProduccion")
                    <small>Ingrese número del lote</small>
                    @endif
                    <x-jet-input id="lote" type="text" class="mt-1 block w- form-control shadow-none"  wire:model.defer="produccion.lote" />
                    <x-jet-input-error for="produccion.lote" class="mt-2" />
                </div>

                <!--FECHA-->
                <div class="">
                    <x-jet-label for="fecha" value="{{ __('Fecha') }}" />
                    @if($action == "updateProduccion")
                    <small>Edite la fecha</small>
                    @endif
                    @if($action == "createProduccion")
                    <small>Seleccione la fecha</small>
                    @endif
                    <input type="date" name="fecha" class="form-control" value="{{ now()->format('Y-m-d') }}"  wire:model.defer="produccion.fecha">

                </div>

                <!--TURNO-->
                <div class="">
                    <x-jet-label for="turno" value="{{ __('Turno') }}" />
                    @if($action == "updateProduccion")
                    <small>Edite el turno</small>
                    @endif
                    @if($action == "createProduccion")
                    <small>Seleccione el turno</small>
                    @endif
                    <select wire:model.defer="produccion.idTurno" tabindex="-1" class="form-control ">
                        <option selected >Seleccione el turno</option>
                        @foreach ( $turnos as $turno )    
                        <option  value="{{$turno->id}}" data-index="0">{{$turno->nombreTurno}}</option>
                        @endforeach 
                    </select>               
                </div>
            </div>

            <!----Img de proceso--->
            <div class=" grid grid-cols-1 gap-4">
                <img class="d-inline-block"   src="{{URL::asset('img/pproduccion.jpg')}}" alt="">
            </div>

            <div class=" grid grid-cols-1 gap-4 sm:grid-cols-4 pt-3">
                <!--GRANO DE SOYA-->
                <div class="">
                    <x-jet-label for="granoDeSoya" value="{{ __('Grano de Soya') }}" />
                    @if($action == "updateProduccion")
                    <small>Edite la cantidad de grano de soya</small>
                    @endif
                    @if($action == "createProduccion")
                    <small>Ingrese cantidad de grano de soya</small>
                    @endif
                    <x-jet-input id="granoDeSoya" type="text" class="mt-1 block w- form-control shadow-none"   wire:model="granoDeSoya" wire:model.defer="produccion.granoDeSoya" />
                    <x-jet-input-error for="produccion.granoDeSoya" class="mt-2" />
                </div>

                 <!--HUMEDAD-->
                 <div class="">
                    <x-jet-label for="humedad" value="{{ __('Humedad') }}" />
                    @if($action == "updateProduccion")
                    <small>Edite la cantidad de humedad en %</small>
                    @endif
                    @if($action == "createProduccion")
                    <small>Ingrese cantidad de humedad en %</small>
                    @endif
                    <!--x-jet-input id="humedad" type="text" class="mt-1 block w-full form-control shadow-none"  wire:model.defer="produccion.humedad" />-->
                    <x-jet-input id="humedad" class="mt-1 block w-full form-control shadow-none" type="text" wire:model="humedad" wire:change="$emit('calcular')" wire:model.defer="produccion.humedad"/>
                    <x-jet-input-error for="produccion.humedad" class="mt-2" />
                </div>

                <!--GRASAS-->
                <div class="">
                    <x-jet-label for="grasas" value="{{ __('Grasa') }}" />
                    @if($action == "updateProduccion")
                    <small>Edite la cantida de grasa</small>
                    @endif
                    @if($action == "createProduccion")
                    <small>Ingrese la cantidad de grasas</small>
                    @endif

                    <!--x-jet-input id="grasas" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="produccion.grasas" />-->
                    <x-jet-input id="grasas" type="text" class="mt-1 block w-full form-control shadow-none" wire:model="grasa" wire:change="$emit('calcular')" wire:model.defer="produccion.grasas"/>
                    <x-jet-input-error for="produccion.grasas" class="mt-2" />

                </div>

                <!--%MERMA SECA-->
                <div class="">
                    <x-jet-label for="grasas" value="{{ __('% Merma Seca') }}" />          
                    <small>Edite la cantida de grasa</small>
                    <!--x-jet-input id="grasas" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="produccion.grasas" />-->
                    <x-jet-input id="mermaSeca" type="text" class="mt-1 block w-full form-control shadow-none" disabled wire:model="resultado" />
                    <x-jet-input-error for="produccion.mermaSeca" class="mt-2" />

                </div>
                
            </div>

            <div class=" grid grid-cols-1 gap-4 sm:grid-cols-2 pt-1">
                <!--MERMA-->
                <div class="">
                    <x-jet-label for="merma" value="{{ __('Merma') }}" />
                    @if($action == "updateProduccion")
                    <small>Edite la cantidad de merma</small>
                    @endif
                    @if($action == "createProduccion")
                    <small>Ingrese cantidad de merma</small>
                    @endif
                    <x-jet-input id="merma" type="text" class="mt-1 block w-full form-control shadow-none"  wire:model="merma" wire:change="$emit('calcular')" wire:model.defer="produccion.merma" />
                    <x-jet-input-error for="produccion.merma" class="mt-2" />
                </div>

                <!--AGUA-->
                <div class="">
                    <x-jet-label for="agua" value="{{ __('Agua') }}" />
                    <small>Agua extraida expresada en</small>
                    <x-jet-input id="agua" type="text" class="mt-1 block w-full form-control shadow-none" disabled wire:model="agua" wire:model.defer="produccion.agua"/>
                    <x-jet-input-error for="produccion.agua" class="mt-2" />
                </div>
            </div>

            <div class="border mt-4 p-3 rounded-lg">
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-4">
                    
                    <!--HUMEDAD DE LABORATORIO-->
                    <div class="">
                        <x-jet-label for="humedad" value="{{ __('Humedad') }}" />
                        @if($action == "updateProduccion")
                        <small>Edite la cantidad de aceite</small>
                        @endif
                        @if($action == "createProduccion")
                        <small>Ingrese cantidad de humedad obtenido de Laboratorio</small>
                        @endif
                        <!--x-jet-input id="humedad" type="text" class="mt-1 block w-full form-control shadow-none"  wire:model.defer="produccion.humedadLab" />-->
                        <x-jet-input id="humedadLab" class="mt-1 block w-full form-control shadow-none" type="text" wire:model="humedadLab" wire:change="$emit('calcular')" wire:model.defer="produccion.humedadLab"/>
                        <x-jet-input-error for="produccion.humedadLab" class="mt-2" />
                    </div> 

                    <!--GRASA DE LABORATORIO-->
                    <div class="">
                        <x-jet-label for="grasa" value="{{ __('Grasa') }}" />
                        @if($action == "updateProduccion")
                        <small>Edite la cantidad de Kwh</small>
                        @endif
                        @if($action == "createProduccion")
                        <small>Ingrese cantidad de grasa obtenida del Laboratorio</small>
                        @endif
                        <!--x-jet-input id="grasa" type="text" class="mt-1 block w-full form-control shadow-none"  wire:model.defer="produccion.grasaLab" />-->
                        <x-jet-input id="grasaLab" type="text" class="mt-1 block w-full form-control shadow-none" wire:model="grasaLab" wire:change="$emit('calcular')" wire:model.defer="produccion.grasaLab"/>
                        <x-jet-input-error for="produccion.grasaLab" class="mt-2" />
                    </div>

                    <!--%MERMA SECA EN SECADO-->
                    <div class="">
                        <x-jet-label for="mermaSecado" value="{{ __('% Merma Seca') }}" />          
                        <small>Total de merma seca en porcentaje extraída de la maquina de </small>
                        <!--x-jet-input id="grasas" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="produccion.grasas" />-->
                        <x-jet-input id="mermaSecado" type="text" class="mt-1 block w-full form-control shadow-none" disabled wire:model="mermaSecado" />
                        <x-jet-input-error for="produccion.mermaSeca" class="mt-2" />

                    </div>

                    <!--SECADO-->
                    <div class="">
                        <x-jet-label for="secado" value="{{ __('Secado') }}" />          
                        <small>Valor total del proceso de secado expresado en </small>
                        <!--x-jet-input id="grasas" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="produccion.grasas" />-->
                        <x-jet-input id="secado" type="text" class="mt-1 block w-full form-control shadow-none" disabled wire:model="secado" wire:model.defer="produccion.secado"/>
                        <x-jet-input-error for="produccion.secado" class="mt-2" />

                    </div>

                </div>
            </div>

            <div class=" grid grid-cols-1 gap-4 sm:grid-cols-3 pt-3">
                <!--BOLSAS-->
                <div class="">
                    <x-jet-label for="bolsas" value="{{ __('Bolsas') }}" />
                    @if($action == "updateProduccion")
                    <small>Edite la cantidad de bolsas</small>
                    @endif
                    @if($action == "createProduccion")
                    <small>Ingrese cantidad de bolsas</small>
                    @endif
                    <x-jet-input id="bolsas" type="text" class="mt-1 block w-full form-control shadow-none"  wire:model.defer="produccion.bolsas"/>
                    <x-jet-input-error for="produccion.bolsas" class="mt-2" />
                </div>

                <!--ACEITE-->
                <div class="">
                    <x-jet-label for="aceite" value="{{ __('Aceite') }}" />
                    @if($action == "updateProduccion")
                    <small>Edite la cantidad de aceite</small>
                    @endif
                    @if($action == "createProduccion")
                    <small>Ingrese cantidad de aceite</small>
                    @endif
                    <x-jet-input id="aceite" type="text" class="mt-1 block w-full form-control shadow-none"  wire:model.defer="produccion.aceite" />
                    <x-jet-input-error for="produccion.aceite" class="mt-2" />
                </div> 

                 <!--LUZ-->
                 <div class="">
                    <x-jet-label for="luz" value="{{ __('Luz') }}" />
                    @if($action == "updateProduccion")
                    <small>Edite la cantidad de Kwh</small>
                    @endif
                    @if($action == "createProduccion")
                    <small>Ingrese cantidad de Kwh</small>
                    @endif
                    <x-jet-input id="luz" type="text" class="mt-1 block w-full form-control shadow-none"  wire:model.defer="produccion.luz" />
                    <x-jet-input-error for="produccion.luz" class="mt-2" />
                </div>
            </div>

            <div class=" grid grid-cols-1 gap-4 sm:grid-cols-2 pt-1">
                
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
