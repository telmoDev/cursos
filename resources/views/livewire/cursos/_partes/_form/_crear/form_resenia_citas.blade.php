<h3 class="text-lg">Información Reseña</h3>
<div class="box-entrada px-2 w-full mt-2">
    <label class="block text-gray-700 text-sm font-bold mt-2" for="fecha_inicio">
        Descripción
    </label>
    <textarea
        class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 w-full block rounded-none rounded-r-md sm:text-sm border-gray-300"
        wire:model.lazy="curso.descripcion_referencia"></textarea>
    @error('curso.nombre')
        <div class="text-red-600 text-sm">{{ $message }}</div>
    @enderror
</div>
<div class="block mt-2 p-2">
    <h4 class=" text-gray-700 text-sm font-bold ">Citas</h4>
    @forelse ($citas as $cita)
        <div class="hover:border-2 hover:border-[#6b2b83] p-2 mt-2 border">
            <label class="block text-gray-700 text-sm font-bold mt-2 text-center">Cita #{{ $loop->index + 1 }}</label>
            <div class="box-entrada px-2 w-full mt-2 hover:order-1 hover:">
                <label class="block text-gray-700 text-sm font-bold mt-2" for="fecha_inicio">
                    Autor
                </label>
                <input type="text"
                    class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 w-full block rounded-none rounded-r-md sm:text-sm border-gray-300"
                    placeholder="Nombre del autor " wire:model.lazy="citas.{{$loop->index}}.autor">
                {{-- @error("secciones.{$key}.contenido.{$keyc}.subtitulo")
                                <div class="text-red-600 text-sm">{{ $message }}</div>
                            @enderror --}}
            </div>
            <div class="box-entrada px-2 w-full mt-2 hover:order-1 hover:">
                <label class="block text-gray-700 text-sm font-bold mt-2" for="fecha_inicio">
                    Profesión
                </label>
                <input type="text"
                    class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 w-full block rounded-none rounded-r-md sm:text-sm border-gray-300"
                    placeholder="DIGITAL MARKETING, MANAGER EN PHILIPS, ..." wire:model.lazy="citas.{{$loop->index}}.profesion">
                {{-- @error("secciones.{$key}.contenido.{$keyc}.subtitulo")
                                <div class="text-red-600 text-sm">{{ $message }}</div>
                            @enderror --}}
            </div>

            <div class="box-entrada px-2 w-full mt-2">
              <label class="block text-gray-700 text-sm font-bold mt-2" for="fecha_inicio">
                  Foto( 100px x 100px )
              </label>
              <div class="relative {{ $citas[$loop->index]['imagen'] ? 'my-2' : '' }}" style="width: fit-content">
                  @if ($citas[$loop->index]['imagen'])
                      <span class="absolute right-2 top-2 cursor-pointer" wire:click="borrarImgCita({{ $loop->index }})">
                          @include('livewire.cursos._icons.cancel')
                      </span>
                      <img src="{{ $citas[$loop->index]['imagen']->temporaryUrl() }}" class="p-0" style="width: 250px;max-height: 250px;">
                  @endif
              </div>
              <input class="btn-file rounded-lg bg-indigo-500 " type="file" accept="image/*" wire:model.lazy="citas.{{$loop->index}}.imagen">
          </div>

            <div class="box-entrada px-2 w-full mt-2">
                <label class="block text-gray-700 text-sm font-bold mt-2" for="fecha_inicio">
                    Detalle
                </label>
                <textarea
                    class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 w-full block rounded-none rounded-r-md sm:text-sm border-gray-300"
                    wire:model.lazy="citas.{{$loop->index}}.detalle"></textarea>
                {{-- @error("secciones.{$key}.contenido.{$key}.detalle")
                                <div class="text-red-600 text-sm">{{ $message }}</div>
                            @enderror --}}
            </div>
            <div class="flex mt-2">
                <div class="rounded-lg bg-red-600 p-2" title="Eliminar Cita"
                    wire:click="borrarCita({{ $loop->index }})">
                    @include('livewire.cursos._icons.bin')
                </div>
            </div>
        </div>
    @empty
        <div class="flex justify-center  opacity-50">
            <svg class="w-5 mr-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                x="0px" y="0px" viewBox="0 0 317.001 317.001"
                style="enable-background:new 0 0 317.001 317.001;" xml:space="preserve">
                <path
                    d="M270.825,70.55L212.17,3.66C210.13,1.334,207.187,0,204.093,0H55.941C49.076,0,43.51,5.566,43.51,12.431V304.57 c0,6.866,5.566,12.431,12.431,12.431h205.118c6.866,0,12.432-5.566,12.432-12.432V77.633 C273.491,75.027,272.544,72.51,270.825,70.55z M55.941,305.073V12.432H199.94v63.601c0,3.431,2.78,6.216,6.216,6.216h54.903 l0.006,222.824H55.941z">
                </path>
            </svg>
            No hay información
        </div>
    @endforelse
    <div class="flex justify-end mt-2">
        <x-jet-button wire:click="agregar_cita" type="button" wire:loading.attr="disabled">
            + Cita
        </x-jet-button>
    </div>
</div>
