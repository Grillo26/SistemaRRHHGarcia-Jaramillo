<div class="bg-gray-100 text-gray-900 tracking-wider leading-normal">
    <div class="p-8 pt-4 mt-2 bg-white" x-data="window.__controller.dataTableMainController()" x-init="setCallback();">
        <!--Butons-->
        <div class="flex pb-4 -ml-3">
            <a href="" class="-ml- btn btn-primary shadow-none">
                <span class="fas fa-plus"></span> 
            </a>
            <a href="#" class="ml-2 btn btn-success shadow-none">
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
                No exite ningun registro
            </div>
        @endif
        
</div>
</div>