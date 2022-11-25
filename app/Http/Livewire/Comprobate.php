<?php

namespace App\Http\Livewire;
use App\Models\Comprobante;

use Livewire\Component;

class Comprobate extends Component
{
    //Definicion de variables
    public $search="";
    public $sort='id'; 
    public $direction ='desc';

    public $open = false;
    public $verifiEdit = false;

    public $nComp, $detall, $id_comprobante;

    protected $listeners = [ "deleteItem" => "delete_item" ];

    public function render(){
        $comprobantes = Comprobante::where('n_comprobante', 'like', '%' . $this->search . '%')
        ->orwhere('detalle', 'like', '%' . $this->search . '%')
        ->orderBy($this->sort, $this->direction)
        ->get();
        return view('livewire.comprobate', compact ('comprobantes'));
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
        Comprobante::updateOrCreate(['id'=>$this->id_comprobante],
        [
            'n_comprobante' => $this->nComp,
            'detalle' => $this->detall
        ]);
        $this->limpiarCampos();
        
        $this->open=false;
        $this->emit('saved');

        //Para alerta de Editado
        if($this->verifiEdit == true){
            $this->emit('edit');
        }
        $this->verifiEdit=false;
    }

    public function editar($id){
        $comprobante = Comprobante::findOrFail($id);
        $this->id_comprobante = $id;
        $this->nComp = $comprobante->n_comprobante;
        $this->detall = $comprobante->detalle;
        $this->open=true;
        $this->verifiEdit=true;
    }



    public function delete_item($id)
    {
        $data = Comprobante::find($id);

        if (!$data) {
            $this->emit("deleteResult", [
                "status" => false,
                "message" => "Error al eliminar datos" . $this->nComp
            ]);
            return;
        }

        $data->delete();
        $this->emit("deleteResult", [
            "status" => true,
            "message" => "Data " . $this->nComp . " Eliminado con éxito!"
        ]);
    }

    public function limpiarCampos(){
        $this->nComp = '';
        $this->detall = '';


    }
}
