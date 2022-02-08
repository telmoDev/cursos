<div>
    <!-- Slider Principal -->
    <div class="swiper slider-principal">
      <div class="swiper-wrapper">
        @foreach( $cursos_detacados as $destacado)

            <div class="swiper-slide">
                <div class="contenido shadow-2xl px-4 py-4 ">
                    <h3 class="title text-2xl font-bold">{{ $destacado->curso->nombre}}</h3>
                    <div class="price">{{ $destacado->curso->precio }}</div>
                    <div class="description">{{ $destacado->curso->descripcion_corta }}</div>
                    <div class="read_more"><a href="{{ $destacado->curso->url() }}">Ver Curso</a></div>
                </div>
                <div class="imagen">
                    <img
                        class=" "
                        src="{{ $destacado->curso->imagen() }}"
                        alt="image"
                    />
                </div>
            </div>
        @endforeach
      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>

    <!-- Categorías para ti  -->
    <div class="que-aprender-ahora mt-5">
        <h3 class="text-xl font-bold">Temas de interés</h3>
        <div class="temas grid grid-cols-4 gap-4 w-full">
            @foreach( $categorias as $categoria)
            <a href="#" class="tema text-center border-2 border-black py-2">{{ $categoria->nombre }}</a>
            @endforeach
        </div>
    </div>

    <!-- Que aprender ahora  -->
    <div class="que-aprender-ahora mt-5">
        <h3 class="text-xl font-bold">Qué aprender ahora</h3>
        <div class="temas grid grid-cols-4 gap-4 w-full">
            @foreach( $cursos as $key => $curso)

                <div
                    x-data="{ tooltip: false }"
                    x-on:mouseover="tooltip = true"
                    x-on:mouseleave="tooltip = false"
                    class="box-curso tema text-center mb-4 relative">
                    <a href="{{ $curso->url() }}" class="box-imagen block w-full h-32 bg-center   transition-all" style="background-image: url({{ $curso->imagen() }})"></a>
                    <div class="text-left principal ">
                        <h3 class="title  text-lg font-bold px-2 transition-all"><a href="{{ $curso->url() }}" class="block">{{ $curso->nombre}}</a></h3>
                        <div class="price text-sm font-bold px-2">{{ $curso->precio }}</div>
                    </div>
                    @if( $key % 4 == 3 )
                    <div x-show="tooltip"
                        class="text-sm text-black absolute border-2	shadow-md pb-4 transform bottom-0 w-full bg-white text-left left-auto right-full z-10"
                        x-transition.duration.300ms
                    >
                    @else
                        <div x-show="tooltip"
                            class="text-sm text-black absolute border-2	shadow-md pb-4 transform bottom-0 w-full bg-white text-left left-full z-10"
                            x-transition.duration.300ms
                        >
                    @endif
                        <h3 class="title text-lg font-bold px-4 py-2 bg-gray-400 text-white"><a href="{{ $curso->url() }}">{{ $curso->nombre}}</a></h3>
                        <div class="flex flex-col justify-end px-4 text-right">
                            <div class="author text-xs"><strong>Autor:</strong> {{ $curso->autor->name }}</div>
                            <div class="update text-xs"><strong>Actualizado:</strong> {{ $curso->updated_at->format('j m, Y') }}</div>
                        </div>

                        <div class="description text-base px-4">{{ $curso->descripcion_larga }}</div>
                        <div class="btn text-lg mt-2 flex justify-between px-4">
                            <x-jet-button class="">
                                {{ __('Comprar') }}
                            </x-jet-button>
                            <x-jet-button class="">
                                {{ __('Fav') }}
                            </x-jet-button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Categorías para ti  -->
    <div class="que-aprender-ahora mt-5">
        <h3 class="text-xl font-bold">Top Docentes</h3>
        <div class="temas grid grid-cols-4 gap-4 w-full">
            @foreach( $autores as $autor)
            <a href="#" class="tema text-center border-2 border-black py-2">{{ $autor->name }}</a>
            @endforeach
        </div>
    </div>
</div>
