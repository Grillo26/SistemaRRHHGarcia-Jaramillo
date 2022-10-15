<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Unidad;


class Unidades extends Component
{
    //Declaración de variables
    public $search="";
    public $sort='id';
    public $direction ='desc';
    public function render()
    {
        $unidades = Unidad::where('id', 'like', '%' . $this->search . '%')
        ->orwhere('nombre_unidad', 'like', '%' . $this->search . '%')
        ->orderBy($this->sort, $this->direction)
        ->get();
        return view('livewire.unidades', compact ('unidades'));
    }

    public function order($sort){
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
