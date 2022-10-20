<div class="bg-gray-100 text-gray-900 tracking-wider leading-normal">
    <div class="p-8 pt-4 mt-2 bg-white" x-data="window.__controller.dataTableMainController()" x-init="setCallback();">
        <!--Butons-->
        <div class="flex pb-4 -ml-3">
            <a wire:click="$set('open', true)" class="-ml- btn btn-primary shadow-none">
                Añadir Unidad
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
                Per Page: &nbsp;
                <select  class="form-control">
                    <option>10</option>
                    <option>15</option>
                    <option>25</option>
                </select>
            </div>

            <div class="col">
                <input wire:model="search"  class="form-control" type="text" placeholder="Search...">
            </div>
        </div>

         <!--Modal-->
         <x-jet-dialog-modal wire:model="open">
            <x-slot name="title">Crear Nueva Unidad</x-slot>
            <x-slot name="content">
                <!--Nombre-->
                <div class="mb-4">
                    <x-jet-input wire:model.defer="nombre" type="text"  class="mt-1 block w-full border-gray-200 form-control shadow-none" placeholder="Nombre de Cuenta" autocomplete="off"/>
                </div>
  
            </x-slot>
            <x-slot name="footer">
                <x-jet-button wire:click="guardar" class="justify-center"> Guardar</x-jet-button>
                <x-jet-danger-button wire:click="$set('open', false)" class="justify-center"> Cancelar</x-jet-danger-button>
            </x-slot>


        </x-jet-dialog-modal>

        <!--TABLE-->
        @if($unidades->count())
            <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered table-striped text-sm text-gray-600">
                    <thead>
                    <tr>
                        <th class="cursor-pointer" wire:click="order('id')" >
                            <a>ID
                                @if ($sort == 'id')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-up"></i>
                                    @else
                                        <i class="fas fa-sort-down"></i>
                                    @endif
                                @else
                                    <i class="text-muted fas fa-sort"></i>
                                @endif
                        </th>
                        <th class="cursor-pointer" wire:click="order('nombre_unidad')" >
                            <a>Nombre Unidad
                                @if ($sort == 'nombre_unidad')
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
                    @foreach ($unidades as $unidad)
                <tr>
                    <td>{{ $unidad->id }}</td>
                    <td>{{ $unidad->nombre_unidad}}</td>
                    
                    <td class="whitespace-no-wrap row-action--icon">
                            <a wire:click="editar({{$unidad->id}})" role="button" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
                            <a wire:click="borrar({{$unidad->id}})" role="button"><i class="fa fa-16px fa-trash text-red-500"></i></a>
                    </td>
                </tr>
            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
        @else
            <div class="px-6 py-4">
                No exite ningun registro
            </div>
        @endif
        
</div>
</div>