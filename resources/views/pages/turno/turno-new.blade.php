<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Crear Turno') }}</h1>
        <div class="section-header-breadcrumb">
            
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Usuario</a></div>
        <div class="breadcrumb-item"><a href="{{ route('turno') }}">Crear Usuario</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:create-turno action="createTurno" /> 
    </div>
</x-app-layout>