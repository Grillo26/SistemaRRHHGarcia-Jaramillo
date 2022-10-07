<?php

namespace App\Http\Livewire;
use App\Models\Cuenta;

use Livewire\Component;

class Cuentas extends Component
{

    //Definicion de variables
    public $search="";
    public $sort='id';
    public $direction ='desc'; 

    public $open = false;
    public $nombre, $codigo;

    public function render(){
        $cuentas = Cuenta::where('nombre_cuenta', 'like', '%' . $this->search . '%')
        ->orwhere('codigo_cuenta', 'like', '%' . $this->search . '%')
        ->orderBy($this->sort, $this->direction)
        ->get();
        return view('livewire.cuentas', compact ('cuentas'));
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

    public function guardar(){
        Cuenta::create([
            'nombre_cuenta' => $this->nombre,
            'codigo_cuenta' => $this->codigo
        ]);
        $this->limpiarCampos();
        
        $this->open=false;
    }

    public function limpiarCampos(){
        $this->nombre = '';
        $this->codigo = '';

    }
    
}
