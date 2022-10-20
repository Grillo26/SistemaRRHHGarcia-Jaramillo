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
    public $open = false;

    public $id_unidad,$nombre;
    
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

    public function guardar(){
        Unidad::updateOrCreate(['id'=>$this->id_unidad],
        [
            'nombre_unidad' => $this->nombre

        ]);
        $this->limpiarCampos();
        
        $this->open=false;
    }

    public function editar($id){
        $unidad = Unidad::findOrFail($id);
        $this->id_unidad = $id;
        $this->nombre = $unidad->nombre_unidad;
        $this->open=true;
        

    }

    public function borrar($id){
        Unidad::find($id)->delete();
        
    }

    public function limpiarCampos(){
        $this->nombre = '';

    }

}
