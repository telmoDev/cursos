<x-app-layout>
    <x-slot name="header">
        {{ __('Listado') }}
    </x-slot>

    <div class="pyb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <livewire:users.roles />
        </div>
    </div>
</x-app-layout>
