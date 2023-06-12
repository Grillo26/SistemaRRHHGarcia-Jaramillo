<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Gestionar Turnos') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Usuarios</a></div>
            <div class="breadcrumb-item"><a href="{{ route('turno') }}">Gestionar Turnos</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.main name="turno" :model="$turno" />
    </div>
</x-app-layout>
