<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Gestionar Rendimientos') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('rendimientos') }}">Gestionar Rendimientos</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.main name="rendimiento" :model="$rendimiento, $produccion"/>
    </div>
</x-app-layout>
