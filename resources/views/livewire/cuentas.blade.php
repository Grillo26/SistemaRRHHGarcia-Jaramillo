<div>
    <x-slot name="header_content">
        <h1>{{ __('Gestionar Cuentas') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Artículos</a></div>
            <div class="breadcrumb-item"><a href="#">Cuentas</a></div>
            <div class="breadcrumb-item"><a href="{{ route('user') }}">Gestionar Cuentas</a></div>
        </div>
    </x-slot>

    <div class="p-8 pt-4 mt-2 bg-white">
        <!--Butons-->
        <div class="flex pb-4 -ml-3">
            <a wire:click="$set('open', true)" class="-ml- btn btn-primary shadow-none">
                Añadir Cuenta
                <span class="fas fa-plus"></span> 
            </a>
            <a href="#" class="ml-2 btn btn-success shadow-none">
                Exportar
                <span class="fas fa-file-export"></span> 
            </a>
        </div>

        <!--Modal-->
        <x-jet-dialog-modal wire:model="open">
            <x-slot name="title">Crear Nueva Cuenta</x-slot>
            <x-slot name="content">
                <!--Nombre-->
                <div class="mb-4">
                    <x-jet-input wire:model.defer="nombre" type="text"  class="mt-1 block w-full border-gray-200 form-control shadow-none" placeholder="Nombre de Cuenta" autocomplete="off"/>
                </div>

                <!--codigo-->
                <div class="mb-4">
                    <x-jet-input wire:model.defer="codigo" type="text"  class="mt-1 block w-full border-gray-200 form-control shadow-none" placeholder="Código Cuenta" autocomplete="off"/>
                </div>
  
            </x-slot>
            <x-slot name="footer">
                <x-jet-button wire:click="guardar" class="justify-center"> Guardar</x-jet-button>
                <x-jet-danger-button wire:click="$set('open', false)" class="justify-center"> Cancelar</x-jet-danger-button>
            </x-slot>


        </x-jet-dialog-modal>


        <!--Options-->
        <div class="row mb-4">
            <div class="col form-inline">
                Por Páginas: &nbsp;
                <select  class="form-control" >
                    <option>10</option>
                    <option>15</option>
                    <option>25</option>
                </select>
            </div>

            <div class="col">
                <input wire:model="search" class="form-control" type="text" placeholder="Buscar...">
            </div>
        </div>

        <!--TABLE-->
        @if($cuentas->count())
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered table-striped text-sm text-gray-600">
                    <thead>
                    <tr>
                        <th class="cursor-pointer" wire:click="order('nombre_cuenta')" >
                            <a>Nombre de Cuenta
                                @if ($sort == 'nombre_cuenta')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-up"></i>
                                    @else
                                        <i class="fas fa-sort-down"></i>
                                    @endif
                                @else
                                    <i class="text-muted fas fa-sort"></i>
                                @endif
                        </th>
                        <th class="cursor-pointer" wire:click="order('codigo_cuenta')" >
                            <a>Código de Cuenta
                                @if ($sort == 'codigo_cuenta')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-up"></i>
                                    @else
                                        <i class="fas fa-sort-down"></i>
                                    @endif
                                @else
                                    <i class="text-muted fas fa-sort"></i>
                                @endif</th>

                        <th><a>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($cuentas as $cuenta)
                    <tr>
                        <td>{{ $cuenta->nombre_cuenta }}</td>
                        <td>{{ $cuenta->codigo_cuenta}}</td>
                        <td class="whitespace-no-wrap row-action--icon">
                            <a role="button" href="#" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
                            <a role="button"  href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>
                        </td>
                    </tr>
            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @else
            <div class="px-6 py-4">
                No se encontro ningún registro con {{$search}}
            </div>
        @endif
    </div>
</div>
