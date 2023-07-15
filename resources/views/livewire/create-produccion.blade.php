<div id="form-create">
    <x-jet-form-section :submit="$action" class="mb-4">
        <x-slot name="title">
            {{ __('Añadir Nueva Producción') }}

        </x-slot>

        <x-slot name="description">
            @if ($action == "createProduccion")
            {{ __('Complete los siguientes datos para registrar una nueva producción. Nota: lea correctamente los campos y verifique si están escritos de
                manera adecuada dentro del formulario. El formato de los campos con decimales es de X.XXX (Tres decimales.)') }} 
            
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
                            @if ($action == "createProduccion")
                            <td> {{$granoDeSoya}}</td>
                            @endif

                            @if ($action == "updateProduccion")
                            <td>{{$produccion->granoDeSoya}}</td>
                            @endif

                            <td>100%</td>

                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Merma</td>

                            @if( $action == "createProduccion")
                            <td>{{$merma}}</td>
                            <td>{{$mermaP}}%</td>
                            @endif

                            @if($action == "updateProduccion")
                            <td> {{$produccion->merma}}</td>
                            <td> {{$produccion->mermaP}}%</td>
                            @endif
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Agua</td>

                            @if($action == "createProduccion")
                            <td>{{$agua}}</td>
                            <td>{{$aguaP}}%</td>
                            @endif

                            @if($action == "updateProduccion")
                            <td> {{$produccion->agua}}</td>
                            <td> {{$produccion->aguaP}}%</td>
                            @endif
                            
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Soya Final</td>

                            @if($action == "createProduccion")
                            <td>{{$secado}}</td>
                            <td>{{$secadoP}}%</td>
                            @endif
                            
                            @if($action == "updateProduccion")
                            <td>{{$produccion->secado}}</td>
                            <td>{{$produccion->secadoP}}%</td>
                            @endif
                        </tr>
                    </tbody>
                </table>
            </div>


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
                            <td>Grano de Soya</td>
                            @if ($action == "createProduccion")
                            <td> {{$secado}}</td>
                            @endif

                            @if ($action == "updateProduccion")
                            <td>{{$produccion->granoDeSoya}}</td>
                            @endif

                            <td>100%</td>

                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Agua</td>

                            @if( $action == "createProduccion")
                            <td>{{$agua2}}</td>
                            <td>{{$aguaP2}}%</td>
                            @endif

                            @if($action == "updateProduccion")
                            <td> {{$produccion->merma}}</td>
                            <td> {{$produccion->mermaP}}%</td>
                            @endif
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Aceite</td>

                            @if($action == "createProduccion")
                            <td>{{$aceite}}</td>
                            <td>{{$aceiteP}}%</td>
                            @endif

                            @if($action == "updateProduccion")
                            <td> {{$produccion->agua}}</td>
                            <td> {{$produccion->aguaP}}%</td>
                            @endif
                            
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Solvente</td>

                            @if($action == "createProduccion")
                            <td>{{$harina}}</td>
                            <td>{{$solventeP}}%</td>
                            @endif
                            
                            @if($action == "updateProduccion")
                            <td>{{$produccion->secado}}</td>
                            <td>{{$produccion->secadoP}}%</td>
                            @endif
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
                   
                    @endif
                    <x-jet-input id="lote" type="text" class="mt-1 block w- form-control shadow-none"  wire:model.defer="produccion.lote" required />
                    <x-jet-input-error for="produccion.lote" class="mt-2" />
                </div>

                <!--FECHA-->
                <div class="">
                    <x-jet-label for="fecha" value="{{ __('Fecha') }}" />
                    @if($action == "updateProduccion")
                    <small>Edite la fecha</small>
                    @endif
                    @if($action == "createProduccion")
                   
                    @endif
                    <input type="date" name="fecha" class="form-control" value="{{ now()->format('Y-m-d') }}"  wire:model.defer="produccion.fecha" required>

                </div>

                <!--TURNO-->
                <div class="">
                    <x-jet-label for="turno" value="{{ __('Turno') }}" />
                    @if($action == "updateProduccion")
                    <small>Edite el turno</small>
                    @endif
                    @if($action == "createProduccion")
                 
                    @endif
                    <select wire:model.defer="produccion.idTurno" tabindex="-1" class="form-control " required>
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
                   
                    @if($action == "createProduccion")
                    <small>Ingrese cantidad de grano de soya</small>
                    <x-jet-input id="granoDeSoya" type="text" class="mt-1 block w- form-control shadow-none"   wire:model="granoDeSoya" wire:model.defer="produccion.granoDeSoya" required />

                    @endif
                    @if($action == "updateProduccion")
                    <small>Edite la cantidad de grano de soya</small>
                    <x-jet-input id="granoDeSoya" type="text" class="mt-1 block w- form-control shadow-none"  wire:model.defer="produccion.granoDeSoya" />

                    @endif
                    <x-jet-input-error for="produccion.granoDeSoya" class="mt-2" />
                </div>

                 <!--HUMEDAD-->
                 <div class="">
                    <x-jet-label for="humedad" value="{{ __('Humedad') }}" />
                    @if($action == "updateProduccion")
                    <small>Edite la cantidad de humedad en %</small>
                    <x-jet-input id="humedad" type="text" class="mt-1 block w-full form-control shadow-none"  wire:model.defer="produccion.humedad" />

                    @endif
                    @if($action == "createProduccion")
                    <small>Ingrese cantidad de humedad en %</small>
                    <x-jet-input id="humedad" class="mt-1 block w-full form-control shadow-none" type="text" wire:model="humedad" wire:change="$emit('calcular')" wire:model.defer="produccion.humedad" required/>
                    @endif
                    <x-jet-input-error for="produccion.humedad" class="mt-2" />
                </div>

                <!--GRASAS-->
                <div class="">
                    <x-jet-label for="grasas" value="{{ __('Grasa') }}" />
                    @if($action == "updateProduccion")
                    <small>Edite la cantida de grasa</small>
                    <x-jet-input id="grasas" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="produccion.grasas" />

                    @endif
                    @if($action == "createProduccion")
                    <small>Ingrese la cantidad de grasas</small>
                    <x-jet-input id="grasas" type="text" class="mt-1 block w-full form-control shadow-none" wire:model="grasa" wire:change="$emit('calcular')" wire:model.defer="produccion.grasas" required/>

                    @endif
                    <x-jet-input-error for="produccion.grasas" class="mt-2" />

                </div>

                <!--%MERMA SECA-->
                <div class="">
                    <x-jet-label for="grasas" value="{{ __('% Merma Seca') }}" />          
                    <small>Cantidad de grasa</small>
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
                    <x-jet-input id="merma" type="text" class="mt-1 block w-full form-control shadow-none"  wire:change="$emit('calcular')" wire:model.defer="produccion.merma" />

                    @endif
                    @if($action == "createProduccion")
                    <small>Ingrese cantidad de merma</small>
                    <x-jet-input id="merma" type="text" class="mt-1 block w-full form-control shadow-none"  wire:model="merma" wire:change="$emit('calcular')" wire:model.defer="produccion.merma" required />
                    @endif
                    <x-jet-input-error for="produccion.merma" class="mt-2" />
                </div>

                <!--AGUA-->
                <div class="">
                    <x-jet-label for="agua" value="{{ __('Agua') }}" />
                    @if($action == "updateProduccion")
                    <small>Agua extraida expresada en</small>
                    <x-jet-input id="agua" type="text" class="mt-1 block w-full form-control shadow-none" disabled wire:model.defer="produccion.agua"/>

                    @endif
                    @if($action == "createProduccion")
                    <small>Agua extraida expresada en</small>
                    <x-jet-input id="agua" type="text" class="mt-1 block w-full form-control shadow-none" disabled wire:model="agua" wire:model.defer="produccion.agua" required/>
                    @endif
                    <x-jet-input-error for="produccion.agua" class="mt-2" />
                </div>
            </div>

            <div class="border mt-4 p-3 rounded-lg">
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-4">
                    <!--SECADO-->
                    <div class="">
                        <x-jet-label for="secado" value="{{ __('Secado') }}" />  
                        @if($action == "updateProduccion")        
                        <small>Total del proceso de secado </small>
                        <x-jet-input id="secado" type="text" class="mt-1 block w-full form-control shadow-none" disabled  wire:model.defer="produccion.secado"/>

                        @endif
                        @if($action == "createProduccion")
                        <small>Valor total del proceso de secado </small>
                        <x-jet-input id="secado" type="text" class="mt-1 block w-full form-control shadow-none" disabled wire:model="secado" wire:model.defer="produccion.secado"/>
                        @endif
                        <x-jet-input-error for="produccion.secado" class="mt-2" />

                    </div>
                    
                    <!--HUMEDAD DE LABORATORIO-->
                    <div class="">
                        <x-jet-label for="humedad" value="{{ __('Humedad') }}" />
                        @if($action == "updateProduccion")
                        <small>Edite la cantidad de humedad</small>
                        <x-jet-input id="humedad" type="text" class="mt-1 block w-full form-control shadow-none"  wire:model.defer="produccion.humedadLab" />

                        @endif
                        @if($action == "createProduccion")
                        <small>Humedad obtenido de Laboratorio</small>
                        <x-jet-input id="humedadLab" class="mt-1 block w-full form-control shadow-none" type="text" wire:model="humedadLab" wire:change="$emit('calcular')" wire:model.defer="produccion.humedadLab" required/>

                        @endif
                        <x-jet-input-error for="produccion.humedadLab" class="mt-2" />
                    </div> 

                    <!--GRASA DE LABORATORIO-->
                    <div class="">
                        <x-jet-label for="grasa" value="{{ __('Grasa') }}" />
                        @if($action == "updateProduccion")
                        <small>Edite la cantidad de Grasa</small>
                        <x-jet-input id="humedadLab" class="mt-1 block w-full form-control shadow-none" type="text" wire:change="$emit('calcular')" wire:model.defer="produccion.humedadLab"/>

                        @endif
                        @if($action == "createProduccion")
                        <small>Cantidad de grasa obtenida del Laboratorio</small>
                        <x-jet-input id="grasaLab" type="text" class="mt-1 block w-full form-control shadow-none" wire:model="grasaLab" wire:change="$emit('calcular')" wire:model.defer="produccion.grasaLab" required/>

                        @endif
                        <x-jet-input-error for="produccion.grasaLab" class="mt-2" />
                    </div>

                    <!--%MERMA SECA EN SECADO-->
                    <div class="">
                        <x-jet-label for="mermaSecado" value="{{ __('% Merma Seca') }}" />          
                        <small>Total de merma seca en porcentaje </small>
                        <!--x-jet-input id="grasas" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="produccion.grasas" />-->
                        <x-jet-input id="mermaSecado" type="text" class="mt-1 block w-full form-control shadow-none" disabled wire:model="mermaSecado" />
                        <x-jet-input-error for="produccion.mermaSeca" class="mt-2" />

                    </div>

                </div>
            </div>

            <div class=" grid grid-cols-1 gap-4 sm:grid-cols-4 pt-3">
                <!--ACEITE-->
                <div class="">
                    <x-jet-label for="aceite" value="{{ __('Aceite') }}" />
                    @if($action == "updateProduccion")
                    <small>Edite la cantidad de aceite</small>
                    @endif
                    @if($action == "createProduccion")
                    <small>Ingrese cantidad de aceite</small>
                    @endif
                    <x-jet-input id="aceite" type="text" class="mt-1 block w-full form-control shadow-none"  wire:model="aceite" wire:model.defer="produccion.aceite" required />
                    <x-jet-input-error for="produccion.aceite" class="mt-2" />
                </div> 

                <!--HUMEDAD DE ACEITES-->
                <div class="">
                    <x-jet-label for="humedadAce" value="{{ __('Humedad ') }}" />
                    @if($action == "updateProduccion")
                    <small>Edite la cantidad de humedad de aceite</small>
                    <x-jet-input id="humedadAce" type="text" class="mt-1 block w-full form-control shadow-none"  wire:model.defer="produccion.humedadAce" />

                    @endif
                    @if($action == "createProduccion")
                    <small>Humedad obtenida de Laboratorio</small>
                    <x-jet-input id="humedadAce" class="mt-1 block w-full form-control shadow-none" type="text" wire:model="humedadAce" wire:change="$emit('calcular')" wire:model.defer="produccion.humedadAce" required/>

                    @endif
                    <x-jet-input-error for="produccion.humedadAce" class="mt-2" />
                    </div> 

                <!--GRASA DE LABORATORIO de-->
                <div class="">
                    <x-jet-label for="grasaAce" value="{{ __('Grasa') }}" />
                    @if($action == "updateProduccion")
                    <small>Edite la cantidad de Grasa</small>
                    <x-jet-input id="grasaAce" class="mt-1 block w-full form-control shadow-none" type="text" wire:change="$emit('calcular')" wire:model.defer="produccion.grasaAce"/>

                     @endif
                    @if($action == "createProduccion")
                    <small>Cantidad de grasa obtenida del Laboratorio</small>
                    <x-jet-input id="grasaAce" type="text" class="mt-1 block w-full form-control shadow-none" wire:model="grasaAce" wire:change="$emit('calcular')" wire:model.defer="produccion.grasaAce" required/>

                    @endif
                    <x-jet-input-error for="produccion.grasaAce" class="mt-2" />
                </div>

                <!--%MERMA SECA EN SECADO-->
                <div class="">
                    <x-jet-label for="mermaAce" value="{{ __('% Merma Seca') }}" />          
                    <small>Total de merma seca en porcentaje </small>
                    <x-jet-input id="mermaAce" type="text" class="mt-1 block w-full form-control shadow-none" disabled wire:model="mermaAce" />
                    <x-jet-input-error for="produccion.mermaAce" class="mt-2" />

                </div>

            </div>

            <div class=" grid grid-cols-1 gap-4 sm:grid-cols-4 pt-3">
                <!--HARINA SOLVENTE-->
                <div class="">
                    <x-jet-label for="harina" value="{{ __('Harina Solvente') }}" />
                    @if($action == "updateProduccion")
                    <small>Edite la cantidad de harina</small>
                    @endif
                    @if($action == "createProduccion")
                    <small>Ingrese cantidad de harina</small>
                    @endif
                    <x-jet-input id="harina" type="text" class="mt-1 block w-full form-control shadow-none"  wire:model="harina" required />
                    <x-jet-input-error for="produccion.harina" class="mt-2" />
                </div> 

                <!--HUMEDAD DE HARINA-->
                <div class="">
                    <x-jet-label for="humedadHarina" value="{{ __('Humedad ') }}" />
                    @if($action == "updateProduccion")
                    <small>Edite la cantidad de humedad de aceite</small>
                    <x-jet-input id="humedadHarina" type="text" class="mt-1 block w-full form-control shadow-none"  wire:model.defer="produccion.humedadHarina" />

                    @endif
                    @if($action == "createProduccion")
                    <small>Humedad obtenida de Laboratorio</small>
                    <x-jet-input id="humedadHarina" class="mt-1 block w-full form-control shadow-none" type="text" wire:model="humedadHarina" wire:change="$emit('calcular')" wire:model.defer="produccion.humedadHarina" required/>

                    @endif
                    <x-jet-input-error for="produccion.humedadHarina" class="mt-2" />
                    </div> 

                <!--GRASA DE LABORATORIO HARINA-->
                <div class="">
                    <x-jet-label for="grasaHarina" value="{{ __('Grasa') }}" />
                    @if($action == "updateProduccion")
                    <small>Edite la cantidad de Grasa</small>
                    <x-jet-input id="grasaHarina" class="mt-1 block w-full form-control shadow-none" type="text" wire:change="$emit('calcular')" wire:model.defer="produccion.grasaACe"/>

                     @endif
                    @if($action == "createProduccion")
                    <small>Cantidad de grasa obtenida del Laboratorio</small>
                    <x-jet-input id="grasaHarina" type="text" class="mt-1 block w-full form-control shadow-none" wire:model="grasaHarina" wire:change="$emit('calcular')" wire:model.defer="produccion.grasaHarina" required/>

                    @endif
                    <x-jet-input-error for="produccion.grasaHarina" class="mt-2" />
                </div>

                <!--%MERMA SECA HARINA-->
                <div class="">
                    <x-jet-label for="mermaHarina" value="{{ __('% Merma Seca') }}" />          
                    <small>Total de merma seca en porcentaje </small>
                    <!--x-jet-input id="grasas" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="produccion.grasas" />-->
                    <x-jet-input id="mermaHarina" type="text" class="mt-1 block w-full form-control shadow-none" disabled wire:model="mermaHarina" />
                    <x-jet-input-error for="produccion.mermaHarina" class="mt-2" />
                </div>

            </div>
            
            <div class=" grid grid-cols-1 gap-4 sm:grid-cols-3 pt-3">
                <!--AGUA 2-->
                <div class="">
                    <x-jet-label for="agua2" value="{{ __('Agua') }}" />
                    @if($action == "updateProduccion")
                    <small>Cantidad de agua final</small>
                    @endif
                    @if($action == "createProduccion")
                    <small>Cantidad de Agua Final</small>
                    @endif
                    <x-jet-input id="agua2" type="text" class="mt-1 block w-full form-control shadow-none"  wire:model="agua2" disabled/>
                    <x-jet-input-error for="produccion.agua2" class="mt-2" />
                </div>

                <!--BOLSAS-->
                <div class="">
                    <x-jet-label for="bolsas" value="{{ __('Bolsas') }}" />
                    @if($action == "updateProduccion")
                    <small>Edite la cantidad de bolsas</small>
                    @endif
                    @if($action == "createProduccion")
                    <small>Ingrese cantidad de bolsas</small>
                    @endif
                    <x-jet-input id="bolsas" type="text" class="mt-1 block w-full form-control shadow-none"  wire:model.defer="produccion.bolsas" required/>
                    <x-jet-input-error for="produccion.bolsas" class="mt-2" />
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
                    <x-jet-input id="luz" type="text" class="mt-1 block w-full form-control shadow-none"  wire:model.defer="produccion.luz"  required/>
                    <x-jet-input-error for="produccion.luz" class="mt-2" />
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
