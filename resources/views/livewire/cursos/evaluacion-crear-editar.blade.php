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
        <input
            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 w-full block rounded-md mb-4 sm:text-sm border-gray-300"
            type="text" wire:model="cursoSerch" placeholder="Buscar curso...">
        @php
            $dataCursos =
                $cursoSerch != ''
                    ? $cursos->filter(function ($value) use ($cursoSerch) {
                        return false !== stristr(strtolower($value), strtolower($cursoSerch));
                    })
                    : $cursos;
        @endphp
        <div class="flex flex-col">
          @forelse ($dataCursos as $item)
              <a class="p-2 flex justify-between items-center mb-4 shadow-md bg-gray-100 rounded-md" href="{{ route('pregunta.crear.editar', [ $item->id ]) }}" class="p-2 cursor-default">{{ $item->nombre }} <div class="ml-2">
                <i class="fa-solid fa-chevron-right"></i>
            </div></a>
          @empty
              <div class="flex justify-center  opacity-50">
                  <svg class="w-5 mr-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                      x="0px" y="0px" viewBox="0 0 317.001 317.001"
                      style="enable-background:new 0 0 317.001 317.001;" xml:space="preserve">
                      <path
                          d="M270.825,70.55L212.17,3.66C210.13,1.334,207.187,0,204.093,0H55.941C49.076,0,43.51,5.566,43.51,12.431V304.57 c0,6.866,5.566,12.431,12.431,12.431h205.118c6.866,0,12.432-5.566,12.432-12.432V77.633 C273.491,75.027,272.544,72.51,270.825,70.55z M55.941,305.073V12.432H199.94v63.601c0,3.431,2.78,6.216,6.216,6.216h54.903 l0.006,222.824H55.941z">
                      </path>
                  </svg>
                  No hay cursos
              </div>
          @endforelse
        </div>

    </div>
</div>

</div>
