<x-guest-layout>
  <div x-data="{open: false}" class="flex ">
    <div class="h-screen bg-white max-w-7xl px-2 pt-2 shadow-lg"  x-transition>
      <div class="p-2 bg-[#6b2b83] text-white shadow-lg rounded-md flex w-[fit-content] mb-3" @click="open = !open">
        <i x-show="open" x-transition class="fa-solid fa-xmark"></i>
        <i x-show="!open" x-transition class="fa-solid fa-bars"></i>
      </div>
      <div class="mb-2 flex items-center shadow-lg rounded-md w-[fit-content] hover:bg-[#6b2b83] hover:text-white {{ request()->routeIs('curso.administrador') ? 'bg-[#6b2b83] text-white'  : ''}}" >
        <div class="p-2 flex" @click="open = !open">
          <i class="fa-solid fa-file-video"></i>
        </div>
        <a x-show="open" href="{{ route('curso.administrador') }}" x-transition class="pr-2 cursor-pointer">cursos</a>
      </div>
      <div class="mb-2 flex items-center shadow-lg rounded-md w-[fit-content] hover:bg-[#6b2b83] hover:text-white {{ request()->routeIs('evaluacion.admin') ? 'bg-[#6b2b83] text-white'  : ''}}">
        <div class="p-2 flex" @click="open = !open">
          <i class="fa-solid fa-file"></i>
        </div>
        <a x-show="open" href="{{ route('evaluacion.admin') }}" x-transition class="pr-2 cursor-pointer">Evaluaciones</a>
      </div>
      <div class="mb-2 flex items-center shadow-lg rounded-md w-[fit-content] hover:bg-[#6b2b83] hover:text-white">
        <div class="p-2 flex" @click="open = !open">
          <i class="fa-solid fa-user"></i>
        </div>
        <a x-show="open" x-transition class="pr-2 cursor-pointer">
          usuario
        </a>
      </div>
    </div>
    <div class="h-screen w-full p-14">
      @yield('content')
    </div>
  </div>


</x-guest-layout>
