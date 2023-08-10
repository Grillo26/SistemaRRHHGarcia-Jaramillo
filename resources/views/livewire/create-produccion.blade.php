<div id="form-create">
    <x-jet-form-section :submit="$action" class="mb-4">
        <x-slot name="title">
            {{ __('') }}
        </x-slot>

        <x-slot name="description">
        @if ($action == "createProduccion")
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
                            <td> {{$granoDeSoya}}</td>
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
        @endif

        @if ($action == "updateProduccion")
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
                            <td> {{$produccion->secado}}</td>
                            <td>100%</td>

                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Agua</td>
                            <td>{{$agua2}}</td>
                            <td>{{$aguaP2}}%</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Aceite</td>
                            <td>{{$aceite}}</td>
                            <td>{{$aceiteP}}%</td>            
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Solvente</td>
                            <td>{{$harina}}</td>
                            <td>{{$solventeP}}%</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endif

            <div class="card-body">
            @if ($action == "createProduccion")
            {{ __('Complete los siguientes datos para registrar una nueva producción. Nota: lea correctamente los campos y verifique si están escritos de
                manera adecuada dentro del formulario. El formato de los campos con decimales es de X.XXX (Tres decimales.)') }} 
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
        @if($action == "createProduccion")
            <div class=" grid grid-cols-1 gap-4 sm:grid-cols-4">
                <!--LOTE-->
                <div class="">
                    <x-jet-label for="lote" value="{{ __('Lote') }}" />
                    <small>Edite el número del lote</small>
                    <x-jet-input id="lote" type="number" class="mt-1 block w- form-control shadow-none"  wire:model.defer="produccion.lote" required />
                    <x-jet-input-error for="produccion.lote" class="mt-2" />
                </div>

                <!--FECHA-->
                <div class="">
                    <x-jet-label for="fecha" value="{{ __('Fecha') }}" />
                    <small>Edite la fecha</small>
                    <input type="date" name="fecha" class="form-control" value="{{ now()->format('Y-m-d') }}"  wire:model.defer="produccion.fecha" required>

                </div>

                <!--TURNO-->
                <div class="">
                    <x-jet-label for="turno" value="{{ __('Turno') }}" />
                    <small>Edite el turno</small>
                    <select wire:model.defer="produccion.idTurno" tabindex="-1" class="form-control " required>
                        <option selected >Seleccione el turno</option>
                        @foreach ( $turnos as $turno )    
                        <option  value="{{$turno->id}}" data-index="0">{{$turno->nombreTurno}}</option>
                        @endforeach 
                    </select>               
                </div>

                <!--BOLSAS-->
                <div class="">
                    <x-jet-label for="bolsas" value="{{ __('Bolsas') }}" />
                    @if($action == "updateProduccion")
                    <small>Edite la cantidad de bolsas</small>
                    @endif
                    <small>Ingrese cantidad de bolsas</small>
                    <x-jet-input id="bolsas" type="text" class="mt-1 block w-full form-control shadow-none"  wire:model.defer="produccion.bolsas" required/>
                    <x-jet-input-error for="produccion.bolsas" class="mt-2" />
                </div>
            </div>

            <!----Img de proceso--->
            <div class=" grid grid-cols-1 gap-4">
                <img class="d-inline-block"   src="{{URL::asset('img/pproduccion.jpg')}}" alt="">
            </div>

            <div class=" grid grid-cols-1 gap-4 sm:grid-cols-4 pt-2">
                <!--GRANO DE SOYA-->
                <div class="">
                    <x-jet-label for="granoDeSoya" value="{{ __('Grano de Soya') }}" />
                   
                    <small>Ingrese cantidad de grano de soya</small>
                    <x-jet-input id="granoDeSoya" type="number" class="mt-1 block w- form-control shadow-none"   wire:model="granoDeSoya" wire:model.defer="produccion.granoDeSoya" required />

                  
                    @if($action == "updateProduccion")
                    <small>Edite la cantidad de grano de soya</small>
                    <x-jet-input id="granoDeSoya" type="text" class="mt-1 block w- form-control shadow-none"  wire:model.defer="produccion.granoDeSoya" />

                    @endif
                    <x-jet-input-error for="produccion.granoDeSoya" class="mt-2" />
                </div>

                 <!--HUMEDAD-->
                 <div class="">
                    <x-jet-label for="humedadGrano" value="{{ __('Humedad') }}" />
                    @if($action == "updateProduccion")
                    <small>Edite la cantidad de humedadGrano en %</small>
                    <x-jet-input id="humedadGrano" type="text" class="mt-1 block w-full form-control shadow-none" wire:change="$emit('calcular')"  wire:model.defer="produccion.humedadGrano" />

                    @endif
                    <small>Ingrese cantidad de humedadGrano en %</small>
                    <x-jet-input id="humedadGrano" class="mt-1 block w-full form-control shadow-none" type="text" wire:model="humedadGrano" wire:change="$emit('calcular')" wire:model.defer="produccion.humedadGrano" required/>
                    <x-jet-input-error for="produccion.humedadGrano" class="mt-2" />
                </div>

                <!--GRASAS-->
                <div class="">
                    <x-jet-label for="grasaGrano" value="{{ __('Grasa') }}" />
                    @if($action == "updateProduccion")
                    <small>Edite la cantida de grasa</small>
                    <x-jet-input id="grasaGrano" type="text" class="mt-1 block w-full form-control shadow-none" wire:change="$emit('calcular')" wire:model.defer="produccion.grasaGrano" />

                    @endif
                    <small>Ingrese la cantidad de grasa Grano</small>
                    <x-jet-input id="grasaGrano" type="text" class="mt-1 block w-full form-control shadow-none" wire:model="grasaGrano" wire:change="$emit('calcular')" wire:model.defer="produccion.grasaGrano" required/>


                    <x-jet-input-error for="produccion.grasaGrano" class="mt-2" />

                </div>

                <!--%MERMA SECA-->
                <div class="">
                    <x-jet-label for="" value="{{ __('% Merma Seca') }}" />    
                    @if($action == "updateProduccion")
                    <small>Cantidad de grasa</small>
                    <x-jet-input id="mSecaGrano" type="text" class="mt-1 block w-full form-control shadow-none" disabled  wire:model.defer="produccion.mSecaGrano" />
                    @endif

                    <small>Cantidad de grasa</small>
                    <x-jet-input id="mSecaGrano" type="text" class="mt-1 block w-full form-control shadow-none" disabled wire:model="mSecaGrano" wire:model.defer="produccion.mSecaGrano" />

                    <x-jet-input-error for="produccion.mSecaGrano" class="mt-2" />

                </div>
                
            </div>

            <div class=" grid grid-cols-1 gap-4 sm:grid-cols-2 pt-2">
                <!--MERMA-->
                <div class="">
                    <x-jet-label for="merma" value="{{ __('Merma') }}" />
                    @if($action == "updateProduccion")
                    <small>Edite la cantidad de merma</small>
                    <x-jet-input id="merma" type="text" class="mt-1 block w-full form-control shadow-none"  wire:change="$emit('calcular')" wire:model.defer="produccion.merma" />

                    @endif
                    <small>Ingrese cantidad de merma</small>
                    <x-jet-input id="merma" type="text" class="mt-1 block w-full form-control shadow-none"  wire:model="merma" wire:change="$emit('calcular')" wire:model.defer="produccion.merma" required />
                    <x-jet-input-error for="produccion.merma" class="mt-2" />
                </div>

                <!--AGUA-->
                <div class="">
                    <x-jet-label for="agua" value="{{ __('Agua') }}" />
                    @if($action == "updateProduccion")
                    <small>Agua extraida expresada en</small>
                    <x-jet-input id="agua" type="text" class="mt-1 block w-full form-control shadow-none" disabled wire:model.defer="produccion.agua"/>

                    @endif
                    <small>Agua extraida expresada en</small>
                    <x-jet-input id="agua" type="text" class="mt-1 block w-full form-control shadow-none" disabled wire:model="agua" wire:model.defer="produccion.agua" required/>
                    <x-jet-input-error for="produccion.agua" class="mt-2" />
                </div>
            </div>

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-4 pt-2">
                <!--SECADO-->
                <div class="">
                    <x-jet-label for="secado" value="{{ __('Secado') }}" />  
                    @if($action == "updateProduccion")        
                    <small>Total del proceso de secado </small>
                    <x-jet-input id="secado" type="text" class="mt-1 block w-full form-control shadow-none" disabled wire:model.defer="produccion.secado"/>

                    @endif
                    <small>Valor total del proceso de secado </small>
                    <x-jet-input id="secado" type="text" class="mt-1 block w-full form-control shadow-none" disabled wire:model="secado" wire:model.defer="produccion.secado"/>
                    <x-jet-input-error for="produccion.secado" class="mt-2" />

                </div>
                    
                <!--HUMEDAD DE LABORATORIO-->
                <div class="">
                    <x-jet-label for="humedadSecado" value="{{ __('Humedad') }}" />
                    @if($action == "updateProduccion")
                    <small>Edite la cantidad de humedadSecado</small>
                    <x-jet-input id="humedadSecado" type="text" class="mt-1 block w-full form-control shadow-none"  wire:model.defer="produccion.humedadSecado" />

                    @endif
                    <small>Humedad obtenido de Laboratorio</small>
                    <x-jet-input id="humedadSecado" class="mt-1 block w-full form-control shadow-none" type="text" wire:model="humedadSecado" wire:change="$emit('calcular')" wire:model.defer="produccion.humedadSecado" required/>

                    <x-jet-input-error for="produccion.humedadSecado" class="mt-2" />
                </div> 

                <!--GRASA DE LABORATORIO-->
                <div class="">
                    <x-jet-label for="grasaSecado" value="{{ __('Grasa') }}" />
                    @if($action == "updateProduccion")
                    <small>Edite la cantidad de Grasa</small>
                    <x-jet-input id="grasaSecado" class="mt-1 block w-full form-control shadow-none" type="text" wire:change="$emit('calcular')" wire:model.defer="produccion.grasaSecado"/>

                    @endif
                    <small>Cantidad de grasa obtenida del Laboratorio</small>
                    <x-jet-input id="grasaSecado" type="text" class="mt-1 block w-full form-control shadow-none" wire:model="grasaSecado" wire:change="$emit('calcular')" wire:model.defer="produccion.grasaSecado" required/>

                    <x-jet-input-error for="produccion.grasaSecado" class="mt-2" />
                </div>

                <!--%MERMA SECA EN SECADO-->
                <div class="">
                    <x-jet-label for="mSecaSecado" value="{{ __('% Merma Seca') }}" />          
                    <small>Total de merma seca en porcentaje </small>
                    <x-jet-input id="mSecaSecado" type="text" class="mt-1 block w-full form-control shadow-none" wire:model="mSecaSecado" wire:change="$emit('calcular')" wire:model.defer="produccion.mSecaSecado" disabled />
                    <x-jet-input-error for="produccion.mSecaSecado" class="mt-2" />

                </div>

                </div>

        @endif
<!--##################################################################################################################################-->
        @if($action == "updateProduccion")
            <div class=" grid grid-cols-1 gap-4 sm:grid-cols-4">
                <!--LOTE-->
                <div class="">
                    <x-jet-label for="lote" value="{{ __('Lote') }}" />
                    <x-jet-input id="lote" type="number" class="mt-1 block w- form-control shadow-none"  wire:model.defer="produccion.lote" disabled/>
                </div>

                <!--FECHA-->
                <div class="">
                    <x-jet-label for="fecha" value="{{ __('Fecha') }}" />
                    <input type="date" name="fecha" class="form-control" value="{{ now()->format('Y-m-d') }}"  wire:model.defer="produccion.fecha" disabled>
                </div>

                <!--TURNO-->
                <div class="">
                    <x-jet-label for="turno" value="{{ __('Turno') }}" />
                    <select wire:model.defer="produccion.idTurno" tabindex="-1" class="form-control " disabled>
                        <option selected >Seleccione el turno</option>
                        @foreach ( $turnos as $turno )    
                        <option  value="{{$turno->id}}" data-index="0">{{$turno->nombreTurno}}</option>
                        @endforeach 
                    </select>  
                                        
                </div>

                <!--GRANO DE SOYA-->
                <div class="">
                    <x-jet-label for="granoDeSoya" value="{{ __('Grano de Soya') }}" />
                    <x-jet-input id="granoDeSoya" type="number" class="mt-1 block w- form-control shadow-none" wire:model.defer="produccion.granoDeSoya" disabled/>
                </div>
            </div>

            <!----Img de proceso--->
            <div class=" grid grid-cols-1 gap-4">
                <img class="d-inline-block"   src="{{URL::asset('img/pproduccion.jpg')}}" alt="">
            </div>

            <div class=" grid grid-cols-1 gap-4 sm:grid-cols-4 pt-2">
                <!--ACEITE-->
                <div class="">
                    <x-jet-label for="aceite" value="{{ __('Aceite') }}" />
                    <small>Ingrese cantidad de grano de soya</small>
                    <x-jet-input id="aceite" type="number" class="mt-1 block w- form-control shadow-none"   wire:model="aceite" wire:model.defer="produccion.aceite" required />
                    <x-jet-input-error for="produccion.aceite" class="mt-2" />
                </div>

                 <!--HUMEDAD-->
                 <div class="">
                    <x-jet-label for="humedadAceite" value="{{ __('Humedad') }}" />
                    <small>Ingrese cantidad de humedadAceite en %</small>
                    <x-jet-input id="humedadAceite" class="mt-1 block w-full form-control shadow-none" type="text" wire:model="humedadAceite" wire:change="$emit('calcular')" wire:model.defer="produccion.humedadAceite" required/>
                    <x-jet-input-error for="produccion.humedadAceite" class="mt-2" />
                </div>

                <!--GRASAS-->
                <div class="">
                    <x-jet-label for="grasaAceite" value="{{ __('Grasa') }}" />
                    <small>Ingrese la cantidad de grasa Grano</small>
                    <x-jet-input id="grasaAceite" type="text" class="mt-1 block w-full form-control shadow-none" wire:model="grasaAceite" wire:change="$emit('calcular')" wire:model.defer="produccion.grasaAceite" required/>
                    <x-jet-input-error for="produccion.grasaAceite" class="mt-2" />

                </div>

                <!--%MERMA SECA-->
                <div class="">
                    <x-jet-label for="mSecaAceite" value="{{ __('% Merma Seca') }}" />    
                    <small>Cantidad de grasa</small>
                    <x-jet-input id="mSecaAceite" type="text" class="mt-1 block w-full form-control shadow-none"  wire:model="mSecaAceite" wire:model.defer="produccion.mSecaAceite" disabled />
                    <x-jet-input-error for="produccion.mSecaAceite" class="mt-2" />

                </div>
                
            </div>

            <div class=" grid grid-cols-1 gap-4 sm:grid-cols-4 pt-2">
                <!--HARINA-->
                <div class="">
                    <x-jet-label for="harina" value="{{ __('Harina') }}" />
                    <small>Ingrese cantidad de grano de soya</small>
                    <x-jet-input id="harina" type="number" class="mt-1 block w- form-control shadow-none"   wire:model="harina" wire:model.defer="produccion.harina" required />
                    <x-jet-input-error for="produccion.harina" class="mt-2" />
                </div>

                 <!--HUMEDAD-->
                 <div class="">
                    <x-jet-label for="humedadHarina" value="{{ __('Humedad') }}" />
                    <small>Ingrese cantidad de humedadHarina en %</small>
                    <x-jet-input id="humedadHarina" class="mt-1 block w-full form-control shadow-none" type="text" wire:model="humedadHarina" wire:change="$emit('calcular')" wire:model.defer="produccion.humedadHarina" required/>
                    <x-jet-input-error for="produccion.humedadHarina" class="mt-2" />
                </div>

                <!--GRASAS-->
                <div class="">
                    <x-jet-label for="grasaHarina" value="{{ __('Grasa') }}" />
                    <small>Ingrese la cantidad de grasa Grano</small>
                    <x-jet-input id="grasaHarina" type="text" class="mt-1 block w-full form-control shadow-none" wire:model="grasaHarina" wire:change="$emit('calcular')" wire:model.defer="produccion.grasaHarina" required/>
                    <x-jet-input-error for="produccion.grasaHarina" class="mt-2" />

                </div>

                <!--%MERMA SECA-->
                <div class="">
                    <x-jet-label for="mSecaHarina" value="{{ __('% Merma Seca') }}" />    
                    <small>Cantidad de grasa</small>
                    <x-jet-input id="mSecaHarina" type="text" class="mt-1 block w-full form-control shadow-none"  wire:model="mSecaHarina" wire:model.defer="produccion.mSecaHarina" disabled />
                    <x-jet-input-error for="produccion.mSecaHarina" class="mt-2" />

                </div>
                
            </div>

            <div class=" grid grid-cols-1 gap-4 sm:grid-cols-3 pt-2">
                <!--%AGUA2-->
                <div class="">
                    <x-jet-label for="mSecaHarina" value="{{ __('Agua') }}" />    
                    <small>Cantidad de Agua</small>
                    <x-jet-input id="agua2" type="text" class="mt-1 block w-full form-control shadow-none"  wire:model="agua2" wire:model.defer="produccion.agua2" disabled />
                    <x-jet-input-error for="produccion.agua2" class="mt-2" />

                </div>
            </div>

        @endif
        
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
