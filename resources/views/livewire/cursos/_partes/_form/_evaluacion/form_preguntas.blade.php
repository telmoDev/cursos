<div class="box-entrada px-2 w-full mt-4">
  <label class="block text-gray-700 text-sm font-bold mt-2" for="fecha_inicio">
      Preguntas ({{ count($preguntas) }})
  </label>
  <div>
      @forelse ($preguntas as  $key => $item)
      <div x-data="{ open: false }" class="hover:border-[#5E2880] hover:border p-1 mb-3 rounded-md">
        <div @click="open = !open" class="bg-[#5E2880] text-white rounded-md h-[37.6px] flex justify-center items-center" >#{{ $key + 1 }}{{ $preguntas[$key]['titulo'] }}</div>
        <div x-show="open" class="mt-3 p-2">
          <label class="block text-gray-700 text-sm font-bold mt-2">Pregunta</label>
          <input class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 w-full block rounded-md sm:text-sm border-gray-300 mb-3" type="text" wire:model="preguntas.{{$key}}.titulo">
          <div>
            <label class="mb-3 block"> Respuestas </label>
            @foreach ($preguntas[$key]['respuestas'] as $item)
                <div class="border-b-2 border-[#5E2880] mb-3 p-2">
                  <input class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 w-full block rounded-md sm:text-sm border-gray-300 mb-2" type="text">
                  <label >
                    Respuesta correcta
                    <input type="checkbox" name="" id="">
                  </label>
                </div>
            @endforeach
            <div class="mt-4 flex justify-end">
              <button wire:click.defer="agregarRepuesta({{$key}})"
              class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition" >+ Repuesta</button>
            </div>
          </div>
        </div>
      </div>
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
              No hay preguntas
          </div>
      @endforelse
    </div>
    <div class="flex justify-end mt-5">
      <button wire:click.defer="agregarPregunta"
          class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
          + Pregunta
      </button>
  </div>
</div>
