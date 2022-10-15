<div>
    <x-slot name="header_content">
        <h1>{{ __('Salida de Artículo') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#"></a>Productos</div>
            <div class="breadcrumb-item"><a href="{{ route('user') }}">Registrar Salidas</a></div>
        </div>
    </x-slot>

    <div class="p-10 bg-white rounded-lg shadow-lg lg:p-12 lg:col-span-1">
        <form>
            <div class="border p-3 rounded-lg"> 
                <div class="form-row">
                    <!--Codigo Unidad-->
                    <div class="form-group col-md-4">
                    <select class="selectpicker" data-live-search="true">
                        <option data-tokens="ketchup mustard">Hot Dog, Fries and a Soda</option>
                        <option data-tokens="mustard">Burger, Shake and a Smile</option> 
                        <option data-tokens="frosting">Sugar, Spice and all things nice</option>
                    </select>


                    </div>
                    <!--xxxxxx-->
                    <div class="form-group col-md-4">
                        <label>xxxxxx</label>
                        <input type="text" class="form-control" id="" placeholder="" disabled>
                    </div>
                    <!--Nombre-->
                    <div class="form-group col-md-4">
                        <label >Nombre</label>
                        <input type="text" class="form-control" id="" disabled>
                    </div>
                </div>

                <div class="form-row">
                    <!--Fecha-->
                    <div class="form-group col-md-4">
                        <label>Fecha</label>
                        <input type="text" class="form-control" id="" placeholder="dd/mm/aaaaa">
                    </div>
                    <!--Nro Comp-->
                    <div class="form-group col-md-4">
                        <label>Nro. Comp.</label>
                        <input type="text" class="form-control" id="" placeholder="Escriba Número de Comp.">
                    </div>
                </div>
            </div>
            <br>
           
            <div class="border p-3 rounded-lg">
                <div class="form-row">
                    <!--Codigo Prod.-->
                    <div class="form-group col-md-4">
                        <label>Cod. Prod.</label>
                        <input type="text" class="form-control" id="" placeholder="Escriba Codigo de Producto">
                    </div>
                    <!--Producto-->
                    <div class="form-group col-md-4">
                        <label>Producto</label>
                        <input type="text" class="form-control" id="" disabled>
                    </div>
                    <!--Unidad-->
                    <div class="form-group col-md-4">
                        <label >Unidad</label>
                        <input type="text" class="form-control" id="" disabled>
                    </div>
                </div>
                <div class="form-row">
                    <!--Grupo.-->
                    <div class="form-group col-md-4">
                        <label>Grupo</label>
                        <input type="text" class="form-control" id="" disabled>
                    </div>
                    <!--Cuenta An.-->
                    <div class="form-group col-md-4">
                        <label>Cuenta An.</label>
                        <input type="text" class="form-control" id="" disabled>
                    </div>
                    <!--Partida Pr.-->
                    <div class="form-group col-md-4">
                        <label >Partida Pr.</label>
                        <input type="text" class="form-control" id="" disabled>
                    </div>
                </div>
                <div class="form-row">
                    <!--Cuenta-->
                    <div class="form-group col-md-4">
                        <label>Cuenta</label>
                        <input type="text" class="form-control" id="" disabled>
                    </div>
                    <!--Cod. Cuenta-->
                    <div class="form-group col-md-4">
                        <label>Cod. Cuenta</label>
                        <input type="text" class="form-control" id="" disabled>
                    </div>
                    <!--U. Precio-->
                    <div class="form-group col-md-4">
                        <label >U. Precio</label>
                        <input type="text" class="form-control" id="" disabled>
                    </div>
                </div>

                <div class="form-inline align-items-center">
                    <!--Cantidad-->
                    <div class="form-group">
                        <label class="px-4 ">Cantidad</label>
                        <input type="text" class="form-control mb-2">
                    </div>
                    <div class="col-auto">
                        <x-jet-button  class="justify-center"> Guardar</x-jet-button>
                    </div>
                </div>

            </div>
        </form>

    </div>


</div>
