<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Gestionar Balances') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('balance') }}">Gestionar Balances</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.main name="balance" :model="$balance, $produccion"/>
    </div>
</x-app-layout>
