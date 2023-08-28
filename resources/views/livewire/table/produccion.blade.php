<div>
    <x-data-table :data="$data" :model="$produccions, $turnos" >
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('lote')" role="button" href="#">
                    Lote
                    @include('components.sort-icon', ['field' => 'lote'])
                </a></th>

                <th><a wire:click.prevent="sortBy('fecha')" role="button" href="#">
                    Fecha
                    @include('components.sort-icon', ['field' => 'fecha'])
                </a></th>

                <th><a wire:click.prevent="sortBy('granoDeSoya')" role="button" href="#">
                    Grano de Soya
                    @include('components.sort-icon', ['field' => 'granoDeSoya'])
                </a></th>

                <th><a wire:click.prevent="sortBy('merma')" role="button" href="#">
                    Merma
                    @include('components.sort-icon', ['field' => 'merma'])
                </a></th>

                <th><a wire:click.prevent="sortBy('idTurno')" role="button" href="#">
                    Turno
                    @include('components.sort-icon', ['field' => 'idTurno'])
                </a></th>

                <th><a wire:click.prevent="sortBy('humedadGrano')" role="button" href="#">
                    Humedad %
                    @include('components.sort-icon', ['field' => 'humedadGrano'])
                </a></th>

                <th><a wire:click.prevent="sortBy('grasaGrano')" role="button" href="#">
                    Grasa %
                    @include('components.sort-icon', ['field' => 'grasaGrano'])
                </a></th>

                <th><a wire:click.prevent="sortBy('bolsas')" role="button" href="#">
                    Cant. Bolsas
                    @include('components.sort-icon', ['field' => 'bolsas'])
                </a></th>

                <th><a wire:click.prevent="sortBy('expeller')" role="button" href="#">
                    Expeller
                    @include('components.sort-icon', ['field' => 'expeller'])
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
                    <td>{{ $produccion->humedadGrano }}</td>
                    <td>{{ $produccion->grasaGrano}}</td>
                    <td>{{ $produccion->bolsas }}</td>
                    <td>{{ $produccion->expeller }}</td>
                    
                    <td class="whitespace-no-wrap row-action--icon"> 
                        <!-- Vista producciones.blade.php -->
                        <a role="button" href="/produccion/pdf/{{ $produccion->id }}" class="mr-3"><i class="fa fa-16px text-blue-500 fa-file-pdf"></i></a>
                        <a role="button" href="/produccion/edit/{{ $produccion->id }}" class="mr-3"><i class="fa fa-16px text-green-500 fa-balance-scale"></i></a>
                        <a role="button" href="/produccion/costo/{{ $produccion->id }}" class="mr-3"><i class="fa fa-16px text-green-500 fa-coins"></i></a>
                        <a role="button" x-on:click.prevent="deleteItem" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>
                        
                    </td>
                </tr>
            @endforeach
        </x-slot> 
    </x-data-table>
</div>
