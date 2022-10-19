<div>
    <x-slot name="header_content">
        <h1>{{ __('Entrada de Artículo') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#"></a>Artículo</div>
            <div class="breadcrumb-item"><a href="{{ route('user') }}">Registrar Entrada</a></div>
        </div>
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-lg lg:p-12 lg:col-span-1">
        <form>
            <div class="border p-3 rounded-lg"> 
                <div class="form-row">
                     <!--Proveedor-->
                     <div class="form-group col-md-4">
                        <label >Proveedor</label>
                        <input type="text" class="form-control" id="" >
                    </div>

                     <!--Fecha-->
                     <div class="form-group col-md-4">
                        <label>Fecha</label>
                        <input class="p-2" type="date" id="start" name="trip-start" value="" min="2018-01-01" max="20-12-31">
                    </div>

                     <!--ady-->
                     <div class="form-group col-md-4">
                        <label>Ady</label>
                        <select class="form-control">
                            <option selected >Comprobante</option>
                            <option>Hola</option>
                        </select>
                    </div>
                </div>
            </div><br>

            <div class="border p-3 rounded-lg">
                <div class="form-row">
                    <!--Cod Prod.-->
                    <div class="form-group col-md-4">
                        <label >Cod. Producto</label>
                        <input type="text" class="form-control" id="" >
                    </div>

                    <!--Articulo-->
                    <div class="form-group col-md-4">
                        <label >Articulo</label>
                        <input type="text" class="form-control" id="" disabled >
                    </div>

                    <!--Grupo-->
                    <div class="form-group col-md-4">
                        <label >Grupo</label>
                        <input type="text" class="form-control" id="" disabled >
                    </div>

                </div>

                <div class="form-row">
                    <!--Cuenta-->
                    <div class="form-group col-md-4">
                        <label >Cuenta</label>
                        <input type="text" class="form-control" id="" disabled>
                    </div>

                    <!--Unidad-->
                    <div class="form-group col-md-4">
                        <label >Unidad</label>
                        <input type="text" class="form-control" id="" disabled >
                    </div>

                    <!--Precio-->
                    <div class="form-group col-md-4">
                        <label >Precio</label>
                        <input type="text" class="form-control" id=""  >
                    </div>

                </div>

                <div class="form-row">
                    <!--Cantidad-->
                    <div class="form-group col-md-4">
                        <label >Cantidad</label>
                        <input type="text" class="form-control" id="" >
                    </div>

                    <!--Fecha de Vencimiento-->
                    <div class="form-group col-md-4">
                        <label >Fecha de Vencimiento</label>
                        <input type="text" class="form-control" id="" >
                    </div>

                    <div class="form-group col-md-2 p-4">
                        <x-jet-button> Guardar</x-jet-button>
                    </div>

                </div>
            </div>
        </form>
    </div>
</div>
