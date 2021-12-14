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
                        src="{{ $destacado->curso->imagen }}"
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
            @foreach( $cursos as $curso)
                <div class="tema text-center mb-4">
                    <a href="{{ $curso->url() }}" class="block w-full h-32 bg-center" style="background-image: url({{ $curso->imagen }})"></a>
                    <div class="text-left px-2">
                        <h3 class="title text-lg font-bold">{{ $curso->nombre}}</h3>
                        <div class="price text-sm">{{ $curso->autor->name }}</div>
                        <div class="price text-sm font-bold">{{ $curso->precio }}</div>
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
