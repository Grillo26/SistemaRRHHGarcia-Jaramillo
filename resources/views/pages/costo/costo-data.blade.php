<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Gestionar Costos') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('produccion') }}">Gestionar Costos</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.main name="costo" :model="$costo, $produccion"/>
    </div>
</x-app-layout>
