<x-contenedor>
    {{-- Detalle del curso --}}
    <h3 class="text-lg">Syllabus</h3>

    <h4>Modulos ({{ count( $modulos ) }})</h4>
    @forelse( $modulos as $key => $modulo )
        <x-acordeon tipo="Modulo" numero="{{ $loop->index + 1 }}">

            <div class="seccion">
                <div class="box-entrada px-2 w-full mt-2">
                    <label class="block text-gray-700 text-sm font-bold mt-2" for="fecha_inicio">
                    Título del modulo
                    </label>
                    <input
                        type="text"
                        class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 w-full block rounded-none rounded-r-md sm:text-sm border-gray-300"
                        placeholder="Título de sección"
                        wire:model.lazy="modulos.{{$key}}.titulo"
                    >
                    @error("modulos.{$key}.titulo")
                        <div class="text-red-600 text-sm">{{ $message }}</div>
                    @enderror
                </div>
            </div>


            @include('livewire.cursos._partes._form._crear.form_clases', [
              'moduloKey' => $loop->index
            ])
            <div class="flex">
                <div class="rounded-lg bg-red-600 p-2" title="Eliminar Sección" wire:click.lazy="borrarModelo({{ $key }})">
                    @include('livewire.cursos._icons.bin')
                </div>
            </div>
        </x-acordeon>
    @empty
        <div class="flex justify-center  opacity-50">
            <svg class="w-5 mr-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 317.001 317.001" style="enable-background:new 0 0 317.001 317.001;" xml:space="preserve">
                <path d="M270.825,70.55L212.17,3.66C210.13,1.334,207.187,0,204.093,0H55.941C49.076,0,43.51,5.566,43.51,12.431V304.57 c0,6.866,5.566,12.431,12.431,12.431h205.118c6.866,0,12.432-5.566,12.432-12.432V77.633 C273.491,75.027,272.544,72.51,270.825,70.55z M55.941,305.073V12.432H199.94v63.601c0,3.431,2.78,6.216,6.216,6.216h54.903 l0.006,222.824H55.941z"></path>
            </svg>
            No hay información
        </div>
    @endforelse

    <div class="flex justify-end">
        <x-jet-button wire:click.lazy="agregarModulo" type="button" >
            + Módulo
        </x-jet-button>
    </div>
</x-contenedor>
