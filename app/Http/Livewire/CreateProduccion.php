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
        $this->reset('turno'); 
    }

    public function updateProduccion ()
    {
        
        Produccion::query()
            ->where('id', $this->produccionId)
            ->update([
                "granoDeSoya" => $this->turno->nombreTurno,
                "merma" => $this->turno->descripcion,
                "idTurno" => $this->turno->descripcion,
                "fecha" => $this->turno->descripcion,
                "humedad" => $this->turno->descripcion,
                "bolsas" => $this->turno->descripcion,
                "aceite" => $this->turno->descripcion,
                
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
