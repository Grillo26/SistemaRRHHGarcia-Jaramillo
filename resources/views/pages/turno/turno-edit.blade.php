<x-app-layout>
    <x-slot name="header_content">
        <style> 
            a:link{
                text-decoration:none
            }
            a:visited{
                text-decoration:none
            }
        </style>
        <h1>{{ __('Editar Turno ') }}   
            <h5  class="pt-2 pl-2"><a href="{{ route('turno') }}"><i class="fa fa-angle-double-left"></i>Volver</h5>
        </h1>
        
        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Turno</a></div>
            <div class="breadcrumb-item"><a href="#">Editar Truno</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:create-turno action="updateTurno" :turnoId="request()->turnoId" />
    </div>
</x-app-layout>
