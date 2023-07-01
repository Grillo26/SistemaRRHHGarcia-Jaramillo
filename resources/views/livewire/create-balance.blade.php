<div id="form-create">
    <x-jet-form-section :submit="$action" class="mb-4">
        <x-slot name="title">    
        </x-slot>

        <x-slot name="description">          
        </x-slot>


        <x-slot name="form">
            
            <div class="card shadow-none">
                <div class="card-header">     
                    <h1 class="p-2">Fecha: </h1>{{$fecha}}
                    <h1 class="p-2">Lote: </h1>{{$lote}}                   
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
        <div class="flex pb-4 ">
                <a href="/produccion/edit/{{ $produccion->id }}"  class="-ml- btn btn-primary shadow-none"><span class="fas fa-plus"></span> Ver</a>
                <a wire:click="generatePdf" class="ml-2 btn btn-success shadow-none"><span class="fas fa-file-export"></span> Exportar</a>

            </div>
        </x-slot>
    </x-jet-form-section>

    <x-notify-message on="saved" type="success" :message="__($button['submit_response_notyf'])" />
</div>
