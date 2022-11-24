<x-slot name="header_content">
        <h1>{{ __('Gestionar Artículos') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Artículos</a></div>
            <div class="breadcrumb-item"><a href="{{ route('user') }}">Gestionar Artículos</a></div>
        </div>
</x-slot>

<div class="bg-gray-100 text-gray-900 tracking-wider leading-normal">
    <div class="p-8 pt-4 mt-2 bg-white">
        <!--Butons-->
        <div class="flex pb-4 -ml-3">
            <a wire:click="$set('open', true)"  class="-ml- btn btn-primary shadow-none">
                Añadir Artículo
                <span class="fas fa-plus"></span> 
            </a>
            <a href="#" class="ml-2 btn btn-success shadow-none">
                Exportar
                <span class="fas fa-file-export"></span> 
            </a>
        </div>

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

        <!--Modal-->
        <x-jet-dialog-modal wire:model="open">
            <x-slot name="title">Crear Nuevo Artículo</x-slot>
            <x-slot name="content">
                <!--Codigo de Producto-->
                <div class="mb-4">
                    <label>Coódigo del Artículo</label><br>
                    <x-jet-input wire:model.defer="codigoProd" type="text"  class="mt-1 block w-full border-gray-200 form-control shadow-none" placeholder="Ej. 223" autocomplete="off"/>
                </div>

                <!--Nombre de producto-->
                <div class="mb-4">
                    <label>Nombre del Artículo</label>
                    <x-jet-input wire:model.defer="nombreProd" type="text"  class="mt-1 block w-full border-gray-200 form-control shadow-none" placeholder="Ej. Medicamentos" autocomplete="off"/>
                </div>

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                    <!--unidad-->
                    <div class="mb-4">
                        <label>Unidad</label>
                        <select class="form-control"  wire:model.defer="unidadId">
                            <option value="" selected>Seleccione Unidad</option>
                            @foreach ( $unidades as $unidad )
                            <option  value="{{$unidad->id}}">{{$unidad->nombre_unidad}}</option>
                            @endforeach   
                        </select>
                    </div>

                    <!--Grupo-->
                    <div class="mb-4">
                        <label>Grupo</label>
                        <select class="form-control" wire:model.defer="grupoId">
                            <option value="" selected >Seleccione Grupo</option>
                            @foreach ( $grupos as $grupo )
                            <option  value="{{$grupo->id}}">{{$grupo->nombre_grupo}}</option>
                            @endforeach 
                        </select> 
                    </div>

                    <!--Cuenta.-->
                    <div class="mb-4">
                        <label>Cuenta</label>
                        <select class="form-control" wire:model.defer="cuentaId">
                            <option value="" selected >Seleccione Cuenta</option>
                            @foreach ( $cuentas as $cuenta )
                            <option  value="{{$cuenta->id}}">{{$cuenta->nombre_cuenta}}</option>
                            @endforeach   
                        </select>
                    </div>

                </div>
  
            </x-slot>
            <x-slot name="footer">
                <x-jet-button wire:click="guardar" class="justify-center"> Guardar</x-jet-button>
                <x-jet-danger-button wire:click="$set('open', false)" class="justify-center"> Cancelar</x-jet-danger-button>
            </x-slot>
        </x-jet-dialog-modal>

        <x-notify-message on="saved" type="success" message="Artículo creado correctamente!" /> 


        <!--TABLE-->
        @if($productos->count())
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered table-striped text-sm text-gray-600">
                    <thead>
                    <tr>
                        <th class="cursor-pointer" wire:click="order('codigo_producto')" >
                            <a>Codigo Artículo
                                @if ($sort == 'codigo_producto')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-up"></i>
                                    @else
                                        <i class="fas fa-sort-down"></i>
                                    @endif
                                @else
                                    <i class="text-muted fas fa-sort"></i>
                                @endif
                        </th>
                        <th class="cursor-pointer" wire:click="order('nombre_producto')" >
                            <a>Nombre Artículo
                                @if ($sort == 'nombre_producto')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-up"></i>
                                    @else
                                        <i class="fas fa-sort-down"></i>
                                    @endif
                                @else
                                    <i class="text-muted fas fa-sort"></i>
                                @endif</th>
                        <th class="cursor-pointer" wire:click="order('unidad_idUnidad')" >
                            <a>Unidad
                            @if ($sort == 'unidad_idUnidad')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-up"></i>
                                    @else
                                        <i class="fas fa-sort-down"></i>
                                    @endif
                                @else
                                    <i class="text-muted fas fa-sort"></i>
                                @endif</th>
                        <th class="cursor-pointer" wire:click="order('grupo_idGrupo')" >
                            <a>Grupo
                            @if ($sort == 'grupo_idGrupo')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-up"></i>
                                    @else
                                        <i class="fas fa-sort-down"></i>
                                    @endif
                                @else
                                    <i class="text-muted fas fa-sort"></i>
                                @endif</th>
                        <th class="cursor-pointer" wire:click="order('cuenta_idCuenta')" >
                            <a>Cuenta
                            @if ($sort == 'cuenta_idCuenta')
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
                    @foreach ($productos as $producto)
                    <tr>
                        <td>{{ $producto->codigo_producto }}</td>
                        <td>{{ $producto->nombre_producto}}</td>
                        <td>{{ $producto->unidad_idUnidad }}</td>
                        <td>{{ $producto->grupo_idGrupo }}</td>
                        <td>{{ $producto->cuenta_idCuenta }}</td>
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