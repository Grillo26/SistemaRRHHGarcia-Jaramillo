<div>
    <x-data-table :data="$data" :model="$users">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                    ID
                    @include('components.sort-icon', ['field' => 'id'])
                </a></th>

                <th><a wire:click.prevent="sortBy('name')" role="button" href="#">
                    Nombre
                    @include('components.sort-icon', ['field' => 'name'])
                </a></th>

                <th><a wire:click.prevent="sortBy('lastname')" role="button" href="#">
                    Apellido
                    @include('components.sort-icon', ['field' => 'lastname'])
                </a></th>

                <th><a wire:click.prevent="sortBy('username')" role="button" href="#">
                    Usuario
                    @include('components.sort-icon', ['field' => 'username'])
                </a></th>

                <th><a wire:click.prevent="sortBy('email')" role="button" href="#">
                    Email
                    @include('components.sort-icon', ['field' => 'email'])
                </a></th>
                
                <th><a wire:click.prevent="sortBy('created_at')" role="button" href="#">
                    Fecha de Creación
                    @include('components.sort-icon', ['field' => 'created_at'])
                </a></th>
                <th>Acciones</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($users as $user)
                <tr x-data="window.__controller.dataTableController({{ $user->id }})">
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->lastname }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td> 
                    <td>{{ $user->created_at->format('d M Y H:i') }}</td>
                    <td class="whitespace-no-wrap row-action--icon">
                        
                        <a class="btn btn-success btn-action mr-1" href="/user/edit/{{ $user->id }}"><i class="fas fa-pencil-alt"></i></a>
						<a class="btn btn-danger btn-action " x-on:click.prevent="deleteItem"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </x-slot> 
    </x-data-table>
</div>
