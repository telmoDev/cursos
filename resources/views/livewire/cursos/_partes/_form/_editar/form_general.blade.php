<h3 class="text-lg">Información General</h3>
<div class="text-sm">
    <span class="mr-1">Enlace:</span>
    <a class="text-blue-500 decoration-solid" href="{{ $enlace }}">{{ $enlace }}</a>
</div>
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
            <span class="absolute right-2 top-2 cursor-pointer" onclick="confirm('Esta seguro que desea eliminar esta imagen.') || event.stopImmediatePropagation()" wire:click="borrarImagen">
                @include('livewire.cursos._icons.cancel')
            </span>
            @if ($hasImgCurso)
            <img src="{{ route('img.bg.curso', ['folder' => $curso->id, 'filename' => $imgCurso]) }}" class="p-0" style="width: 250px;max-height: 250px;">
            @else
            <img src="{{ $imgCurso->temporaryUrl() }}" class="p-0" style="width: 250px;max-height: 250px;">
            @endif
        @endif
    </div>
    <input class="btn-file rounded-lg bg-indigo-500 " type="file" accept="image/*" wire:model.lazy="imgCurso">
</div>
