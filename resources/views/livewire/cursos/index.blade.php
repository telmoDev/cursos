<div class="">
    <div class="bg-white  ">
        <div class="flex">
            <main class="  w-full ">
                <div class="w-full">
                    <div class="pb-14 pt-24" style="background-image: url('{{ route('img.cursos.bg') }}'); background-size: cover;">
                        <div class="flex mb-4 sm:rounded-lg max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                            <div class="titulo w-8/12 pr-28">
                                <h1 class="color-[#3f3f3f] title text-2xl  font-bold">{{ $curso->nombre }}</h1>
                                <div class="color-[#3f3f3f] mt-6 title text-4xl font-bold">{{ $curso->descripcion_larga }}
                                </div>
                                <div class="color-[#3f3f3f] text-justify text-lg mt-6">
                                    {{ $curso->descripcion_corta }}

                                </div>

                                <!-- <div class="color-[#3f3f3f] mt-6 title text-4xl font-bold">Lo que aprenderás</div> -->
                                <!-- <div class="color-[#3f3f3f] size-19 mt-6">{{ $curso->seccion_detalle }} </div> -->
                            </div>
                            <div class="w-4/12 shadow-xl rounded-lg bg-white">

                                @auth
                                @include('livewire.cursos._partes.grid_curso')
                                @endauth
                                @guest
                                <iframe src="https://player.vimeo.com/video/777479595?h=6e5d789c0a&amp;badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479" width="400" height="250" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen title="1.1.1. La Tierra forma y dimensiones"></iframe>
                                <div class="p-6">
                                    <div class="color-[#3f3f3f]  font-acephimere size-25 leading-none">{{ $curso->nombre }}</div>

                                    <div class="color-[#3f3f3f] font-bold size-30 font-acephimere">$.{{ $curso->precio }}</div>
                                    <div class="color-[#3f3f3f] ">
                                        <a class="block items-center px-1 py-4 mt-16 text-lg text-center font-medium leading-5 text-white uppercase  bg-[#6b2b83]" href="{{ route('register') }}">
                                            <span class="px-2">Registrate</span>
                                        </a>
                                    </div>
                                    @endguest
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="bg-gray-200">
                        <div class="pb-14 pt-24" style="background-image: url('{{ route('img.cursos.bg') }}'); background-size: cover;">
                            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                                <div class="flex flex-col items-center">
                                    <h1 class="text-2xl font-bold text-gray-800 mb-6">Aquí aprenderás...</h1>

                                    <div class="flex justify-center">
                                        <div class="flex flex-wrap">
                                            @foreach ($caracteristica_cursos as $caracteristica)
                                            <div class="bg-gray-200 p-4 w-1/2">
                                                <i class="fas fa-check-circle text-green-500 mr-2"></i>
                                                {{$caracteristica->detalle}}
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="bg-white">
                        <div class="pb-14 pt-24" style="background-image: url('{{ route('img.cursos.bg') }}'); background-size: cover;">
                            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                                <div class="flex flex-col items-center">
                                    <h1 class="text-2xl font-bold text-gray-800 mb-6">¿Con qui&eacute;n vas a aprender?</h1>
                                    <div class="flex justify-center">
                                        <div class="w-1/3 p-4">
                                            <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                                <div class="flex justify-end px-4 pt-4">

                                                </div>
                                                <div class="flex flex-col items-center pb-10">
                                                    <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="{{ asset('/img/el_paso.jpg') }}" alt="Bonnie image" />
                                                    <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Bonnie Green</h5>
                                                    <span class="text-sm text-gray-500 dark:text-gray-400">Visual Designer</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="w-1/3 p-4">
                                            <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                                <div class="flex justify-end px-4 pt-4">

                                                </div>
                                                <div class="flex flex-col items-center pb-10">
                                                    <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="{{ asset('/img/el_paso.jpg') }}" alt="Bonnie image" />
                                                    <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Bonnie Green</h5>
                                                    <span class="text-sm text-gray-500 dark:text-gray-400">Visual Designer</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="w-1/3 p-4">
                                            <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                                <div class="flex justify-end px-4 pt-4">

                                                </div>
                                                <div class="flex flex-col items-center pb-10">
                                                    <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="{{ asset('/img/el_paso.jpg') }}" alt="Bonnie image" />
                                                    <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Bonnie Green</h5>
                                                    <span class="text-sm text-gray-500 dark:text-gray-400">Visual Designer</span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="bg-gray-200">
                        <div class="pb-14 pt-24" style="background-image: url('{{ route('img.cursos.bg') }}'); background-size: cover;">
                            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                                <div class="flex flex-col items-center">
                                    <h1 class="text-2xl font-bold text-gray-800 mb-6">Conoce los contenidos de este curso</h1>
                                    {{-- Tarjetas (Cards) --}}
                                    @foreach ($tarjetas as $tarjeta)
                                    <div class="bg-white rounded-lg overflow-hidden shadow w-full max-w-7xl mx-auto mb-4">
                                        <div class="p-4 sm:rounded-lg">
                                            {{-- Contenido de la tarjeta --}}
                                            <div class="flex justify-between items-center">
                                                <h3 class="text-2xl font-bold mb-5 text-[#4f2a61]">{{ $tarjeta['titulo'] }}</h3>
                                                <button type="button" class="text-gray-600 focus:outline-none toggle-button">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="hidden mt-4 toggle-content">
                                                {{-- Contenido oculto --}}
                                                <h3 class="text-1xl font-bold mb-5 text-[#4f2a61]">{{ $tarjeta['subtitulo'] }}</h3>
                                                <p class="text-gray-600">{{ $tarjeta['contenido'] }}</p>
                                                {{-- Fin del contenido oculto --}}
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    {{-- Fin de las tarjetas --}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <script>
                        // Obtener todos los botones y contenidos ocultos
                        const buttons = document.querySelectorAll('.toggle-button');
                        const contents = document.querySelectorAll('.toggle-content');

                        // Agregar el evento de clic a cada botón
                        buttons.forEach((button, index) => {
                            button.addEventListener('click', () => {
                                contents[index].classList.toggle('hidden');
                            });
                        });
                    </script>


                    <div class="bg-white">
                        <div class="pb-14 pt-24" style="background-image: url('{{ route('img.cursos.bg') }}'); background-size: cover;">
                            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                                <div class="flex flex-col items-center">
                                    <h1 class="text-2xl font-bold text-gray-800 mb-6">Si todavía no estás seguro de si este programa es para ti…</h1>
                                    <h2 class="text-2xl text-gray-800 mb-6">…descubre el éxito de nuestros alumnos gracias a este programa.</h2>
                                    <div class="flex justify-center">
                                        <div class="flex flex-wrap">
                                            @foreach ($videos as $video)
                                            <div class="bg-white p-4 w-1/2">
                                                <div class="grid grid-cols-2 gap-4">
                                                    <div>
                                                        <div class="bg-white rounded-lg overflow-hidden shadow">
                                                            <div class="p-4 flex flex-col h-full">
                                                                <div class="flex items-center justify-center">
                                                                    <div class="aspect-w-16 aspect-h-9">
                                                                        <iframe src="https://www.youtube.com/embed/VIDEO_ID" frameborder="0" allowfullscreen></iframe>
                                                                    </div>
                                                                </div>
                                                                <div class="mt-4">
                                                                    <h3 class="text-xl font-bold mb-2">{{ $video['nombre'] }}</h3>
                                                                    <p class="text-gray-600 mb-2">{{ $video['titulo'] }}</p>
                                                                    <p class="text-gray-600">{{ $video['descripcion'] }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    {{--
                      'bloque1_titulo',
                        'bloque1_subtitulo',
                        'bloque1_detalle',
                        'bloque1_activo',
                        'bloque2_titulo',
                        'bloque2_subtitulo',
                        'bloque2_detalle',
                        'bloque2_activo'
                      --}}
                    {{-- bloque con video --}}

                    {{-- Bloque rojo --}}

                </div>
            </main>
            @if (false)
            <aside class="h-4 sticky top-0 w-1/5">
                <a href="{{ $curso->url() }}" class="block w-full h-32 bg-center" style="background-image: url({{ $curso->imagen() }})"></a>
                <div class="price text-2xl font-bold">$. {{ $curso->precio }}</div>
                <div class="btn text-lg mt-2 flex justify-between">
                    <x-jet-button class="">
                        {{ __('Comprar') }}
                    </x-jet-button>
                    <x-jet-button class="">
                        {{ __('Fav') }}
                    </x-jet-button>
                </div>
            </aside>
            @endif
        </div>
    </div>

</div>