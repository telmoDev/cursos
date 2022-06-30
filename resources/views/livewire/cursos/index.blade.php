
<div class="">
    <div class="bg-white  ">
        <div class="flex">
            <main class="  w-full ">
                <div class="w-full">
                    <div class="flex mb-4 sm:rounded-lg max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="titulo w-8/12 pr-28">
                            <h1 class="color-[#3f3f3f] title text-2xl  font-bold">{{ $curso->nombre}}</h1>
                            <div  class="color-[#3f3f3f] mt-6 title text-4xl font-bold">{{ $curso->descripcion_corta}}</div>
                            <div class="color-[#3f3f3f] text-lg mt-6">{{ $curso->descripcion_larga}}</div>
                        </div>
                        <div class="w-4/12 shadow-xl">
                            <iframe src="https://player.vimeo.com/video/73214621?h=e9e98919a7" width="400" height="250" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
                            <div class="p-6">
                                <div class="color-[#3f3f3f] font-bold">{{ $curso->nombre}}</div>
                                <div class="color-[#3f3f3f] font-bold">$. {{ $curso->precio }}</div>
                                <div class="color-[#3f3f3f] ">
                                    <a class="block items-center px-1 py-4 mt-16 text-lg text-center font-medium leading-5 text-white uppercase  bg-[#6b2b83]" href="{{ route('login') }}">
                                        <span class="px-2">Registrate</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="testimonio color-[#3f3f3f] mt-4 sm:rounded-lg max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="text-4xl font-bold">Que este máster ha cambiado la visión de miles de profesionales no lo decimos nosotros, lo dicen ellos…</div>
                        <div class="mt-4 ml-10 border-l-4 pr-8 pl-4 text-xl border-[#3f3f3f]">“Llevo toda la vida dirigiendo equipos de marketing y puedo asegurar que <strong>este máster me está aportando cosas nuevas desde la primera clase.”</strong></div>
                        <div class=" mt-4">
                            <div class="flex justify-end pr-40">
                                <div class="text-right">
                                    <div class="">Ana Martín</div>
                                    <div class="font-bold">DIGITAL MARKETING <br>MANAGER EN PHILIPS</div>
                                </div>
                                <div class="w-20"><img src="/img/foto-quote-dm.png" alt=""></div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-200 w-full py-32 mt-4">
                        <div class="flex sm:rounded-lg max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                            <div class="mr-40">
                                <div class="text-4xl">Aprende con los mayores referentes en marketing digital: fundadores y directivos de empresas como <strong>LinkedIn, Facebook, Amazon…</strong></div>
                                <div class="text-xl mt-4"><strong>Prueba estas clases gratis.</strong> Y, además, descubre cómo funciona nuestro sistema de aprendizaje.</div>
                            </div>
                            <div class="">
                                <iframe src="https://player.vimeo.com/video/73214621?h=e9e98919a7" width="400" height="250" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        </div>

                    </div>

                    <div>
                        <img src="{{ url('/img/el_paso.jpg') }}" alt="" class="w-full m-0 p-0">
                    </div>
                    <div class="bg-[#eee8f3] py-32">
                        <div class="  p-4 sm:rounded-lg max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                            <h3 class="text-2xl font-bold mb-5 color-[#4f2a61]">Conoce todos los contenidos de este programa:</h3>

                            <div class="flex flex-col" >
                                @foreach($curso->secciones as $key => $seccion)
                                    <div class="relative flex flex-col bg-white mt-5 p-4">
                                        <div>{{ $seccion->titulo }}</div>
                                        <div class=""><span class="text-xs">Número de contenido: {{ $seccion->contenido->count() }}</span></div>

                                    @if( $this->Aprobado($seccion) )
                                        {{-- Auth   --}}
                                        <div class="relative flex justify-end">
                                            <a href="{{ route('curso.seccion' , [$curso->slug, $seccion->contenido->first()->slug ])}}" class=" text-lg bg-[#6b2b83] text-white px-3">Tomarlo</a>
                                        </div>
                                    @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            @if( false )
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
