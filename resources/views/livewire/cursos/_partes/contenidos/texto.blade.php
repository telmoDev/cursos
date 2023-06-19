<div id="view_{{$key}}" class="w-full h-screen flex flex-col justify-center items-start">
  <div class="w-4/5 ml-auto">
    <p class="text-2xl mb-5">{{ $item->detalle }}</p>
    <button @click="scroll('view_{{$key}}')" style="width: fit-content" class="rounded-md p-2 capitalize font-bold text-lg text-white bg-[#5E2880]" >Continuar</button>
  </div>
</div>
