<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Editar Turno') }}         
            <small><a href="https://demo.backpackforlaravel.com/admin/user" class="d-print-none font-sm"><i class="fa fa-angle-double-left"></i>Back to all </small>
        </h1>
        
        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Turno</a></div>
            <div class="breadcrumb-item"><a href="{{ route('user') }}">Editar Truno</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:create-turno action="updateTurno" :turnoId="request()->turnoId" />
    </div>
</x-app-layout>