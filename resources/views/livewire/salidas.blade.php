<div>
    <x-slot name="header_content">
        <h1>{{ __('Salida de Artículo') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#"></a>Productos</div>
            <div class="breadcrumb-item"><a href="{{ route('user') }}">Registrar Salidas</a></div>
        </div>
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-lg lg:p-12 lg:col-span-1">
        <form>
            <div class="border p-3 rounded-lg"> 
                <div class="form-row">
                    <!--Codigo Unidad-->
                    <div class="form-group col-md-2" wire:ignore >
                    <label>Codigo de Unidad</label>
                        <select class="select2" wire:model="unidad">
                            <option value="" selected>Seleccione Unidad</option>
                            @foreach ( $unidades as $unidad )
                            <option  value="{{$unidad->id}}">{{$unidad->nombre_unidad}}</option>
                            @endforeach 
                        </select>
                    </div>

                    <!--xxxxxx-->
                    <div class="form-group col-md-3">
                        <label>xxxxxx</label>
                        <input type="text" class="form-control" id="" placeholder="" disabled>
                    </div>
                    <!--Nombre-->
                    <div class="form-group col-md-3">
                        <label >Nombre</label>
                        <input type="text" class="form-control" id="" disabled>
                    </div>

                    <!--Nro Comp-->
                    <div class="form-group col-md-2">
                        <label>Nro. Comp.</label>
                        <select class="form-control">
                            <option selected >Comprobante</option>
                            <option>Hola</option>
                        </select> 
                    </div>

                    <!--Fecha-->
                    <div class="form-group col-md-2">
                        <label>Fecha</label>
                        <input class="p-2" type="date" id="start" name="trip-start" value="" min="2018-01-01" max="20-12-31">
                    </div>
                    
                </div>
            </div>
            <br>
           
            <div class="border p-3 rounded-lg">
                <div class="form-row">
                    <!--Codigo Prod.-->
                    <div class="form-group col-md-3">
                        <label>Cod. Prod.</label>
                        <select class="select2" wire:model="producto">
                            <option value="" selected>Seleccion Codigo</option>
                            @foreach ( $productos as $producto )
                            <option  value="{{$producto->id}}">{{$producto->codigo_producto}}</option>
                            @endforeach 
                        </select>
                    </div>
                    <!--Producto-->
                    <div class="form-group col-md-3">
                        <label>Producto</label>
                        <input type="text" class="form-control" id="" disabled>
                    </div>
                    <!--Unidad-->
                    <div class="form-group col-md-3">
                        <label >Unidad</label>
                        <input type="text" class="form-control" id="" disabled>
                    </div>

                    <!--Grupo.-->
                    <div class="form-group col-md-3">
                        <label>Grupo</label>
                        <input type="text" class="form-control" id="" disabled>
                    </div>
                </div>
                <div class="form-row"> 
                    <!--Cuenta An.-->
                    <div class="form-group col-md-3">
                        <label>Cuenta An.</label>
                        <input type="text" class="form-control" id="" disabled>
                    </div>
                    <!--Partida Pr.-->
                    <div class="form-group col-md-3">
                        <label >Partida Pr.</label>
                        <input type="text" class="form-control" id="" disabled>
                    </div>
                
                    <!--Cuenta-->
                    <div class="form-group col-md-3">
                        <label>Cuenta</label>
                        <input type="text" class="form-control" id="" disabled>
                    </div>
                    <!--Cod. Cuenta-->
                    <div class="form-group col-md-3">
                        <label>Cod. Cuenta</label>
                        <input type="text" class="form-control" id="" disabled>
                    </div>
                </div>

                <div class="form-row">
                    <!--U. Precio-->
                    <div class="form-group col-md-3">
                        <label >U. Precio</label>
                        <input type="text" class="form-control" id="" disabled>
                    </div>

                    <div class="form-group col-md-4"></div>

                    <!--Cantidad-->
                    <div class="form-group col-md-3">
                        <label >Cantidad</label>
                        <input type="text" class="form-control mb-2">
                    </div>
                    
                    <div class="form-group col-md-2 p-4">
                        <x-jet-button> Guardar</x-jet-button>
                    </div>
                </div>

            </div>
        </form>

    </div>

    <script>
        document.addEventListener('livewire:load', function(){
            $('.select2').select2();
            $('.select2').on('change', function(){
                @this.set('producto', this.value);
            });
        })
    </script>


</div>
