<div>
    <x-data-table :data="$data" :model="$costos" >
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('precioGasLicuado')" role="button" href="#">
                    Precio Gas Licuado (Bs)
                    @include('components.sort-icon', ['field' => 'precioGasLicuado'])
                </a></th>

                <th><a wire:click.prevent="sortBy('precioPersonal')" role="button" href="#">
                    Precio de Personal (Bs)
                    @include('components.sort-icon', ['field' => 'precioPersonal'])
                </a></th>

                <th><a wire:click.prevent="sortBy('precioElectricidad')" role="button" href="#">
                    Precio de la Electricidad (Bs)
                    @include('components.sort-icon', ['field' => 'precioElectricidad'])
                </a></th>

                <th><a wire:click.prevent="sortBy('precioBolsas')" role="button" href="#">
                    Precio de Bolsas (Bs)
                    @include('components.sort-icon', ['field' => 'precioBolsas'])
                </a></th>
                
                <th><a wire:click.prevent="sortBy('precioAceite')" role="button" href="#">
                    Precio de Aceite (Bs)
                    @include('components.sort-icon', ['field' => 'precioAceite'])
                </a></th>

                <th>Acciones</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($costos as $costo)
                <tr x-data="window.__controller.dataTableController({{ $costo->id }})">
                    <td>{{ $costo->precioGasLicuado }}</td>
                    <td>{{ $costo->precioPersonal }}</td>
                    <td>{{ $costo->precioElectricidad }}</td>
                    <td>{{ $costo->precioBolsas }}</td>
                    <td>{{ $costo->precioAceite }}</td>

                    
                    <td class="whitespace-no-wrap row-action--icon"> 
                        <a role="button" href="/costo/edit/{{ $costo->id }}" class="mr-3"><i class="fa fa-16px text-green-500 fa-pen"></i></a>                        
                    </td>
                </tr>
            @endforeach
        </x-slot> 
    </x-data-table>
</div>
