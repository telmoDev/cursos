<div class="shadow p-2 mt-5 hover:border-2 hover:border-[#6b2b83]">
    {{-- Detalle del curso --}}
    <h3 class="text-lg">Syllabus</h3>

    <h4>Secciones ({{ count( $secciones ) }})</h4>
    @forelse( $secciones as $key => $seccion )
        <div class="shadow p-2 mt-3 mb-3 hover:border-2 hover:border-[#6b2b83] rounded-lg" x-data="{ open: false }">
          <label class="flex justify-center items-center text-white py-3 text-sm font-bold bg-[#6b2b83] rounded-lg text-center " @click="open = ! open">Sección #{{ $loop->index + 1 }} <span x-show="open" class="ml-4">@include('livewire.cursos._icons.arrow_up')</span><span x-show="!open" class="ml-4">@include('livewire.cursos._icons.arrow_down')</span></label>
          <div x-show="open" >
            <div class="seccion">
                <div class="box-entrada px-2 w-full mt-2">
                    <label class="block text-gray-700 text-sm font-bold mt-2" for="fecha_inicio">
                    Título de sección
                    </label>
                    <input
                        type="text"
                        class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 w-full block rounded-none rounded-r-md sm:text-sm border-gray-300"
                        placeholder="Título de sección"
                        wire:model.lazy="secciones.{{$key}}.titulo"
                    >
                    @error("secciones.{$key}.titulo")
                        <div class="text-red-600 text-sm">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            @include('livewire.cursos._partes._form._crear.form_contenidos')
            <div class="flex">
                <div class="rounded-lg bg-red-600 p-2" title="Eliminar Sección" wire:click="borrarSeccion({{ $key }})">
                    @include('livewire.cursos._icons.bin')
                </div>
            </div>
          </div>
        </div>
    @empty
        <div class="flex justify-center  opacity-50">
            <svg class="w-5 mr-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 317.001 317.001" style="enable-background:new 0 0 317.001 317.001;" xml:space="preserve">
                <path d="M270.825,70.55L212.17,3.66C210.13,1.334,207.187,0,204.093,0H55.941C49.076,0,43.51,5.566,43.51,12.431V304.57 c0,6.866,5.566,12.431,12.431,12.431h205.118c6.866,0,12.432-5.566,12.432-12.432V77.633 C273.491,75.027,272.544,72.51,270.825,70.55z M55.941,305.073V12.432H199.94v63.601c0,3.431,2.78,6.216,6.216,6.216h54.903 l0.006,222.824H55.941z"></path>
            </svg>
            No hay información
        </div>
    @endforelse

    <div class="flex justify-end">
        <x-jet-button wire:click="agregar_seccion" type="button" wire:loading.attr="disabled">
            + Sección
        </x-jet-button>
    </div>
</div>
