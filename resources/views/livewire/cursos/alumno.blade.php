<div x-data="{
    scroll: (ele) => {
      elemento = document.getElementById(ele)
      elemento.scrollTo(0, elemento.offsetTop - 35)
      console.log(elemento.offsetTop)
    }
}">
    @foreach ($contenido as $key => $item)
        @switch($item->cursos_contenido_tipo_id)
            @case(1)
                @include('livewire.cursos._partes.contenidos.introduccion')
            @break

            @case(2)
                @include('livewire.cursos._partes.contenidos.video')
            @break

            @case(3)
                @include('livewire.cursos._partes.contenidos.descarga')
            @break

            @case(4)
                @include('livewire.cursos._partes.contenidos.texto')
            @break
        @endswitch
    @endforeach
    {{-- @if (true)
          <div class="flex cursor-pointer fixed right-8" style="top: 90%">
              <div class="bg-[#6b2b83] rounded-l-md p-3 hover:opacity-90" style="border-right: .5px solid #DB3634">
                  @include('livewire.cursos._icons.arrow_up')
              </div>
              <div class="bg-[#6b2b83] rounded-r-md p-3 cursor-pointer hover:opacity-90"
                  style="border-left: .5px solid #DB3634">
                  @include('livewire.cursos._icons.arrow_down')
              </div>
          </div>
      @endif --}}

</div>

<script>
  document.getElementsByTagName('button')
    const scroll = (ele) => {
            elemento = documento.getElementById(ele)
            console.log(elemento.offsetTop);
            avance = document.getElementsByTagName('header')[0].offsetHeight + (window.innerHeight * elemento);
</script>
