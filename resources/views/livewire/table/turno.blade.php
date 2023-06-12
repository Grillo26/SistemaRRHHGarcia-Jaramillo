<div>
    <x-data-table :data="$data" :model="$turnos">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                    ID
                    @include('components.sort-icon', ['field' => 'id'])
                </a></th>

                <th><a wire:click.prevent="sortBy('nombreTurno')" role="button" href="#">
                    Nombre Turno
                    @include('components.sort-icon', ['field' => 'nombreTurno'])
                </a></th>

                <th><a wire:click.prevent="sortBy('descripcion')" role="button" href="#">
                    Descripción Turno
                    @include('components.sort-icon', ['field' => 'descripcion'])
                </a></th>
                

                <th>Acciones</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($turnos as $turno)
                <tr x-data="window.__controller.dataTableController({{ $turno->id }})">
                    <td>{{ $turno->id }}</td>
                    <td>{{ $turno->nombreTurno }}</td>
                    <td>{{ $turno->descripcion }}</td>
                    <td class="whitespace-no-wrap row-action--icon">
                        <a role="button" href="/turno/edit/{{ $turno->id }}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
                        <a role="button" x-on:click.prevent="deleteItem" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>
                    </td>
                </tr>
            @endforeach
        </x-slot> 
    </x-data-table>
</div>
