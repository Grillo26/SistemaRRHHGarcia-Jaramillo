<div>
    <x-data-table :data="$data" :model="$balances, $produccions" >
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('lote')" role="button" href="#">
                    Lote
                    @include('components.sort-icon', ['field' => 'lote'])
                </a></th>

                <th><a wire:click.prevent="sortBy('agua2')" role="button" href="#">
                    Grano de Soya
                    @include('components.sort-icon', ['field' => 'agua2'])
                </a></th>

                <th><a wire:click.prevent="sortBy('fecha')" role="button" href="#">
                    Fecha
                    @include('components.sort-icon', ['field' => 'fecha'])
                </a></th>

                <th><a wire:click.prevent="sortBy('agua2')" role="button" href="#">
                    Agua 
                    @include('components.sort-icon', ['field' => 'agua2'])
                </a></th>

                <th><a wire:click.prevent="sortBy('aceite')" role="button" href="#">
                    Aceite
                    @include('components.sort-icon', ['field' => 'aceite'])
                </a></th>

                <th><a wire:click.prevent="sortBy('harina')" role="button" href="#">
                    Solvente
                    @include('components.sort-icon', ['field' => 'harina'])
                </a></th>

                

                <th>Acciones</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($balances as $balance)
                <tr x-data="window.__controller.dataTableController({{ $balance->id }})">
                    @foreach ($produccions as $produccion)
                        @if(  $balance->lote == $produccion->id)
                            <td>{{ $produccion->lote}}</td>
                            <td>{{ $produccion->granoDeSoya }}</td>
                            <td>{{ $produccion->fecha }}</td>
                        @endif
                    @endforeach
                    <td>{{ $balance->agua2 }}</td>
                    <td>{{ $balance->aceite }}</td>
                    <td>{{ $balance->harina }}</td>
                    <td class="whitespace-no-wrap row-action--icon"> 
                        <a role="button" href="/produccion/edit/{{ $balance->id }}" class="mr-3"><i class="fa fa-16px text-green-500 fa-pen"></i></a>
                        <a role="button" x-on:click.prevent="deleteItem" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>
                        
                    </td>
                </tr>
            @endforeach
        </x-slot> 
    </x-data-table>
</div>
