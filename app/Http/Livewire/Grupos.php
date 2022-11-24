<?php

namespace App\Http\Livewire;
use App\Models\Grupo;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;


class Grupos extends Component
{
    //Definicion de variables
    public $search="";
    public $sort='id'; 
    public $direction ='desc';

    public $open = false;
    public $nombre, $grup, $cuenta, $partida, $id_grupo, $grupo;

    protected $listeners = [ "deleteItem" => "delete_item" ];

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

    public function guardar(){
        Grupo::updateOrCreate(['id'=>$this->id_grupo],
        [
            'nombre_grupo' => $this->nombre,
            'grupo' => $this->grup,
            'cuenta_a' => $this->cuenta,
            'partida_a' => $this->partida
        ]);
        $this->limpiarCampos();
        
        $this->open=false;
        $this->emit('saved');
    }

    public function editar($id){
        $grupo = Grupo::findOrFail($id);
        $this->id_grupo = $id;
        $this->nombre = $grupo->nombre_grupo;
        $this->grup = $grupo->grupo;
        $this->cuenta = $grupo->cuenta_a;
        $this->partida = $grupo->partida_a;
        $this->open=true;
    }



    public function delete_item($id)
    {
        $data = Grupo::find($id);

        if (!$data) {
            $this->emit("deleteResult", [
                "status" => false,
                "message" => "Error al eliminar datos" . $this->nombre
            ]);
            return;
        }

        $data->delete();
        $this->emit("deleteResult", [
            "status" => true,
            "message" => "Data " . $this->nombre . " Eliminado con éxito!"
        ]);
    }

    public function limpiarCampos(){
        $this->nombre = '';
        $this->grup = '';
        $this->cuenta = '';
        $this->partida ='';
        

    }
}
