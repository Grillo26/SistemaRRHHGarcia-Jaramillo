<?php

namespace App\Traits;

use App\Models\Turno;
use App\Models\Produccion;
use App\Models\Balance;
use App\Models\Costo;
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
                $costos = Costo::get(); //Extrayendo de otra tabla
    
                return [
                        "view" => 'livewire.table.produccion',
                        "produccions" => $produccions,
                        "turnos"=>$turnos,
                        "costos"=>$costos,
                        "data" => array_to_object([
                            'href' => [
                                'create_new' => route('produccion.new'),
                                'create_new_text' => 'Nueva Producción',
                                'export' => '#',
                                'export_text' => 'Exportar'
                            ]
                        ])
                ];
                break;

            case 'balance':
                $balances = $this->model::search($this->search)
                        ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                        ->paginate($this->perPage);
                $produccions = Produccion::get(); //Extrayendo de otra tabla
                return [
                        "view" => 'livewire.table.balance',
                        "balances" => $balances,
                        "produccions" => $produccions,
                        "data" => array_to_object([
                            'href' => [
                                'create_new' => route('produccion.new'),
                                'create_new_text' => 'Nuevo Balance',
                                'export' => '#',
                                'export_text' => 'Exportar'
                            ]
                        ])
                ];
                break;
                
            case 'costo':
                $costos = $this->model::search($this->search)
                        ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                        ->paginate($this->perPage);
                return [
                        "view" => 'livewire.table.costo',
                        "costos" => $costos,
                        "data" => array_to_object([
                            'href' => [
                                'create_new' => route('costo.new'),
                                'create_new_text' => 'Nuevo Costo',
                                'export' => '#',
                                'export_text' => 'Exportar'
                            ]
                        ])
                ];
                break;


            default:
                # code...
                break;
        } 
    }
}