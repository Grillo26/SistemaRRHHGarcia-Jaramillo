<?php

namespace App\Http\Livewire;
use App\Models\Unidad; 
use App\Models\Producto;
use App\Models\Cuenta;
use App\Models\Grupo;
use Livewire\Component;

class Salidas extends Component
{
    public $unidad, $producto, $cuenta, $grupo, $unidads;
    public function render()
    {
        return view('livewire.salidas',[
            'unidades'=>Unidad::get(),
            'productos'=>Producto::get(),            
            'cuentas'=>Cuenta::get(),
            'grupos'=>Grupo::get()

        ]);
    }

    public function updateUnidad($unidad){
        $this->unidad = Unidad::where('nombre_unidad', $unidad)->get();
    }

    
}
