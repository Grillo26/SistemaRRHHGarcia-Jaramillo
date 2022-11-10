<?php

namespace App\Http\Livewire;
use App\Models\Producto;
use App\Models\Grupo; 
use App\Models\Cuenta; 
use App\Models\Unidad; 
use Livewire\Component;

class CreateProductos extends Component
{
    public $name, $codigo, $grupo, $cuenta, $unidad, $id_productos;

    public function render()
    {
        return view('livewire.create-productos',[
            'grupos'=>Grupo::get(),
            'cuentas'=>Cuenta::get(),
            'unidades'=>Unidad::get()
        ]);
    }

    public function guardar(){
        /*ModelsProducto::updateOrCreate(['id'=>$this->id_productos],[
            'codigo_producto' => $this->codigo,
            'nombre_producto' => $this->name,
            'unidad_idUnidad' => $this->unidad,
            'grupo_idGrupo' => $this->grupo,
            'cuenta_idCuenta' => $this->cuenta
        ]);*/

        Producto::create([
            'codigo_producto' => $this->codigo,
            'nombre_producto' => $this->name,
            'unidad_idUnidad' => $this->unidad,
            'grupo_idGrupo' => $this->grupo,
            'cuenta_idCuenta' => $this->cuenta
        ]);
        $this->limpiarCampos();
        $this->emit('saved');
    }

    public function limpiarCampos(){
        $this->name = '';
        $this->codigo = '';
        $this->unidad = '';
        $this->grupo ='';
        $this->cuenta= '';

    }
}
