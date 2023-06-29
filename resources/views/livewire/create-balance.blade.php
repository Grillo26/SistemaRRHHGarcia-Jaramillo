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
        </x-slot>


        <x-slot name="form">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-md">
                        <tbody><tr>
                            <th>#</th>
                            <th>Materia</th>
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
                            <td>{{$aguaP}}</td>
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
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-md">
                        <tbody><tr>
                            <th>#</th>
                            <th>Materia</th>
                            <th>KG</th>
                            <th>%</th>
                            
                            </tr>
                            <tr>
                            <td>1</td>
                            <td>Soya</td>
                            <td>2017-01-09</td>
                            <td></td>

                            </tr>
                            <tr>
                            <td>2</td>
                            <td>Merma</td>
                            <td>2017-01-09</td>
                            <td></td>
                            </tr>
                            <tr>
                            <td>3</td>
                            <td>Agua</td>
                            <td>2017-01-11</td>
                            <td></td>
                            </tr>
                            <tr>
                            <td>4</td>
                            <td>Soya Final</td>
                            <td>2017-01-11</td>
                            <td></td>
                            </tr>
                        </tbody>
                    </table>
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
