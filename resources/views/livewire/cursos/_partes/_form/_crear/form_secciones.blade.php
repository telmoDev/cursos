<div class="shadow p-2 mt-5 hover:border-2 hover:border-[#6b2b83]">
    {{-- Detalle del curso --}}
    <h3 class="text-lg">Syllabus</h3>

    <h4>Secciones ({{ count( $secciones ) }})</h4>
    @forelse( $secciones as $key => $seccion )
        <div class="shadow p-2 mt-3 mb-3 hover:border-2 hover:border-[#6b2b83]">
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

            <div class="shadow p-2 mt-3 mb-3">
                @forelse( $seccion['contenido'] as $keyc => $contenido )

                <div class="shadow p-2 mt-3 mb-3 hover:border-2 hover:border-[#6b2b83]">
                    <div class="box-entrada px-2 w-full mt-2">
                        <label class="block text-gray-700 text-sm font-bold mt-2" for="fecha_inicio">
                        Título contenido
                        </label>
                        <input
                            type="text"
                            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 w-full block rounded-none rounded-r-md sm:text-sm border-gray-300"
                            placeholder="Título de sección"
                            wire:model.lazy="secciones.{{$key}}.contenido.{{$keyc}}.titulo"
                        >
                        @error("secciones.{$key}.contenido.{$keyc}.titulo")
                            <div class="text-red-600 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="box-entrada px-2 w-full mt-2">
                        <label class="block text-gray-700 text-sm font-bold mt-2" for="fecha_inicio">
                        Subtitulo contenido
                        </label>
                        <input
                            type="text"
                            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 w-full block rounded-none rounded-r-md sm:text-sm border-gray-300"
                            placeholder="Título de sección"
                            wire:model.lazy="secciones.{{$key}}.contenido.{{$keyc}}.subtitulo"
                        >
                        @error("secciones.{$key}.contenido.{$keyc}.subtitulo")
                            <div class="text-red-600 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="box-entrada px-2 w-full mt-2">
                        <label for="countries" class="block text-gray-700 text-sm font-bold mt-2">Tipo de contenido</label>
                        <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" wire:model.lazy="secciones.{{$key}}.contenido.{{$keyc}}.cursos_contenido_tipo_id">
                        <option selected>Seleccione un tipo</option>
                        @foreach ($contenidoTipos as $item)
                            <option value="{{ $item->id }}">{{ $item->titulo }}</option>
                        @endforeach
                        </select>
                        @error("secciones.{$key}.contenido.{$keyc}.cursos_contenido_tipo_id")
                            <div class="text-red-600 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="box-entrada px-2 w-full mt-2">
                        <label class="block text-gray-700 text-sm font-bold mt-2" for="fecha_inicio">
                        Descripción contenido
                        </label>
                        <textarea
                            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 w-full block rounded-none rounded-r-md sm:text-sm border-gray-300"
                            wire:model.lazy="secciones.{{$key}}.contenido.{{$keyc}}.detalle"
                        ></textarea>
                        @error("secciones.{$key}.contenido.{$key}.detalle")
                            <div class="text-red-600 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex mt-2">
                        <div class="rounded-lg bg-red-600 p-2" title="Eliminar Contenido" wire:click="borrarContenido({{ $keyc }}, {{ $keyc }})">
                            @include('livewire.cursos._icons.bin')
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
                    <x-jet-button wire:click="agregar_contenido('{{$key}}')" type="button" wire:loading.attr="disabled">
                        + Contenido
                    </x-jet-button>
                </div>
            </div>
            <div class="flex">
                <div class="rounded-lg bg-red-600 p-2" title="Eliminar Sección" wire:click="borrarSeccion({{ $key }})">
                    @include('livewire.cursos._icons.bin')
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
