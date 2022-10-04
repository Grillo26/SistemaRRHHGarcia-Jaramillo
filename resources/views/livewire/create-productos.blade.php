<div>
  <!--FROM-->
  <div class="p-10 bg-white rounded-lg shadow-lg lg:p-12 lg:col-span-1">
        <form action="" class="space-y-4">
          <div class="text-center grid grid-cols-1 gap-4 sm:grid-cols-2">
            <!--Nombre-->
            <div>
              <x-jet-input id="name" type="text" class="mt-1 block w-full border-gray-200 form-control shadow-none" placeholder="Nombre del Artículo" autocomplete="off"/>
            </div>

            <!--Codigo-->
            <div>
              <x-jet-input id="name" type="text" class="mt-1 block w-full border-gray-200 form-control shadow-none" placeholder="Código del Artículo" autocomplete="off"/>
            </div>

          </div>

          <div class="text-center grid grid-cols-1 gap-4 sm:grid-cols-3">
            <!--Grupo-->
            <div>
                <select class="form-control" >
                  <option  disabled selected value="">Grupo</option>
                  <option>Default select</option>
                </select> 
            </div>
            
            <!--Cuenta-->
            <div>
                <select class="form-control" >
                  <option  disabled selected value="">Cuenta</option>
                  <option>Default select</option>
                </select>
            </div>

            <!--Unidad-->
            <div>
                <select class="form-control" >
                  <option  disabled selected value="">Unidad</option>
                  <option>Default select</option>
                </select>
            </div>
          </div>

          <div class="mt-4  grid grid-cols-1">
            <div class="row justify-content-end gap-3">
              <x-jet-button class="justify-center"> Guardar</x-jet-button>
              <x-jet-danger-button class="justify-center"> Cancelar</x-jet-danger-button>
            </div>
            
          </div>
        </form>
      </div>
    </div>
</div>