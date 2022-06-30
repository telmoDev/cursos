<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="pb-12 font-acephimere">
        <div class="modulo relative w-full">
            <img src="{{ url('/img/slider-principal-1.jpg') }}" alt="" class="w-full p-0 m-0">
            <img src="{{ url('/img/slider-principal-2.jpg') }}" alt="" class="w-full p-0 m-0">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-1/2 absolute bottom-0 w-full left-1/2 -translate-x-2/4">
                <div class="absolute w-1/2 h-3/4 bottom-0  ml-4 text-right ">
                    <h1 class="text-white text-7xl font-bold mb-4">#ElPasoXtra</h1>
                    <div class="text-[#6c2384] italic">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod  tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et</div>
                </div>
            </div>
        </div>
        <div class="modulo relative w-full flex flex-center flex-col pt-6">
            <div class="titulo text-2xl text-[#80009d] mx-auto font-bold max-w-xl text-center">Estudia como si vieras una serie de Netﬂix con nuestros cursos más populares</div>
            <livewire:inicio />
            <a class="descubrir-programas text-[#ff2d00] text-xl text-center font-bold hover:underline mt-5 mb-5" href="{{ route('curso.list') }}">
                Descubrir todos los programas
            </a>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-1/2 pt-6">
            <div class="temas flex w-full gap-2 items-center transition-all mt-5 text-right">
                <div class="w-1/2 pr-4">
                    <h4 class="text-[#ff2d00] font-bold text-2xl mb-4" >1. Nuestras clases se adaptan a tu rutina</h4>
                    <div class="text-[#80009d] font-bold text-xl pl-6 mb-4">
                        <h3>Clases de 15 minutos que puedes hacer cuando y donde quieras</h3>
                    </div>
                    <div class="text-[#878787] mb-6 pl-8">
                        “Sin dudar, una de las mejores experiencias de aprendizaje, no es necesario estar en el mismo país, el mismo idioma o el mismo horario para conocer y aprender.
                        <span class="italic font-bold" >Gracias por hacer esto posible para todos aquellos que queremos seguir aprendiendo y creciendo en todo momento</span>
                    </div>
                    <div class="border-t-2 border-[#80009d] flex items-center pt-6 mb-3">
                        <div class="w-2/3">
                            <div class="text-[#878787]">Alejandra Anguiano</div>
                            <div class="text-[#878787] italic mt-2 text-sm">Plant Manager Assistant en Continental</div>
                        </div>
                        <div class="w-1/3 flex justify-end">
                            <img src="{{ url('img/testimonio-1.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="w-1/2 ">
                    <img src="{{ url('img/img-testimonio-2.jpg') }}" alt="">
                </div>
            </div>
        </div>


        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-1/2 pt-6">
            <div class="temas flex w-full gap-2 items-center transition-all mt-5 text-left">
                <div class="w-1/2 ">
                    <iframe src="https://player.vimeo.com/video/73214621?h=e9e98919a7" width="480" height="300" frameborder="0" class="w-full" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="w-1/2 pr-4">
                    <h4 class="text-[#ff2d00] font-bold text-2xl mb-4" >2. Aprende con los mejores</h4>
                    <div class="text-[#80009d] font-bold text-xl pr-6 mb-4">
                        <h3>Aprende con los mayores emprendedores y directivos de éxito</h3>
                    </div>
                    <div class="text-[#878787] mb-6 pr-8">
                    “Profesionalmente, se desvelan conocimientos de primera, experiencias, anécdotas y materiales, de la mano de un grupo
                    <span class="italic font-bold" >TOP de profesionales y empresarios de Clase Mundial, con quienes muy difícilmente tendríamos acceso a; para compartirnos su Know-How, su experiencia-vivencias</span>
                    , que enriquecen aún más todos los casos de negocio que nos son presentados a lo largo de todo el máster.”
                    </div>
                    <div class="border-t-2 border-[#80009d] flex items-center pt-6 mb-3">
                        <div class="w-1/3 flex justify-start">
                            <img src="{{ url('img/testimonio-1.jpg') }}" alt="">
                        </div>
                        <div class="w-2/3">
                            <div class="text-[#878787]">Gastón Romero</div>
                            <div class="text-[#878787] italic mt-2 text-sm">Managing Director en CEEO HG</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-1/2 pt-6">
            <div class="temas flex w-full gap-2 items-center transition-all mt-5 text-right">
                <div class="w-1/2 pr-4">
                    <h4 class="text-[#ff2d00] font-bold text-2xl mb-4" >3. Formar parte de la mayor comunidad de negocios del país</h4>
                    <div class="text-[#80009d] font-bold text-xl pl-6 mb-4">
                        <h3>Conoce a tu próximo socio o descubre tu próxima oportunidad laboral </h3>
                    </div>
                    <div class="text-[#878787] mb-6 pl-8">
                        “He tenido una grata experiencia con el networking. Desde que me uní a la comunidad he tenido varios contactos en común y nuevos. Es una gran posibilidad para seguir haciendo crecer tu comunidad y realizar networking con otros profesionales.”
                    </div>
                    <div class="border-t-2 border-[#80009d] flex items-center pt-6 mb-3">
                        <div class="w-2/3">
                            <div class="text-[#878787]">Helda Lemus</div>
                            <div class="text-[#878787] italic mt-2 text-sm">Brand and Communications Manager en BBVA</div>
                        </div>
                        <div class="w-1/3 flex justify-end">
                            <img src="{{ url('img/testimonio-1.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="w-1/2 ">
                    <img src="{{ url('img/img-testimonio-3.jpg') }}" alt="">
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-1/2 pt-6">
            <div class="flex w-full h-full">
                <div class="w-3/5 bg-gray-300">
                    <iframe src="https://player.vimeo.com/video/73214621?h=e9e98919a7" width="480" height="300" frameborder="0" class="w-full h-full" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="w-2/5 bg-[#80009d]">
                        <div class="text-white py-16 px-6 text-right" >
                            <div class="text-5xl font-bold">#ElPasoXtra</div>
                            <div class="italic mb-10">Los mayores emprendedores y directivos de éxito adoran nuestro método</div>
                            <div class="italic text-[#ff2d00]">Descubra en este vídeo por qué se han unido los mayores emprendedores y directivos de éxito</div>
                        </div>
                </div>
            </div>
        </div>

        <div class="pt-6">
            <img src="/img/home-ayuda.jpg" alt="" class="w-full block p-0">
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-1/2 pt-6">
            <div class="text-2xl text-center text-[#80009d] font-bold w-4/6 mx-auto">Nuestros estudiantes explican mejor que nadie cómo nuestros másteres los han ayudado a lanzar sus propios negocios, ampliar sus conocimientos y a hacer crecer sus empresas.</div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-6">
            <div class="bg-white overflow-hidden sm:rounded-lg">
            <div class="example-box">
                <div class="carousel-multiple-items">
                    <div>
                    <div class="box">{{-- <iframe src="https://player.vimeo.com/video/73214621?h=e9e98919a7" width="480" height="300" frameborder="0" class="w-full" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe> --}}</div>
                    </div>
                    <div>
                    <div class="box">{{-- <iframe src="https://player.vimeo.com/video/73214621?h=e9e98919a7" width="480" height="300" frameborder="0" class="w-full" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe> --}}</div>
                    </div>
                    <div>
                    <div class="box">{{-- <iframe src="https://player.vimeo.com/video/73214621?h=e9e98919a7" width="480" height="300" frameborder="0" class="w-full" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe> --}}</div>
                    </div>
                    <div>
                    <div class="box">{{-- <iframe src="https://player.vimeo.com/video/73214621?h=e9e98919a7" width="480" height="300" frameborder="0" class="w-full" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe> --}}</div>
                    </div>
                    <div>
                    <div class="box">{{-- <iframe src="https://player.vimeo.com/video/73214621?h=e9e98919a7" width="480" height="300" frameborder="0" class="w-full" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe> --}}</div>
                    </div>
                    <div>
                    <div class="box">{{-- <iframe src="https://player.vimeo.com/video/73214621?h=e9e98919a7" width="480" height="300" frameborder="0" class="w-full" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe> --}}</div>
                    </div>
                    <div>
                    <div class="box">{{-- <iframe src="https://player.vimeo.com/video/73214621?h=e9e98919a7" width="480" height="300" frameborder="0" class="w-full" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe> --}}</div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
