<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Autor Listado') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white  sm:rounded-lg">
                <livewire:autor.listas  :autorid="$autor->id" />
            </div>
        </div>
    </div>

</x-guest-layout>
