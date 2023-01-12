<h3 class="text-lg">Información General</h3>
<div class="box-entrada px-2 w-full mt-2">
    <label class="block text-gray-700 text-sm font-bold mt-2" for="fecha_inicio">
        Nombre
    </label>
    <input type="text"
        class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 w-full block rounded-none rounded-r-md sm:text-sm border-gray-300"
        placeholder="Nombre" wire:model.lazy="curso.nombre">
    @error('curso.nombre')
        <div class="text-red-600 text-sm">{{ $message }}</div>
    @enderror
</div>
<div class="box-entrada px-2 w-full mt-2">
    <label class="block text-gray-700 text-sm font-bold mt-2" for="fecha_inicio">
        Slug
    </label>
    <input type="text"
        class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 w-full block rounded-none rounded-r-md sm:text-sm border-gray-300"
        placeholder="Automático" wire:model.lazy="curso.slug" disabled>
    @error('curso.slug')
        <div class="text-red-600 text-sm">{{ $message }}</div>
    @enderror
</div>
<div class="flex">
    <div class="box-entrada px-2 w-full mt-2">
        <label class="block text-gray-700 text-sm font-bold mt-2" for="fecha_inicio">
            Descripción larga
        </label>
        <textarea
            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 w-full block rounded-none rounded-r-md sm:text-sm border-gray-300"
            wire:model.lazy="curso.descripcion_larga"></textarea>
        @error('curso.descripcion_larga')
            <div class="text-red-600 text-sm">{{ $message }}</div>
        @enderror
    </div>
    <div class="box-entrada px-2 w-full mt-2">
        <label class="block text-gray-700 text-sm font-bold mt-2" for="fecha_inicio">
            Descripción corta
        </label>
        <textarea
            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 w-full block rounded-none rounded-r-md sm:text-sm border-gray-300"
            wire:model.lazy="curso.descripcion_corta"></textarea>
        @error('curso.descripcion_corta')
            <div class="text-red-600 text-sm">{{ $message }}</div>
        @enderror
    </div>

</div>
<div class="box-entrada px-2 w-full mt-2">
    <label class="block text-gray-700 text-sm font-bold mt-2" for="fecha_inicio">
        Precio
    </label>
    <div class="mt-1 relative rounded-md shadow-sm">
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <span class="text-gray-500 sm:text-sm"> $ </span>
        </div>
        <input type="text"
            class="pl-7 pr-12 focus:ring-indigo-500 focus:border-indigo-500 flex-1 w-full block rounded-none rounded-r-md sm:text-sm border-gray-300"
            wire:model.lazy="curso.precio">
    </div>
    @error('curso.precio')
        <div class="text-red-600 text-sm">{{ $message }}</div>
    @enderror
</div>
<div class="box-entrada px-2 w-full mt-2">
    <label class="block text-gray-700 text-sm font-bold mt-2" for="fecha_inicio">
        Imagen del curso ( 250px x 250px )
    </label>
    <div class="relative {{ $imgCurso ? 'my-2' : '' }}" style="width: fit-content">
        @if ($imgCurso)
            <span class="absolute right-2 top-2 cursor-pointer" wire:click="borrarImagen">
                @include('livewire.cursos._icons.cancel')
            </span>
            <img src="{{ $imgCurso->temporaryUrl() }}" class="p-0" style="width: 250px;max-height: 250px;">
        @endif
    </div>
    <input class="btn-file rounded-lg bg-indigo-500 " type="file" accept="image/*" wire:model.lazy="imgCurso">
    @error('imgCurso')
        <div class="text-red-600 text-sm">{{ $message }}</div>
    @enderror
</div>
{{-- Bloque 1 --}}
<hr class="my-5">
<div class="hover:border-2 hover:border-[#6b2b83] p-2 border">
    <h3 class="text-lg">Información - Sección con video</h3>
    <div class="box-entrada px-2 w-full mt-2 hover:order-1 hover:">
        <label class="block text-gray-700 text-sm font-bold mt-2" for="fecha_inicio">
            Titulo
        </label>
        <input type="text"
            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 w-full block rounded-none rounded-r-md sm:text-sm border-gray-300"
            placeholder="Titulo..." wire:model.lazy="curso.bloque1_titulo">
        {{-- @error("secciones.{$key}.contenido.{$keyc}.subtitulo")
                    <div class="text-red-600 text-sm">{{ $message }}</div>
                @enderror --}}
    </div>
    <div class="box-entrada px-2 w-full mt-2 hover:order-1 hover:">
        <label class="block text-gray-700 text-sm font-bold mt-2" for="fecha_inicio">
            Subtitulo
        </label>
        <input type="text"
            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 w-full block rounded-none rounded-r-md sm:text-sm border-gray-300"
            placeholder="Subtitulo..." wire:model.lazy="curso.bloque1_subtitulo">
        {{-- @error("secciones.{$key}.contenido.{$keyc}.subtitulo")
                    <div class="text-red-600 text-sm">{{ $message }}</div>
                @enderror --}}
    </div>
    <div class="box-entrada px-2 w-full mt-2 hover:order-1 hover:">
      <label class="block text-gray-700 text-sm font-bold mt-2" for="fecha_inicio">
          Video(url)
      </label>
      <input type="text"
          class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 w-full block rounded-none rounded-r-md sm:text-sm border-gray-300"
          placeholder="url..." wire:model.lazy="curso.bloque1_recurso">
      {{-- @error("secciones.{$key}.contenido.{$keyc}.subtitulo")
                  <div class="text-red-600 text-sm">{{ $message }}</div>
              @enderror --}}
  </div>
    <div class="box-entrada px-2 w-full mt-2">
        <label class="block text-gray-700 text-sm font-bold mt-2" for="fecha_inicio">
            Detalle
        </label>
        <textarea
            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 w-full block rounded-none rounded-r-md sm:text-sm border-gray-300"
            wire:model.lazy="curso.bloque1_detalle"></textarea>
        {{-- @error("secciones.{$key}.contenido.{$key}.detalle")
                    <div class="text-red-600 text-sm">{{ $message }}</div>
                @enderror --}}
    </div>
</div>
{{-- Bloque 2 --}}
<hr class="my-5">
<div class="hover:border-2 hover:border-[#6b2b83] p-2 border">
    <h3 class="text-lg">Información - Sección roja</h3>
    <div class="box-entrada px-2 w-full mt-2 hover:order-1 hover:">
        <label class="block text-gray-700 text-sm font-bold mt-2" for="fecha_inicio">
            Titulo
        </label>
        <input type="text"
            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 w-full block rounded-none rounded-r-md sm:text-sm border-gray-300"
            placeholder="Titulo..." wire:model.lazy="curso.bloque2_titulo">
        {{-- @error("secciones.{$key}.contenido.{$keyc}.subtitulo")
                    <div class="text-red-600 text-sm">{{ $message }}</div>
                @enderror --}}
    </div>
    <div class="box-entrada px-2 w-full mt-2 hover:order-1 hover:">
        <label class="block text-gray-700 text-sm font-bold mt-2" for="fecha_inicio">
            Subtitulo
        </label>
        <input type="text"
            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 w-full block rounded-none rounded-r-md sm:text-sm border-gray-300"
            placeholder="Subtitulo..." wire:model.lazy="curso.bloque2_subtitulo">
        {{-- @error("secciones.{$key}.contenido.{$keyc}.subtitulo")
                    <div class="text-red-600 text-sm">{{ $message }}</div>
                @enderror --}}
    </div>
    <div class="box-entrada px-2 w-full mt-2">
        <label class="block text-gray-700 text-sm font-bold mt-2" for="fecha_inicio">
            Detalle
        </label>
        <textarea
            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 w-full block rounded-none rounded-r-md sm:text-sm border-gray-300"
            wire:model.lazy="curso.bloque2_detalle"></textarea>
        @error("secciones.{$key}.contenido.{$key}.detalle")
                    <div class="text-red-600 text-sm">{{ $message }}</div>
                @enderror
    </div>
</div>
