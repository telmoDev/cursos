<div>

    <form wire:submit.prevent="guardar">

        <div class="shadow p-2">
            {{-- Detalle del curso --}}
            <h3 class="text-lg">Información General</h3>
            <div class="box-entrada px-2 w-full mt-2">
                <label class="block text-gray-700 text-sm font-bold mt-2" for="fecha_inicio">
                Nombre
                </label>
                <input
                    type="text"
                    class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 w-full block rounded-none rounded-r-md sm:text-sm border-gray-300"
                    placeholder="Nombre"
                    wire:model.lazy="curso.nombre"
                >
            </div>
            <div class="box-entrada px-2 w-full mt-2">
                <label class="block text-gray-700 text-sm font-bold mt-2" for="fecha_inicio">
                Slug
                </label>
                <input
                    type="text"
                    class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 w-full block rounded-none rounded-r-md sm:text-sm border-gray-300"
                    placeholder="Automático"
                    wire:model.lazy="curso.slug"
                    disabled
                >
            </div>
            <div class="flex">
                <div class="box-entrada px-2 w-full mt-2">
                    <label class="block text-gray-700 text-sm font-bold mt-2" for="fecha_inicio">
                    Descripción larga
                    </label>
                    <textarea
                        class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 w-full block rounded-none rounded-r-md sm:text-sm border-gray-300"
                        wire:model.lazy="curso.descripcion_larga"
                    ></textarea>
                </div>
                <div class="box-entrada px-2 w-full mt-2">
                    <label class="block text-gray-700 text-sm font-bold mt-2" for="fecha_inicio">
                    Descripción corta
                    </label>
                    <textarea
                        class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 w-full block rounded-none rounded-r-md sm:text-sm border-gray-300"
                        wire:model.lazy="curso.descripcion_corta"
                    ></textarea>
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
                    <input
                        type="text"
                        class="pl-7 pr-12 focus:ring-indigo-500 focus:border-indigo-500 flex-1 w-full block rounded-none rounded-r-md sm:text-sm border-gray-300"
                        wire:model.lazy="curso.precio"
                    >
                </div>
            </div>
        </div>
        <div class="shadow p-2 mt-5">
            {{-- Detalle del curso --}}
            <h3 class="text-lg">Syllabus</h3>

            <h4>Secciones ({{ count( $secciones ) }})</h4>
            @forelse( $secciones as $key => $seccion )
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
                    </div>
                </div>

                <div class="shadow p-2 mt-3 mb-3">
                    @forelse( $seccion['contenido'] as $keyc => $contenido )

                    <div class="shadow p-2 mt-3 mb-3">
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
                        </div>
                        <div class="box-entrada px-2 w-full mt-2">
                            <label class="block text-gray-700 text-sm font-bold mt-2" for="fecha_inicio">
                            Descripción contenido
                            </label>

                            <textarea
                                class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 w-full block rounded-none rounded-r-md sm:text-sm border-gray-300"
                                wire:model.lazy="secciones.{{$key}}.contenido.{{$keyc}}.detalle"
                            ></textarea>
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

        <div class="flex justify-center mt-5">
            <x-jet-button  wire:loading.attr="disabled">
                Guardar
            </x-jet-button>
        </div>
    </form>

</div>
