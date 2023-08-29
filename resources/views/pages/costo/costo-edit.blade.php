<x-app-layout>
    <x-slot name="header_content">
        <div class="section-header-back">
              <a href="{{ route('costo') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>{{ __('Editar Costo') }}</h1>
        
        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item active"><a href="{{ route('costo') }}">Producción</a></div>
            <div class="breadcrumb-item"><a href="#">Editar Costos</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:create-costo action="updateCosto" :costoId="request()->costoId" />
    </div>
</x-app-layout>
