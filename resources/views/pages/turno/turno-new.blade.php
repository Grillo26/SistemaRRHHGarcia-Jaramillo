<x-app-layout>
    <x-slot name="header_content">
        <div class="section-header-back">
              <a href="{{ route('turno') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>{{ __('Crear Turno') }}</h1>
        <div class="section-header-breadcrumb">
            
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="{{ route('turno') }}">Turno</a></div>
        <div class="breadcrumb-item"><a href="{{ route('turno.new') }}">Crear Turno</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:create-turno action="createTurno" /> 
    </div>
</x-app-layout>