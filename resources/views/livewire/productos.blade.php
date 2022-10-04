<x-slot name="header_content">
        <h1>{{ __('Gestionar Artículos') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Artículos</a></div>
            <div class="breadcrumb-item"><a href="{{ route('user') }}">Gestionar Artículos</a></div>
        </div>
</x-slot>

<div class="bg-gray-100 text-gray-900 tracking-wider leading-normal">
    <div class="p-8 pt-4 mt-2 bg-white" x-data="window.__controller.dataTableMainController()" x-init="setCallback();">
        <!--Butons-->
        <div class="flex pb-4 -ml-3">
            <a href="#"  class="-ml- btn btn-primary shadow-none">
                <span class="fas fa-plus"></span> 
            </a>
            <a href="#" class="ml-2 btn btn-success shadow-none">
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