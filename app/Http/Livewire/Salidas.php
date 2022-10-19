<?php

namespace App\Http\Livewire;
use App\Models\Unidad; 
use App\Models\Producto;
use Livewire\Component;

class Salidas extends Component
{
    public $unidad, $producto;
    public function render()
    {
        return view('livewire.salidas',[
            'unidades'=>Unidad::get(),
            'productos'=>Producto::get()

        ]);
    }
}
