<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Añadir Producción') }}</h1>
        <div class="section-header-breadcrumb">
            
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="produccion">Producción</a></div>
        <div class="breadcrumb-item"><a href="{{ route('produccion.new') }}">Añadir Producción</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:create-produccion action="createProduccion" /> 
    </div>
</x-app-layout> 