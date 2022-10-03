<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Producto;


class Productos extends Component
{
    //Definicion de variables
    public $search="";
    public $sort='id';
    public $direction ='desc';

    public function render(){
        $productos = Producto::where('codigo_producto', 'like', '%' . $this->search . '%')
        ->orwhere('nombre_producto', 'like', '%' . $this->search . '%')
        ->orwhere('unidad_idUnidad', 'like', '%' . $this->search . '%')
        ->orwhere('grupo_idGrupo', 'like', '%' . $this->search . '%')
        ->orwhere('cuenta_idCuenta', 'like', '%' . $this->search . '%')
        ->orderBy($this->sort, $this->direction)
        ->get();
        return view('livewire.productos', compact ('productos'));
    }

    public function order($sort){ //Metodo para ordenar
        if ($this->sort == $sort) {
            if($this->direction == 'desc'){
                $this->direction ='asc';
            }
            else{
                $this->direction = 'desc';
            }
        }
        else{
            $this->sort = $sort;
            $this->direction = 'asc';
        }
    }
}
