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



                  <div class="bg-[#eee8f3] py-32">
                      <div class="  p-4 sm:rounded-lg max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                          <h3 class="text-2xl font-bold mb-5 text-[#4f2a61]">Conoce todos los contenidos de este
                              programa:</h3>


                      </div>
                  </div>
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
