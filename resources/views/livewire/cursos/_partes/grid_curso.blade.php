<div
    x-data="{ tooltip: false }"
    class="box-curso tema text-center mb-4  ">
        <div class="relative">
        <a href="{{ $curso->url() }}"  class="box-imagen rounded-t-lg block w-full h-64 bg-center bg-cover transition-all" style="background-image: url({{ $curso->getImagen() }})"></a>
        <div class="text-left principal ">
          <div class="px-5">
            <h3 class="text-lg mb-3  font-bold  transition-all size-25 mt-6"><a href="{{ $curso->url() }}" class="block">{{ $curso->nombre}}</a></h3>
            <h3 class="text-lg mb-3  font-acephimere  transition-all size-20 mt-6"><i class="fas fa-clock text-gray-500 mr-2"></i>{{ $curso->hora}}h de clase</h3>
            <div class="price font-bold mb-10 text-3xl font-acephimere">
              <i class="fas fa-dollar-sign text-gray-500 mr-2"></i>
              {{ $curso->precio }}
              <span class="inline-block bg-blue-500 text-white px-2 py-1 rounded-full font-semibold text-xs">Precio especial</span>
            </div>
            <livewire:carrito.agregar.modal :curso="$curso" />
          </div>
        </div>
    </div>

</div>
