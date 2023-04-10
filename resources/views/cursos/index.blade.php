<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="background-image: url(/img/FondoHeader.jpg);">
            {{ __('Curso') }}
        </h2>
    </x-slot>

    <div >
      <div class="py-2 bg-[#6C2B84]">

      </div>
      <livewire:cursos.index :curso="$curso" />
    </div>

</x-guest-layout>
