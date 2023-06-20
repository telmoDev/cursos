<h3 class="text-lg">Información General</h3>
@if (!empty($enlaceCurso))
    <a class="text-[#5E2880] px-2" href="{{ route('curso', $enlaceCurso) }}">{{ route('curso', $enlaceCurso) }}</a>
@endif

<x-input wire:model.lazy="curso.nombre" error="curso.nombre" placeholder="Nombre" label="Nombre" />
<x-input wire:model.lazy="curso.slug" error="curso.slug" disabled placeholder="Automático" label="Slug" />


<div class="flex">
    <x-textarea wire:model.lazy="curso.descripcion_larga" error="curso.descripcion_larga" label="Descripción larga" />
    <x-textarea wire:model.lazy="curso.descripcion_corta" error="curso.descripcion_corta" label="Descripción corta" />
</div>
<x-input wire:model.lazy="curso.link_video" error="curso.link_video" placeholder="url..."
    label="Video (introducción)" />
<div class="flex">
    <x-input wire:model.lazy="curso.hora" error="curso.hora" placeholder="Hora..." label="Hora" />

    <x-input wire:model.lazy="curso.precio" error="curso.precio" style="padding-left: 25px" label="Precio">
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <span class="text-gray-500 sm:text-sm"> $ </span>
        </div>
    </x-input>
</div>

<div class="box-entrada px-2 w-full mt-2">
    <label class="block text-gray-700 text-sm font-bold mt-2" for="fecha_inicio">
        Imagen del curso ( 250px x 250px )
    </label>
    <div class="relative {{ $imagenCurso ? 'my-2' : '' }}" style="width: fit-content">
        @if ($imagenCurso)
            <span class="absolute right-2 top-2 cursor-pointer"
                onclick="confirm('Esta seguro que desea eliminar esta imagen.') || event.stopImmediatePropagation()"
                wire:click="borrarImagen">
                @include('livewire.cursos._icons.cancel')
            </span>
            @php
                $imagen = '';
                try {
                    $imagen = route('img.bg.curso', ['folder' => $curso->id, 'filename' => $this->curso->imagen]);
                } catch (\Throwable $th) {
                    //throw $th;
                    $imagen = $imagenCurso->temporaryUrl();
                }
            @endphp
            <img src="{{ $imagen }}" class="p-0" style="width: 150px;max-height: 150px;">
        @endif
    </div>
    <input class="btn-file rounded-lg bg-indigo-500 " type="file" accept="image/*" wire:model.lazy="imagenCurso">
    @error('curso.imagen')
        <div class="text-red-600 text-sm">{{ $message }}</div>
    @enderror
</div>
{{-- Seccion --}}
<hr class="my-5">
<div class="hover:border-2 hover:border-[#6b2b83] p-2 border">
    <h3 class="text-lg">Información - Sección con video</h3>
    <x-input wire:model.lazy="curso.seccion_titulo" error="curso.seccion_titulo" placeholder="Titulo..."
        label="Titulo" />
    <x-input wire:model.lazy="curso.seccion_subtitulo" error="curso.seccion_subtitulo" placeholder="Subtitulo..."
        label="Subtitulo" />
    <x-input wire:model.lazy="curso.seccion_link_video" error="curso.seccion_link_video" placeholder="url..."
        label="Video" />
    <x-textarea wire:model.lazy="curso.seccion_detalle" error="curso.seccion_detalle" label="Detalle" />
</div>
{{-- end Seccion --}}

{{-- maestros --}}
<hr class="my-5">
<div class="hover:border-2 hover:border-[#6b2b83] p-2 border">
    <h3 class="text-lg">Maestros</h3>
    <x-input wire:model.lazy="curso.seccion_titulo" error="curso.seccion_titulo" placeholder="Titulo..."
        label="Titulo" />
    <x-input wire:model.lazy="curso.seccion_subtitulo" error="curso.seccion_subtitulo" placeholder="Subtitulo..."
        label="Subtitulo" />
    <x-input wire:model.lazy="curso.seccion_link_video" error="curso.seccion_link_video" placeholder="url..."
        label="Video" />
    <x-textarea wire:model.lazy="curso.seccion_detalle" error="curso.seccion_detalle" label="Detalle" />
</div>
{{-- end maestros --}}

<hr class="my-5">
{{-- Caracteristicas --}}
<div class="hover:border-2 hover:border-[#6b2b83] p-2 border">
    <h3 class="text-lg">Caracteristicas</h3>
    @foreach ($caracteristicas as $key => $item)
        <div class="flex items-center">
            <x-textarea wire:model.lazy="caracteristicas.{{ $key }}.detalle"
                error="caracteristicas.*.detalle" />
            <button type="button" class=" text-red-700 p-1 rounded-sm leading-none"
                wire:click.difer="borrarCaracteristica({{ $key }}, {{ $item['id'] }})">
                <i class="fa-solid fa-trash"></i>
            </button>
        </div>
    @endforeach
    <button type="button" class="bg-[#6b2b83] text-white p-2 rounded-lg leading-none mt-3"
        wire:click.difer="agregarCaracteristica()">
        <i class="fa-solid fa-plus"></i>
    </button>
</div>
{{-- end Caracteristicas --}}
<hr class="my-5">
<div class="hover:border-2 hover:border-[#6b2b83] p-2 border">
    <h3 class="text-lg">Syllabus</h3>

    <h3 class="text-lg">Modulos</h3>
    @forelse ($modulos as $key => $modulo)
        <x-acordeon tipo="Modulo" :numero="$key + 1">
            <x-input wire:model.lazy="modulos.{{ $key }}.titulo" error="modulos.{{ $key }}.titulo"
                placeholder="Titulo..." label="Titulo" />

            <h3 class="text-lg">Clases</h3>
            @forelse ($modulo['clases'] as $keyClase => $clase)
                <x-acordeon tipo="Clase" :numero="$keyClase + 1">
                    <x-input wire:model.lazy="modulos.{{ $key }}.clases.{{ $keyClase }}.titulo"
                        error="modulos.{{ $key }}.clases.{{ $keyClase }}.titulo"
                        placeholder="Titulo..." label="Titulo" />

                    <h3 class="text-lg">Contenido</h3>
                    @forelse ($clase['contenidos'] as $keyContenido => $contenido)
                        <x-acordeon tipo="Contenido" :numero="$keyContenido + 1">

                            <x-input
                                wire:model.lazy="modulos.{{ $key }}.clases.{{ $keyClase }}.contenidos.{{ $keyContenido }}.titulo"
                                error="modulos.{{ $key }}.clases.{{ $keyClase }}.contenidos.{{ $keyContenido }}.titulo"
                                placeholder="Titulo..." label="Titulo" />


                                <div class="box-entrada px-2 w-full mt-2">
                                  <label class="block text-gray-700 text-sm font-bold mt-2">
                                      Tipo de contenido
                                  </label>
                                  <div class="relative">
                                    <select class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 w-full block box-entrada px-2 mt-2  rounded-md sm:text-sm border-gray-300" wire:model="modulos.{{ $key }}.clases.{{ $keyClase }}.contenidos.{{ $keyContenido }}.cursos_contenido_tipo_id">
                                      <option >Seleccione un tipo...</option>
                                      @foreach ($tipos as $item)
                                          <option value="{{ $item->id }}">{{ $item->titulo }}</option>
                                      @endforeach
                                    </select>
                                  </div>

                              </div>


                            <x-input
                                wire:model.lazy="modulos.{{ $key }}.clases.{{ $keyClase }}.contenidos.{{ $keyContenido }}.subtitulo"
                                error="modulos.{{ $key }}.clases.{{ $keyClase }}.contenidos.{{ $keyContenido }}.subtitulo"
                                placeholder="Subtitulo..." label="Subtitulo" />

                            <x-textarea
                                wire:model.lazy="modulos.{{ $key }}.clases.{{ $keyClase }}.contenidos.{{ $keyContenido }}.detalle"
                                error="modulos.{{ $key }}.clases.{{ $keyClase }}.contenidos.{{ $keyContenido }}.detalle"
                                label="Detalle" />

                                <x-input
                                wire:model.lazy="modulos.{{ $key }}.clases.{{ $keyClase }}.contenidos.{{ $keyContenido }}.recurso"
                                error="modulos.{{ $key }}.clases.{{ $keyClase }}.contenidos.{{ $keyContenido }}.recurso" placeholder="url..."
                                label="Video" />


                        </x-acordeon>
                    @empty
                        <x-no-hay />
                    @endforelse
                    <button type="button" class="bg-[#6b2b83] text-white p-2 rounded-lg leading-none mt-3"
                        wire:click.difer="agregarContenido({{ $key }}, {{ $keyClase }})">
                        <i class="fa-solid fa-plus"></i>
                    </button>

                </x-acordeon>
            @empty
                <x-no-hay />
            @endforelse
            <button type="button" class="bg-[#6b2b83] text-white p-2 rounded-lg leading-none mt-3"
                wire:click.difer="agregarClase({{ $key }})">
                <i class="fa-solid fa-plus"></i>
            </button>

        </x-acordeon>
    @empty
        <x-no-hay />
    @endforelse
    <button type="button" class="bg-[#6b2b83] text-white p-2 rounded-lg leading-none mt-3"
        wire:click.difer="agregarModulo()">
        <i class="fa-solid fa-plus"></i>
    </button>

</div>
