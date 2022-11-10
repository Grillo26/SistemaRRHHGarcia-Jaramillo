<?php

namespace App\Http\Livewire;
use App\Models\Unidad; 
use App\Models\Producto;
use App\Models\Cuenta;
use App\Models\Grupo;
use Livewire\Component;

class Salidas extends Component
{
    public $unidad ='', $unidadpro="unidad", $producto='hola', $grupo='grupo';
    public function render()
    {
        return view('livewire.salidas',[
            'unidades'=>Unidad::get(),
            'productos'=>Producto::get(),            
            'cuentas'=>Cuenta::get(),
            'grupos'=>Grupo::get()
 
        ]);

    }

    public function editar($id){
        $productos = Producto::findOrFail($id);
        $this->producto = $productos->nombre_producto;
        $this->unidadpro = $productos->unidad_idUnidad;
        $this->grupo = $productos->grupo_idGrupo;
    }

  

   


   

   

    
}
