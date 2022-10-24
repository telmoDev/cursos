<div>
    <div class="mb-4">
        <a href="{{ route('curso.administrador') }}" class="flex items-center font-bold">
            <div class="mr-2">
                @include('livewire.cursos._icons.arrow_left')
            </div>
            Regresar
        </a>
    </div>
    <div>

        <form wire:submit.prevent="guardar">

            <div class="shadow p-2 hover:border-2 hover:border-[#6b2b83]">
                {{-- Detalle del curso --}}
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
                <hr class="my-5">
                {{-- Reseña --}}
                @include('livewire.cursos._partes._form._editar.form_resenia_citas')
                {{-- end Reseña --}}
            </div>
            {{-- Bloques --}}
            @include('livewire.cursos._partes._form._editar.form_bloque_pagina')
            {{-- end Bloques --}}
            {{-- Syllabus --}}
            @include('livewire.cursos._partes._form._editar.form_secciones')
            {{-- end Syllabus --}}

            <div class="flex justify-center mt-5">
                <x-jet-button wire:loading.attr="disabled">
                    Guardar
                </x-jet-button>
            </div>
        </form>
        <div wire:loading wire:target="guardar">
            @include('livewire.cursos._icons.loading')
        </div>
    </div>

</div>
