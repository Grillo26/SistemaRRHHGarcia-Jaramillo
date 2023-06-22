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
        <h1>{{ __('Editar Producción') }}         
            <h5  class="pt-2 pl-2"><a href="{{ route('produccion') }}"><i class="fa  fa-angle-double-left"></i>Volver</h5>
        </h1>
        
        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('produccion') }}">Turno</a></div>
            <div class="breadcrumb-item"><a href="#">Editar Producción</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:create-produccion action="updateProduccion" :produccionId="request()->produccionId" />
    </div>
</x-app-layout>
