<div id="view_{{$key}}" class="w-full h-screen flex flex-col justify-center items-start">
<div class="flex flex-col w-4/5 ml-auto">
  @if ($item->detalle)
    <p class="text-2xl mb-5">{{ $item->detalle }}</p>
  @endif
  @if ( $item->contenido_download )
  <a style="width: fit-content;" download href="{{ route('contenido.download.file', [ $item->id, $item->id, $item->contenido_download ]) }}" class="mb-10 border-b-4 text-2xl font-bold text-[#5E2880] w-auto border-[#5E2880]">Descargar</a>
  @else
  <a style="width: fit-content;"  href="#" class="mb-10 border-b-4 text-2xl font-bold text-[#5E2880] w-auto border-[#5E2880]">Descargar</a>
  @endif
  <button @click="scroll('view_{{$key}}')" style="width: fit-content" class="rounded-md p-2 capitalize font-bold text-lg text-white bg-[#5E2880]" >Continuar</button>
</div>
</div>
