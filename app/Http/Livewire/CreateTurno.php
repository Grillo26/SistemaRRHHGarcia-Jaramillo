<?php

namespace App\Http\Livewire;

use App\Models\Turno;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class CreateTurno extends Component
{
    public $turno;
    public $turnoId;
    public $action;
    public $button;

    

    public function createTurno ()
    {

        Turno::create($this->turno);

        $this->emit('saved');
        $this->reset('turno'); 
    }

    public function updateTurno ()
    {
        
        Turno::query()
            ->where('id', $this->turnoId)
            ->update([
                "nombreTurno" => $this->turno->nombreTurno,
                "descripcion" => $this->turno->descripcion,
                
            ]);

        $this->emit('saved');
    }


    public function mount ()
    {
        if (!$this->turno && $this->turnoId) {
            $this->turno = Turno::find($this->turnoId);
        }

        $this->button = create_button($this->action, "Turno");
    }

    public function render()
    {
        return view('livewire.create-turno');
    }
}
