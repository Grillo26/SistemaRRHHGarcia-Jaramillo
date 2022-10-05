<?php

namespace App\Http\Livewire;
use App\Models\Grupo;
use Livewire\Component;

class Grupos extends Component
{
    //Definicion de variables
    public $search="";
    public $sort='id';
    public $direction ='desc';

    public function render(){
        $grupos = Grupo::where('nombre_grupo', 'like', '%' . $this->search . '%')
        ->orwhere('grupo', 'like', '%' . $this->search . '%')
        ->orwhere('cuenta_a', 'like', '%' . $this->search . '%')
        ->orwhere('partida_a', 'like', '%' . $this->search . '%')
        ->orderBy($this->sort, $this->direction)
        ->get();
        return view('livewire.grupos', compact ('grupos'));
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
