<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Gestionar Producción') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('produccion') }}">Gestionar Producción</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.main name="produccion" :model="$produccion" :model1="$turno"/>
    </div>
</x-app-layout>
