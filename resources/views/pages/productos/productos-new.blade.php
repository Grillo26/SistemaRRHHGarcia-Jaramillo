<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Nuevo Artículo') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Artículo</a></div>
            <div class="breadcrumb-item"><a href="{{ route('user') }}">Nuevo Artículo</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:create-productos />
    </div>
</x-app-layout>