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
        <div class="mb-3">
            <label class="block text-gray-700 text-sm font-bold mt-2">Titulo</label>
            <input
                class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 w-full block rounded-md sm:text-sm border-gray-300"
                type="text" wire:model="evaluacion.titulo">
        </div>

        <div class="mb-3">
            <label class="block text-gray-700 text-sm font-bold mt-2">Curso</label>
            <div
                class="border p-2 w-full h-[37.6px] block rounded-md sm:text-sm border-gray-300">{{ $cursoNombre }}</div>
            <div class="p-2 shadow-md rounded-sm">
              <input class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 w-full block rounded-md sm:text-sm border-gray-300" type="text" wire:model="cursoSerch">
              @php
                  $dataCursos = $cursoSerch != '' ? $cursos->filter(function ($value) use ($cursoSerch)
                  {
                    return false !== stristr( strtolower($value), strtolower($cursoSerch) );
                  }) : $cursos;
              @endphp
              @forelse ($dataCursos as $item)
                  <div wire:click="getDataDeCurso({{$item->id}}, '{{$item->nombre}}' )" class="p-2 cursor-default">{{$item->nombre}}</div>
              @empty
              <div class="flex justify-center  opacity-50">
                <svg class="w-5 mr-1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                    viewBox="0 0 317.001 317.001" style="enable-background:new 0 0 317.001 317.001;"
                    xml:space="preserve">
                    <path
                        d="M270.825,70.55L212.17,3.66C210.13,1.334,207.187,0,204.093,0H55.941C49.076,0,43.51,5.566,43.51,12.431V304.57 c0,6.866,5.566,12.431,12.431,12.431h205.118c6.866,0,12.432-5.566,12.432-12.432V77.633 C273.491,75.027,272.544,72.51,270.825,70.55z M55.941,305.073V12.432H199.94v63.601c0,3.431,2.78,6.216,6.216,6.216h54.903 l0.006,222.824H55.941z">
                    </path>
                </svg>
                No hay cursos
            </div>
              @endforelse
            </input>
        </div>

        @include('livewire.cursos._partes._form._evaluacion.form_preguntas')
    </div>
</div>
<div class="flex justify-center mt-5">
    <button wire:loading.attr="disabled" wire:click.defer="guardar"
        class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
        Guardar
    </button>
</div>
<div wire:loading wire:target="guardar">
    @include('livewire.cursos._icons.loading')
</div>
</div>
