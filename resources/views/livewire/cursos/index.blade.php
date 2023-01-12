<div class="">
    <div class="bg-white  ">
        <div class="flex">
            <main class="  w-full ">
                <div class="w-full">
                    <div class="flex mb-4 sm:rounded-lg max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="titulo w-8/12 pr-28">
                            <h1 class="color-[#3f3f3f] title text-2xl  font-bold">{{ $curso->nombre }}</h1>
                            <div class="color-[#3f3f3f] mt-6 title text-4xl font-bold">{{ $curso->descripcion_corta }}
                            </div>
                            <div class="color-[#3f3f3f] text-lg mt-6">{{ $curso->descripcion_larga }}</div>
                        </div>
                        <div class="w-4/12 shadow-xl rounded-lg">
                            <iframe src="https://player.vimeo.com/video/73214621?h=e9e98919a7" width="400"
                                height="250" frameborder="0" allow="autoplay; fullscreen; picture-in-picture"
                                allowfullscreen></iframe>
                            <div class="p-6">
                                <div class="color-[#3f3f3f] font-bold">{{ $curso->nombre }}</div>
                                <div class="color-[#3f3f3f] font-bold">$. {{ $curso->precio }}</div>
                                <div class="color-[#3f3f3f] ">
                                    <a class="block items-center px-1 py-4 mt-16 text-lg text-center font-medium leading-5 text-white uppercase  bg-[#6b2b83]"
                                        href="{{ route('login') }}">
                                        <span class="px-2">Registrate</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="testimonio color-[#3f3f3f] mt-4 sm:rounded-lg max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="text-4xl font-bold">{{ $curso->descripcion_referencia }}</div>
                        @foreach ($citas as $cita)
                            <div class="mt-4 ml-10 border-l-4 pr-8 pl-4 text-xl border-[#9AD6A1]">
                                <strong>“</strong>{{ $cita->detalle }}<strong>”</strong>
                            </div>
                            <div class=" mt-4">
                                <div class="flex justify-end pr-40">
                                    <div class="text-right">
                                        <div class="">{{ $cita->autor }}</div>
                                        @php
                                            $cita_profesiones = explode(',', $cita->profesion);
                                        @endphp
                                        <div class="font-bold">
                                            @foreach ($cita_profesiones as $cita_profesion)
                                                {{ $cita_profesion }}<br>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="w-20"><img src="/img/foto-quote-dm.png" alt=""></div>
                                </div>
                            </div>
                        @endforeach
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
                    <div class="bg-gray-200 w-full py-32 mt-4">
                      <div class="flex sm:rounded-lg max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                          <div class="flex w-full">
                            <div class="mr-40 w-full">
                              <div class="text-4xl">{{ $curso->bloque1_titulo }}</div>
                              <div class="text-xl mt-4">
                                  {{ $curso->bloque1_detalle }}
                              </div>
                            </div>
                            <div class="">
                                <iframe src="https://player.vimeo.com/video/73214621?h=e9e98919a7"
                                    width="400" height="250" frameborder="0"
                                    allow="autoplay; fullscreen; picture-in-picture"
                                    allowfullscreen></iframe>
                            </div>
                          </div>
                      </div>
                  </div>
                    {{-- Bloque rojo --}}
                    <div>
                      {{-- <img src="{{ url('/img/el_paso.jpg') }}" alt="" class="w-full m-0 p-0"> --}}
                      <div class="py-10 bg-[#F13939]">
                          <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-right">
                              <div class="text-white text-9xl font-bold">
                                  {{ $curso->bloque2_titulo }}
                              </div>
                              <div class="text-white text-7xl leading-none">
                                  {{ $curso->bloque2_subtitulo }}
                              </div>
                              <div class="text-[#6b2b83] text-4xl leading-snug">
                                  {{ $curso->bloque2_detalle }}
                              </div>
                          </div>
                      </div>
                  </div>


                    <div class="bg-[#eee8f3] py-32">
                        <div class="  p-4 sm:rounded-lg max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                            <h3 class="text-2xl font-bold mb-5 text-[#4f2a61]">Conoce todos los contenidos de este
                                programa:</h3>

                            <div class="flex flex-col">
                                @foreach ($curso->secciones as $key => $seccion)
                                    <a href="{{ $this->Aprobado($seccion) ? route('curso.seccion', [$curso->slug, $seccion->contenido->first()->slug]) : '#' }}"
                                        class="{{ $this->Aprobado($seccion) ? 'cursor-pointer' : 'cursor-default' }}">
                                        <div class="relative flex flex-col bg-white mt-5 p-4 rounded-lg shadow-lg">
                                            <div class=""><span class="text-xs text-[#CAAAD3] font-bold">Módulo
                                                    {{ $key + 1 }}</span></div>
                                            <div class="flex items-center justify-between">
                                                <div class="font-bold text-[#4f2a61]">{{ $seccion->titulo }}</div>
                                                {{-- <div class=""><span class="text-xs">Número de contenido: {{ $seccion->contenido->count() }}</span></div> --}}

                                                @if ($this->Aprobado($seccion))
                                                    {{-- Auth   --}}
                                                    <div class="relative flex justify-end">
                                                        {{-- <a href="{{ route('curso.seccion' , [$curso->slug, $seccion->contenido->first()->slug ])}}" class=" text-lg bg-[#6b2b83] text-white px-3">Tomarlo</a> --}}
                                                        @include('livewire.cursos._icons.add')
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            @if (false)
                <aside class="h-4 sticky top-0 w-1/5">
                    <a href="{{ $curso->url() }}" class="block w-full h-32 bg-center"
                        style="background-image: url({{ $curso->imagen() }})"></a>
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
