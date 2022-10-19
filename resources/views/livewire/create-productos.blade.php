<div>
  <!--FROM-->
  <div class="p-4 bg-white rounded-lg shadow-lg lg:p-12 lg:col-span-1 ">
    <div class="border p-3 rounded-lg">
      <form action="" class="space-y-4">
          <div class=" grid grid-cols-1 gap-4 sm:grid-cols-2">
            <!--Nombre-->
            <div class="">
              <label>Nombre del Artículo</label><br>
              <x-jet-input id="name" wire:model.defer="name" type="text" class="mt-1 block w-full border-gray-200 form-control shadow-none" placeholder="Ej. Medicamentos" autocomplete="off"/>
            </div>

            <!--Codigo-->
            <div>
              <label>Codigo del Artículo</label>
              <x-jet-input id="name" type="text" wire:model.defer="codigo" class="mt-1 block w-full border-gray-200 form-control shadow-none" placeholder="Ej. 225" autocomplete="off"/>
            </div>

          </div>

          <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
            <!--Grupo-->
            <div>
              <label>Grupo</label>
                <select class="form-control" wire:model.defer="grupo">
                  <option value="" selected >Seleccione Grupo</option>
                  @foreach ( $grupos as $grupo )
                    <option  value="{{$grupo->id}}">{{$grupo->nombre_grupo}}</option>
                  @endforeach 
                </select> 
            </div>
            
            <!--Cuenta-->
            <div>
              <label >Cuenta</label>
                <select class="form-control" wire:model.defer="cuenta">
                  <option value="" selected >Seleccione Cuenta</option>
                  @foreach ( $cuentas as $cuenta )
                    <option  value="{{$cuenta->id}}">{{$cuenta->nombre_cuenta}}</option>
            
                  @endforeach   
                </select>
            </div>

            <!--Unidad-->
            <div>
              <label>Cuenta</label>
                <select class="form-control"  wire:model.defer="unidad">
                  <option value="" selected>Seleccione Unidad</option>
                  @foreach ( $unidades as $unidad )
                    <option  value="{{$unidad->id}}">{{$unidad->nombre_unidad}}</option>
                  @endforeach   
                </select>
            </div>
          </div>

          <div class="mt-4 px-3 grid grid-cols-1">
            <div class="row justify-content-end gap-3">
              <x-jet-button wire:click="guardar()" class="justify-center"> Guardar</x-jet-button>
              <x-jet-danger-button wire:click="limpiarCampos()" class="justify-center"> Limpiar</x-jet-danger-button>
            </div>
            
          </div>
        </form>

    </div>
         
  </div>
</div>