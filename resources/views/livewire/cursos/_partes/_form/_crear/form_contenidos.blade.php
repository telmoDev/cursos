<x-contenedor>
    @forelse( $modulos[$moduloKey]['clases'][$claseKey]['contenido'] as $keyc => $contenido )
        <x-acordeon tipo="Contenido" numero="{{ $loop->index + 1 }}">


                <div class="box-entrada px-2 w-full mt-2">
                    <label for="countries" class="block text-gray-700 text-sm font-bold mt-2">Tipo de contenido</label>
                    <select id="countries"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        wire:model.lazy="modulos.{{$moduloKey}}.clases.{{$claseKey}}.contenido.{{ $keyc }}.cursos_contenido_tipo_id">
                        <option selected>Seleccione un tipo</option>
                        @foreach ($contenidoTipos as $item)
                            <option value="{{ $item->id }}">{{ $item->titulo }}</option>
                        @endforeach
                    </select>
                    @error("secciones.{$key}.contenido.{$keyc}.cursos_contenido_tipo_id")
                        <div class="text-red-600 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                @if (in_array($modulos[$moduloKey]['clases'][$claseKey]['contenido'][$keyc]['cursos_contenido_tipo_id'], [1]))
                    <div class="box-entrada px-2 w-full mt-2">
                        <label class="block text-gray-700 text-sm font-bold mt-2" for="fecha_inicio">
                            Título
                        </label>
                        <input type="text"
                            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 w-full block rounded-none rounded-r-md sm:text-sm border-gray-300"
                            placeholder="Título de sección"
                            wire:model.lazy="secciones.{{ $key }}.contenido.{{ $keyc }}.titulo">
                        @error("secciones.{$key}.contenido.{$keyc}.titulo")
                            <div class="text-red-600 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="box-entrada px-2 w-full mt-2">
                        <label class="block text-gray-700 text-sm font-bold mt-2" for="fecha_inicio">
                            Contenido
                        </label>
                        <input type="text"
                            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 w-full block rounded-none rounded-r-md sm:text-sm border-gray-300"
                            placeholder="Título de sección"
                            wire:model.lazy="secciones.{{ $key }}.contenido.{{ $keyc }}.subtitulo">
                        @error("secciones.{$key}.contenido.{$keyc}.subtitulo")
                            <div class="text-red-600 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                @endif
                @if (in_array($modulos[$moduloKey]['clases'][$claseKey]['contenido'][$keyc]['cursos_contenido_tipo_id'], [2]))
                    <div class="box-entrada px-2 w-full mt-2">
                        <label for="countries" class="block text-gray-700 text-sm font-bold mt-2">Video(frame)</label>

                        <textarea
                            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 w-full block rounded-none rounded-r-md sm:text-sm border-gray-300"
                            wire:model.lazy="secciones.{{ $key }}.contenido.{{ $keyc }}.recurso"></textarea>
                        @error("secciones.{$key}.contenido.{$keyc}.recurso")
                            <div class="text-red-600 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                @endif

                @if (in_array($modulos[$moduloKey]['clases'][$claseKey]['contenido'][$keyc]['cursos_contenido_tipo_id'], [3, 4]))
                    <div class="box-entrada px-2 w-full mt-2">
                        <label class="block text-gray-700 text-sm font-bold mt-2" for="fecha_inicio">
                            Descripción contenido
                        </label>
                        <textarea
                            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 w-full block rounded-none rounded-r-md sm:text-sm border-gray-300"
                            wire:model.lazy="secciones.{{ $key }}.contenido.{{ $keyc }}.detalle"></textarea>
                        @error("secciones.{$key}.contenido.{$key}.detalle")
                            <div class="text-red-600 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                @endif


                @if (in_array($modulos[$moduloKey]['clases'][$claseKey]['contenido'][$keyc]['cursos_contenido_tipo_id'], [3, 4]))
                    <div class="box-entrada flex px-2 w-full mt-2">
                        @if (in_array($modulos[$moduloKey]['clases'][$claseKey]['contenido'][$keyc]['cursos_contenido_tipo_id'], [3]))
                            <div class="box-entrada px-2 w-full mt-2">
                                <div>
                                    <label class=" text-gray-700 text-sm font-bold mr-2">
                                        Contenido para descargar
                                    </label>
                                </div>
                                <div class="" style="width: fit-content">
                                    @if ($modulos[$moduloKey]['clases'][$claseKey]['contenido'][$keyc]['contenido_download'])
                                        <div class="my-2 mx-auto relative" style="width: 75px">
                                            <span class="absolute cursor-pointer" style="top: -3px; right: -3px;"
                                                wire:click="borrarContenidoDownload({{ $key }}, {{ $keyc }})">
                                                @include('livewire.cursos._icons.cancel')
                                            </span>
                                            @include('livewire.cursos._icons.file_download')
                                        </div>
                                    @endif
                                    <input class="btn-contenido rounded-lg bg-indigo-500 " type="file"
                                        wire:model.lazy="secciones.{{ $key }}.contenido.{{ $keyc }}.contenido_download">
                                </div>
                            </div>
                        @endif

                        <div class="box-entrada px-2 w-full mt-2">
                            <div>
                                <label class=" text-gray-700 text-sm font-bold mr-2">
                                    Imagen de fondo
                                </label>
                            </div>
                            <div class="" style="width: fit-content">
                                @if ($modulos[$moduloKey]['clases'][$claseKey]['contenido'][$keyc]['img_fondo'])
                                    <div class="my-2 mx-auto relative" style="width: 75px">
                                        <span class="absolute cursor-pointer" style="top: -3px; right: -3px;"
                                            wire:click="borrarImgFondo({{ $key }}, {{ $keyc }})">
                                            @include('livewire.cursos._icons.cancel')
                                        </span>
                                        @php
                $path = storage_path()."/app/cursos/{$curso->id}/fondo/{$modulos[$moduloKey]['clases'][$claseKey]['contenido'][$keyc]['id']}/{$modulos[$moduloKey]['clases'][$claseKey]['contenido'][$keyc]['img_fondo']}";
              @endphp

              @if (\File::exists($path))
                <img src="{{ route('contenido.fondo.img', [ 'folder' => $curso->id, 'folder2' => $modulos[$moduloKey]['clases'][$claseKey]['contenido'][$keyc]['id'], 'filename' => $modulos[$moduloKey]['clases'][$claseKey]['contenido'][$keyc]['img_fondo'] ]) }}" style="width: 150px; max-height: 150px">
              @else
                <img src="{{ $modulos[$moduloKey]['clases'][$claseKey]['contenido'][$keyc]['img_fondo']->temporaryUrl() }}" style="width: 150px; max-height: 150px">
              @endif
                                    </div>
                                @endif
                                <input class="btn-contenido rounded-lg bg-indigo-500 " type="file" accept="image/*"
                                    wire:model.lazy="secciones.{{ $key }}.contenido.{{ $keyc }}.img_fondo">
                            </div>
                        </div>

                    </div>
                @endif

                <div class="flex mt-3">
                    <div class="rounded-lg bg-red-600 p-2" title="Eliminar Sección"
                        wire:click="borrarContenido({{ $key }}, {{ $keyc }})">
                        @include('livewire.cursos._icons.bin')
                    </div>
                </div>

        </x-acordeon>
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
    <div class="flex justify-end">
        <x-jet-button wire:click="agregar_contenido({{$moduloKey}}, {{$claseKey}})" type="button"
            wire:loading.attr="disabled">
            + Contenido
        </x-jet-button>
    </div>
</x-contenedor>
