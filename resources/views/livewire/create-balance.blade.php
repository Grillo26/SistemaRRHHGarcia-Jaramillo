<div id="form-create">
    <x-jet-form-section :submit="$action" class="mb-4">
        <x-slot name="title">    
        </x-slot>

        <x-slot name="description">          
        </x-slot>


        <x-slot name="form">
            
            <div class="card shadow-none">
                <div class="card-header">
                    <!--<div class="flex pb-4 -ml-3">
                        <h3 class="p-2">Fecha: </h3>{{$fecha}}
                        <h3 class="p-2">Lote: </h3>{{$lote}}

                        <a href="#" class="ml-2 btn btn-success shadow-none">
                            <span class="fas fa-file-export"></span> Exportar
                        </a>

                    </div>*-->
                    <div class="flex pb-4 ">
                        <a href="#"  class="-ml- btn btn-primary shadow-none">
                            <span class="fas fa-plus"></span> Exportar
                        </a>
                        <a href="#" class="ml-2 btn btn-success shadow-none">
                            <span class="fas fa-file-export"></span> Exportar
                        </a>

                    </div>
                </div>
                
                <div class="card-body">
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
