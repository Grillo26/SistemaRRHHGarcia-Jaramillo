<div>
    <x-data-table :data="$data" :model="$costos, $produccions" >
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('produccion_id')" role="button" href="#">
                    Lote
                    @include('components.sort-icon', ['field' => 'produccion_id'])
                </a></th>

                <th><a wire:click.prevent="sortBy('soya')" role="button" href="#">
                    Soya
                    @include('components.sort-icon', ['field' => 'soya'])
                </a></th>

                <th><a wire:click.prevent="sortBy('soya')" role="button" href="#">
                    Aceite
                    @include('components.sort-icon', ['field' => 'soya'])
                </a></th>

                <th><a wire:click.prevent="sortBy('aceite')" role="button" href="#">
                    Gas Licuado
                    @include('components.sort-icon', ['field' => 'aceite'])
                </a></th>

                <th><a wire:click.prevent="sortBy('personal')" role="button" href="#">
                    Personal
                    @include('components.sort-icon', ['field' => 'personal'])
                </a></th>

                <th><a wire:click.prevent="sortBy('electricidad')" role="button" href="#">
                    Electricidad
                    @include('components.sort-icon', ['field' => 'electricidad'])
                </a></th>

                <th><a wire:click.prevent="sortBy('lote')" role="button" href="#">
                    Bolsas
                    @include('components.sort-icon', ['field' => 'lote'])
                </a></th>

                <th><a wire:click.prevent="sortBy('lote')" role="button" href="#">
                    Total
                    @include('components.sort-icon', ['field' => 'lote'])
                </a></th>


                <th>Acciones</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($costos as $costo)
                <tr x-data="window.__controller.dataTableController({{ $costo->id }})">
                    @foreach ($produccions as $produccion )
                        @if(  $costo->produccion_id == $produccion->id)
                        <td>{{ $produccion->lote}}</td>
                        @endif
                    @endforeach
                    <td>{{ $costo->soya }}</td>
                    <td>{{ $costo->aceite }}</td>
                    <td>{{ $costo->gasLicuado }}</td>
                    <td>{{ $costo->personal }}</td>
                    <td>{{ $costo->electricidad }}</td>
                    <td>{{ $costo->bolsas }}</td>
                    <td>{{ $costo->costo_total }}</td>
                    
                    <td class="whitespace-no-wrap row-action--icon"> 
                        <!--<a role="button" href="/produccion/edit/{{ $costo->id }}" class="mr-3"><i class="fa fa-16px text-green-500 fa-pen"></i></a>-->
                        <a role="button" x-on:click.prevent="deleteItem" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>
                        
                    </td>
                </tr>
            @endforeach
        </x-slot> 
    </x-data-table>
</div>
