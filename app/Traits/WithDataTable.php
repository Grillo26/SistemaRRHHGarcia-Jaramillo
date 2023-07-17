<?php

namespace App\Traits;

use App\Models\Turno;
trait WithDataTable {
    
    public function get_pagination_data ()
    {
        switch ($this->name) {
            case 'user':
                $users = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.user',
                    "users" => $users,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('user.new'),
                            'create_new_text' => 'Nuevo Usuario',
                            'export' => '#',
                            'export_text' => 'Exportar'
                        ]
                    ])
                ];
                break;
            case 'turno':
                $turnos = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.turno',
                    "turnos" => $turnos,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('turno.new'),
                            'create_new_text' => 'Nuevo Turno',
                            'export' => '#',
                            'export_text' => 'Exportar'
                        ]
                    ])
                ];
                break;
            case 'produccion':
                $produccions = $this->model::search($this->search)
                        ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                        ->paginate($this->perPage);
                $turnos = Turno::get(); //Extrayendo de otra tabla
    
                return [
                        "view" => 'livewire.table.produccion',
                        "produccions" => $produccions,
                        "turnos"=>$turnos,
                        "data" => array_to_object([
                            'href' => [
                                'create_new' => route('produccion.new'),
                                'create_new_text' => 'Nuevo Balance',
                                'export' => '#',
                                'export_text' => 'Exportar'
                            ]
                        ])
                ];


            default:
                # code...
                break;
        } 
    }
}