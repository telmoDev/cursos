<div class="mb-2 flex items-center shadow-lg rounded-md w-[fit-content] hover:bg-[#6b2b83] hover:text-white {{ request()->routeIs( $ruta ) ? 'bg-[#6b2b83] text-white'  : ''}}">
  <div class="p-2 flex" @click="open = !open">
    <i class="{{ $icono }}"></i>
  </div>
  <a x-show="open" x-transition class="pr-2 cursor-pointer" href="{{ route( $ruta ) }}">
    {{ $nombre }}
  </a>
</div>
