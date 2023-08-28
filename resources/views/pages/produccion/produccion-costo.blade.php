<x-app-layout>
    <x-slot name="header_content">
        <div class="section-header-back">
              <a href="{{ route('produccion') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>{{ __('Costo de Producción') }}</h1>
        
        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item active"><a href="{{ route('produccion') }}">Producción</a></div>
            <div class="breadcrumb-item"><a href="#">Añadir Costo</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:create-produccion action="costoProduccion" :produccionId="request()->produccionId" />
    </div>
</x-app-layout>
