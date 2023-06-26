<div>
    <x-data-table :data="$data" :model="$produccions, $rendimentos" >
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('lote')" role="button" href="#">
                    Lote
                    @include('components.sort-icon', ['field' => 'lote'])
                </a></th>

               
                       

                <th>Acciones</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($produccions as $produccion)
                <tr x-data="window.__controller.dataTableController({{ $produccion->id }})">
                    <td>{{ $produccion->lote }}</td>
                    <td>{{ $produccion->fecha }}</td>
                    <td>{{ $produccion->granoDeSoya }}</td>
                    <td>{{ $produccion->merma }}</td>
                    @foreach ($turnos as $turno )
                        @if(  $produccion->idTurno == $turno->id)
                        <td>{{ $turno->nombreTurno}}</td>
                        @endif
                    @endforeach
                    <td>{{ $produccion->humedad }}</td>
                    <td>{{ $produccion->bolsas }}</td>
                    <td>{{ $produccion->expeller }}</td>
                    <td>{{ $produccion->aceite}}</td>
                    <td>{{ $produccion->grasas}}</td>
                    <td>{{ $produccion->luz}}</td>
                    <td class="whitespace-no-wrap row-action--icon"> 
                        <a role="button" href="/produccion/balance/{{ $produccion->id }}" class="mr-3"><i class="fa fa-box-open text-green-600"></i></a>
                        <a role="button" href="/produccion/edit/{{ $produccion->id }}" class="mr-3"><i class="fa fa-16px text-green-500 fa-pen"></i></a>
                        <a role="button" x-on:click.prevent="deleteItem" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>
                        
                    </td>
                </tr>
            @endforeach
        </x-slot> 
    </x-data-table>
</div>
