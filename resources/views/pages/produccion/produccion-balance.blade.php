<x-app-layout>
    <x-slot name="header_content">
    <div class="section-header-back">
              <a href="{{ route('produccion') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
    </div>
        <h1>{{ __('Balance Produccion') }}</h1>
        
        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('produccion') }}">Gestionar Producción</a></div>
            <div class="breadcrumb-item"><a href="#">Balance de Producción</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:create-balance action="generatePdf" :produccionId="request()->produccionId" />
    </div>
</x-app-layout>
