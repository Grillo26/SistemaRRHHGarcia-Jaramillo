<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Grupo; 
use App\Models\Cuenta; 
use App\Models\Unidad;
use App\Models\Producto;


class Productos extends Component
{
    //Definicion de variables
    public $search="";
    public $sort='id';
    public $direction ='desc';

    public $open = false;
    public $open2 = false;

    protected $listeners = [ "deleteItem" => "delete_item" ];

    public $codigoProd, $nombreProd, $unidadId, $grupoId, $cuentaId, $id_producto;

    public function render(){
        $productos = Producto::where('codigo_producto', 'like', '%' . $this->search . '%')
        ->orwhere('nombre_producto', 'like', '%' . $this->search . '%')
        ->orwhere('unidad_idUnidad', 'like', '%' . $this->search . '%')
        ->orwhere('grupo_idGrupo', 'like', '%' . $this->search . '%')
        ->orwhere('cuenta_idCuenta', 'like', '%' . $this->search . '%')
        ->orderBy($this->sort, $this->direction)
        ->get();
        return view('livewire.productos', compact ('productos'),[
            'grupos'=>Grupo::get(),
            'cuentas'=>Cuenta::get(),
            'unidades'=>Unidad::get()
        ]);
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
        Producto::updateOrCreate(['id'=>$this->id_producto],
        [
            'codigo_producto' => $this->codigoProd,
            'nombre_producto' => $this->nombreProd,
            'unidad_idUnidad' => $this->unidadId,
            'grupo_idGrupo' => $this->grupoId,
            'cuenta_idCuenta' => $this->cuentaId
        ]);
        $this->limpiarCampos();
        
        $this->open=false;
        $this->emit('saved');
    }

    public function editar($id){
        $producto = Producto::findOrFail($id);
        $this->id_producto = $id;
        $this->codigoProd = $producto->codigo_producto;
        $this->nombreProd = $producto->nombre_producto;
        $this->unidadId = $producto->unidad_idUnidad;
        $this->grupoId = $producto->grupo_idGrupo;
        $this->cuentaId = $producto->cuenta_idCuenta;
        $this->open=true;
    }

    public function delete_item($id)
    {
        $data = Producto::find($id);

        if (!$data) {
            $this->emit("deleteResult", [
                "status" => false,
                "message" => "Error al eliminar datos" . $this->nombreProd
            ]);
            return;
        }

        $data->delete();
        $this->emit("deleteResult", [
            "status" => true,
            "message" => "Data " . $this->nombreProd . " Eliminado con éxito!"
        ]);
    }

    public function limpiarCampos(){
        $this->codigoProd = '';
        $this->nombreProd = '';
        $this->unidadProd = '';
        $this->unidadId ='';
        $this->grupoId ='';
        $this->cuentaId ='';

    }

    public function salida($id){
        $producto = Producto::findOrFail($id);
        $this->id_producto = $id;
        $this->codigoProd = $producto->codigo_producto;
        $this->nombreProd = $producto->nombre_producto;
        $this->unidadId = $producto->unidad_idUnidad;
        $this->grupoId = $producto->grupo_idGrupo;
        $this->cuentaId = $producto->cuenta_idCuenta;
        $this->open2=true;
    }
}
