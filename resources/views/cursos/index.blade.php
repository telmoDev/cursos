<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="background-image: url(/img/FondoHeader.jpg);">
            {{ __('Curso') }}
        </h2>
    </x-slot>

    <div class="pt-12">
                <livewire:cursos.index :curso="$curso" />
    </div>

</x-guest-layout>
