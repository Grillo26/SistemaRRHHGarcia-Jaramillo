<?php

namespace App\Http\Livewire;

use App\Models\Produccion;
use App\Models\Turno;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class createProduccion extends Component
{
    public $produccion;
    public $produccionId;
    public $action;
    public $button;
    public $turno;

    
    protected function getRules()
    {
        $rules = ($this->action == "updateProduccion") ? [
            'produccion.granoDeSoya' => 'required|min:8|',
            'produccion.merma' => 'required|min:8|',
            'produccion.idTurno' => 'required|min:8|',
            'produccion.fecha' => 'required|min:8|',
            'produccion.humedad' => 'required|min:8|',
            'produccion.bolsas' => 'required|min:8|',
            'produccion.aceite' => 'required|min:8|',
        ] : [
            'user.password' => 'required|min:8|confirmed',
            'user.password_confirmation' => 'required' // livewire need this
        ];

        return array_merge([
            'produccion.granoDeSoya' => 'required|min:3',
            'produccion.merma' => 'required|min:3'
        ], $rules);
    }
    public function createProduccion ()
    {

        Produccion::create($this->produccion);

        $this->emit('saved');
        $this->reset('produccion'); 
    }

    public function updateProduccion ()
    {
        
        Produccion::query()
            ->where('id', $this->produccionId)
            ->update([
                "granoDeSoya" => $this->produccion->granoDeSoya,
                "merma" => $this->produccion->merma,
                "idTurno" => $this->produccion->idTurno,
                "fecha" => $this->produccion->fecha,
                "humedad" => $this->produccion->humedad,
                "bolsas" => $this->produccion->bolsas,
                "aceite" => $this->produccion->aceite,
                
            ]);

        $this->emit('saved');
    }


    public function mount ()
    {
        if (!$this->produccion && $this->produccionId) {
                $this->produccion = Produccion::find($this->produccionId);
        }

        $this->button = create_button($this->action, "Produccion");
    }

    public function render()
    {
        return view('livewire.create-produccion',[
            'turnos'=>Turno::get()
        ]
    );
    }
}
