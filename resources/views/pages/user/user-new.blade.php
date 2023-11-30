<x-app-layout>
    <x-slot name="header_content">
        <div class="section-header-back">
              <a href="{{ route('user') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>{{ __('Crear Usuario') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Usuario</a></div>
            <div class="breadcrumb-item"><a href="{{ route('user') }}">Crear Usuario</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:create-user action="createUser" /> 
    </div>
</x-app-layout>
