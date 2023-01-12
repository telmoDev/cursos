<x-guest-layout>
    <div class="mb-4 sm:rounded-lg max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="mb-4">
            <a href="{{ route('evaluacion.admin') }}" class="flex items-center font-bold">
                <div class="mr-2">
                    <i class="fa-solid fa-chevron-left"></i>
                </div>
                Regresar
            </a>
        </div>

        <div class="p-2 shadow bg-white">
            <div class="box-entrada px-2 w-full mt-2">
                <label class="block text-gray-700 text-sm font-bold mt-2" for="fecha_inicio">
                    Titulo
                </label>
                <input type="text"
                    class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 w-full block rounded-none rounded-r-md sm:text-sm border-gray-300"
                    placeholder="Titulo..." wire:model.lazy="evaluacion.titulo">
                @error('evaluacion.titulo')
                    <div class="text-red-600 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="box-entrada px-2 w-full mt-2">
                <label class="block text-gray-700 text-sm font-bold mt-2" for="fecha_inicio">
                    Curso
                </label>
                <div class="relative" x-data="{ open: false }">
                    <div class="relative focus:ring-indigo-500 focus:border-indigo-500 px-2 cursor-pointer border flex justify-between items-center w-full rounded-md sm:text-sm border-gray-300"
                        style="height: 38px;" @click="open = !open">
                        <span>
                            {{ $cursoNombre ?? 'Curso...' }}
                        </span>
                        <div>
                            <i x-show="open" class="fa-sharp fa-solid fa-chevron-up"></i>
                            <i x-show="!open" class="fa-sharp fa-solid fa-chevron-down"></i>
                        </div>
                    </div>
                    @error('cursoId')
                      <div class="text-red-600 text-sm">{{ $message }}</div>
                    @enderror

                    <div x-show="open" x-transition
                        class="p-2 absolute shadow rounded border w-full bg-white z-10 top-11">
                        <div class="relative">
                            <input type="text"
                                class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 w-full block rounded-md sm:text-sm border-gray-300"
                                wire:model="cursoSerch">
                            <div class="absolute top-2 right-2">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </div>
                        </div>
                        @php
                            $cursoData =
                                $cursoSerch != ''
                                    ? $cursos->filter(function ($item) use ($cursoSerch) {
                                        return strtoupper($item->nombre) === strtoupper($cursoSerch);
                                    })
                                    : ($cursoData = $cursos);
                        @endphp
                        <div class="max-h-56 overflow-y-scroll scroll-custom">
                            @forelse ($cursoData as $item)
                                <div class="hover:bg-gray-400 hover:text-white p-1 px-2 mr-1 rounded cursor-pointer"
                                    wire:key="{{ $item->id }}" @click="open = !open"
                                    wire:click="getDataCurso({{ $item->id }}, '{{ $item->nombre }}')">
                                    {{ $item->nombre }}
                                </div>
                            @empty
                                <div class="flex justify-center items-center opacity-50">
                                    <i class="fa-regular fa-fileb"></i>
                                    <span class="mr-2">
                                        No hay información
                                    </span>
                                </div>
                            @endforelse
                        </div>
                    </div>
                  </div>

                </div>
            </div>
        </div>
        <div class="flex justify-center mt-5">
            <button wire:loading.attr="disabled" wire:click="guardar"
                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                Guardar
            </button>
        </div>
        <div wire:loading wire:target="guardar">
            @include('livewire.cursos._icons.loading')
        </div>
    </div>
</x-guest-layout>
