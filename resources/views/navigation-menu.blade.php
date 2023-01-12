<header class="fixed h-32 w-full shadow-xl  pt-6 lg:py-8 z-10 bg-white">
    <nav x-data="{ open: false }" class="">
        <!-- Primary Navigation Menu -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex w-full justify-between items-center">
                    <!-- Logo -->
                    <div class="flex-shrink-0 flex items-center logo">
                        <a href="{{ route('home') }}">
                            <svg class="h-12" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 275 65.7" style="enable-background:new 0 0 275 65.7;" xml:space="preserve"><g><g><path style="fill:#5E2880;" d="M98.1,52.5h1.4l3.3,7.5h-1.9l-0.6-1.6h-2.9L96.7,60h-1.8L98.1,52.5z M98.7,54.7L97.8,57h1.8L98.7,54.7z"/><path style="fill:#5E2880;" d="M112.2,54.4c-0.2-0.2-0.4-0.3-0.6-0.5s-0.5-0.2-0.8-0.2s-0.6,0.1-0.9,0.2s-0.5,0.3-0.7,0.5 c-0.2,0.2-0.3,0.5-0.5,0.8c-0.1,0.3-0.2,0.6-0.2,1c0,0.4,0.1,0.7,0.2,1c0.1,0.3,0.3,0.5,0.4,0.8s0.4,0.4,0.7,0.5 			c0.3,0.1,0.5,0.2,0.8,0.2c0.3,0,0.6-0.1,0.9-0.2c0.3-0.1,0.5-0.3,0.6-0.6l1.4,1c-0.3,0.4-0.7,0.8-1.2,1c-0.5,0.2-1,0.3-1.5,0.3 			c-0.6,0-1.1-0.1-1.6-0.3c-0.5-0.2-0.9-0.4-1.3-0.8c-0.4-0.3-0.6-0.8-0.8-1.2s-0.3-1-0.3-1.6s0.1-1.1,0.3-1.6 			c0.2-0.5,0.5-0.9,0.8-1.2s0.8-0.6,1.3-0.8c0.5-0.2,1-0.3,1.6-0.3c0.2,0,0.4,0,0.7,0.1c0.2,0,0.5,0.1,0.7,0.2 c0.2,0.1,0.4,0.2,0.6,0.3s0.4,0.3,0.6,0.5L112.2,54.4z"/><path style="fill:#5E2880;" d="M120.8,52.5h1.4l3.3,7.5h-1.9l-0.6-1.6H120l-0.6,1.6h-1.8L120.8,52.5z M121.4,54.7l-0.9,2.3h1.8L121.4,54.7z"/><path style="fill:#5E2880;" d="M130,52.5h2.5c0.6,0,1.2,0.1,1.7,0.2c0.5,0.1,1,0.4,1.4,0.7c0.4,0.3,0.7,0.7,1,1.2c0.2,0.5,0.4,1.1,0.4,1.7 			c0,0.6-0.1,1.1-0.3,1.6c-0.2,0.5-0.5,0.8-0.9,1.2c-0.4,0.3-0.8,0.6-1.3,0.7c-0.5,0.2-1,0.2-1.6,0.2H130V52.5z M131.6,58.4h0.9 			c0.4,0,0.7,0,1.1-0.1c0.3-0.1,0.6-0.2,0.9-0.4c0.2-0.2,0.4-0.4,0.6-0.7c0.1-0.3,0.2-0.7,0.2-1.1c0-0.4-0.1-0.7-0.2-1 			c-0.1-0.3-0.3-0.5-0.6-0.7c-0.2-0.2-0.5-0.3-0.8-0.4c-0.3-0.1-0.6-0.1-1-0.1h-1V58.4z"/><path style="fill:#5E2880;" d="M141.9,52.5h5.1V54h-3.4v1.4h3.3v1.5h-3.3v1.5h3.6V60h-5.3V52.5z"/><path style="fill:#5E2880;" d="M152.3,52.5h2.5l1.7,4.9h0l1.7-4.9h2.5V60h-1.7v-5.7h0l-2,5.7h-1.3l-1.9-5.7h0V60h-1.7V52.5z"/><path style="fill:#5E2880;" d="M167.9,56.8l-2.8-4.3h2.1l1.6,2.8l1.7-2.8h2l-2.8,4.3V60h-1.7V56.8z"/></g><path style="fill:#5E2880;" d="M81.3,35.4c-1.1,0.2-2.3,0.3-3.5,0.3c-0.5,0-1.8,0-1.8-3.5V15.6h7.6V9H76V0.9h-7.7V9h-5.8v6.6h5.8v16.7 c0,8.8,5.2,10.7,9.5,10.7c1.6,0,3.4-0.3,5.3-1l1.2-0.4l-1.7-6.3L81.3,35.4z"/>	<path style="fill:#5E2880;" d="M102.6,9c-3.3,0-6,1-8,3.1L94.3,9h-7v34H95V22.6c1.8-4.3,4.3-6.4,7.7-6.5c1.4,0,2.6,0.1,3.6,0.4l1.3,0.4 l1.4-6.1l-1-0.5C106.1,9.4,104.3,9,102.6,9"/><path style="fill:#5E2880;" d="M123.9,9c-4.6,0-8.4,0.9-11.2,2.8l-0.9,0.6l2.2,6.2l1.3-0.5c2.8-1.1,5.7-1.7,8.7-1.9c3.5,0,5.1,1.5,5.2,4.9 		h-2.7c-2.5,0-4.9,0.2-7.3,0.7c-6.3,1.3-9.6,5-9.8,10.8c0,4.8,2.1,10.4,11.9,10.4c3.1-0.1,5.9-1.1,8.2-3.1l0.4,3.1h6.9V21.2 C136.8,13.2,132.3,9,123.9,9 M129.1,28.2v3.3c-2.3,3-4.9,4.5-7.9,4.6c-3.6,0-4.1-1.8-4.1-3.5c0.1-2.7,1.4-3.4,2.6-3.7 c1.5-0.4,3.7-0.6,6.7-0.6H129.1z"/><path style="fill:#5E2880;" d="M157.2,35.4c-1.1,0.2-2.3,0.3-3.5,0.3c-0.5,0-1.8,0-1.8-3.5V15.6h7.6V9h-7.6V0.9h-7.7V9h-5.8v6.6h5.8v16.7 	c0,8.8,5.2,10.7,9.5,10.7c1.6,0,3.4-0.3,5.3-1l1.2-0.4l-1.7-6.3L157.2,35.4z"/><path style="fill:#5E2880;" d="M189.9,22.3c-0.2-9-4.7-13.7-13-13.7h-1.6c-10.9,0-13.5,8.6-13.8,15.9l0,0.1c0,15.4,8.4,18.7,15.4,18.7 		c4,0,7.9-0.8,11.6-2.3l1.1-0.4l-1.6-6.2l-1.3,0.3c-3,0.7-6.2,1.1-9.7,1.1c-3.9,0-6.3-1.9-7.3-5.9h11.8 C186.9,29.8,189.9,27.2,189.9,22.3 M175.3,15.7h1.6c2.5,0,5.3,0.8,5.3,6.6c0,0.3-0.1,0.4-0.1,0.4c0,0-0.1,0.1-0.5,0.1h-12.3 C169.7,16.5,172.9,15.7,175.3,15.7"/>	<path style="fill:#5E2880;" d="M207.9,9h-1.3c-10.8,0-13,6-13,11.1v1.4v0.1c0.1,2.6,1,4.7,2.6,6.3c-1.2,1.6-1.9,3.1-1.9,4.7		c0,2.4,0.8,3.9,1.8,4.9c-2.7,2-4,4.4-4,7.1v0.8c0,8.2,8.6,9.9,15.8,9.9c12.2,0,14.8-5.4,14.8-9.9v-0.8c0-5.4-3.7-8.9-11-10.5 		l-8.9-1.4c-0.8-0.2-1.1-0.6-1.2-1.1c0.1-0.5,0.3-0.7,0.5-0.8c1.5,0.4,3,0.6,4.6,0.6h1.3c10.8,0,13.1-5.4,13.1-9.9l0-1.4 		c-0.1-1.7-0.3-3.3-0.9-4.6l3.4-0.2V9.6h-10C212.8,9.3,211.4,9,207.9,9 M201.4,20.1c0-4,2.7-4.5,5.3-4.5h1.3c2.6,0,5.3,0.5,5.3,4.5 		v1.4c0,1,0,3.3-5.3,3.3h-1.3c-5.3,0-5.3-2.3-5.3-3.3V20.1z M214.8,45.3c0,1.3-1.2,2.8-7,2.8c-7,0-8-1.7-8-2.8v-0.8 		c0.2-2,1.2-3.6,3.2-4.7l6.9,1.1c4.6,0.9,4.8,2.9,4.9,3.6V45.3z"/> <path style="fill:#5E2880;" d="M241.8,9h-1.2C228.6,9,226,17.9,226,25.3v1.6c0,7.4,2.5,16.2,14.6,16.2h1.2c9.7,0,14.8-5.6,14.8-16.2v-1.6 C256.6,17.9,254,9,241.8,9 M241.8,36h-1.2c-2.9,0-6.8-0.9-6.8-9.1v-1.6c0-8.2,3.9-9.2,6.8-9.2h1.2c3,0,7,1,7,9.2v1.6 C248.8,35,244.8,36,241.8,36"/><polygon style="fill:#5E2880;" points="45.1,21.9 56.7,6.5 56.7,1 50.1,1 39.8,14.8 29.5,1 23.2,1 23.2,6.8 34.5,21.9 23.2,37.1 23.2,42.9 29.5,42.9 39.8,29.1 50.1,42.9 56.7,42.9 56.7,37.4 	"/><polygon style="fill:#DB3634;" points="10.1,42.9 3.8,42.9 3.8,37.1 15.2,21.9 3.8,6.8 3.8,1 10.1,1 25.8,21.9 	"/><g><path style="fill:#5E2880;" d="M263.2,14.8c-0.6-0.3-1.1-0.6-1.6-1.1c-0.4-0.4-0.8-1-1-1.6c-0.3-0.6-0.4-1.3-0.4-2c0-0.7,0.1-1.4,0.4-2			c0.3-0.6,0.6-1.2,1-1.6c0.4-0.5,1-0.8,1.6-1.1c0.6-0.3,1.3-0.4,2-0.4c0.8,0,1.5,0.1,2.1,0.4c0.6,0.3,1.1,0.6,1.6,1.1			c0.4,0.4,0.8,1,1,1.6c0.3,0.6,0.4,1.3,0.4,2c0,0.7-0.1,1.4-0.4,2c-0.3,0.6-0.6,1.2-1,1.6c-0.4,0.5-1,0.8-1.6,1.1			c-0.6,0.3-1.3,0.4-2.1,0.4C264.5,15.2,263.8,15.1,263.2,14.8z M265.2,13.9c0.6,0,1.1-0.1,1.5-0.3c0.5-0.2,0.9-0.5,1.2-0.8			c0.3-0.3,0.6-0.7,0.8-1.2c0.2-0.4,0.3-0.9,0.3-1.5c0-0.6-0.1-1.1-0.3-1.5c-0.2-0.5-0.5-0.9-0.8-1.2c-0.3-0.3-0.7-0.6-1.2-0.8			c-0.5-0.2-1-0.3-1.5-0.3c-0.6,0-1.1,0.1-1.5,0.3c-0.5,0.2-0.9,0.5-1.2,0.8c-0.3,0.3-0.6,0.7-0.8,1.2c-0.2,0.5-0.3,1-0.3,1.5			c0,0.6,0.1,1.1,0.3,1.5c0.2,0.5,0.5,0.9,0.8,1.2c0.3,0.3,0.7,0.6,1.2,0.8C264.1,13.8,264.7,13.9,265.2,13.9z M265,10.8h-0.6v1.7 			h-1.2V7.6h1.9c1.3,0,1.9,0.5,1.9,1.6c0,0.7-0.3,1.2-0.9,1.4l1,1.9H266L265,10.8z M265.2,9.8c0.5,0,0.8-0.2,0.8-0.6 s-0.3-0.6-0.8-0.6h-0.7v1.1H265.2z"/></g></g></svg>
                        </a>
                    </div>

                    <!-- Navigation Links -->
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-jet-nav-link href="{{ route('curso.list') }}" class="text-[#6b6c6f] hover:text-[#5E2880] hover:border-[#DB3634] flex text-md font-bold {{ request()->routeIs('curso.list') ? 'text-[#5E2880] border-[#DB3634]' : '' }}" :active="request()->routeIs('curso.list')">
                            {{ __('Cursos') }}
                        </x-jet-nav-link>
                        <x-jet-nav-link href="#" class="text-[#6b6c6f] hover:text-[#5E2880] hover:border-[#DB3634] text-md font-bold " >
                            {{ __('Recursos') }}
                        </x-jet-nav-link>
                        <x-jet-nav-link href="#" class="text-[#6b6c6f] hover:text-[#5E2880] hover:border-[#DB3634] text-md font-bold " >
                            {{ __('Diplomados') }}
                        </x-jet-nav-link>
                        <x-jet-nav-link href="#" class="text-[#6b6c6f] hover:text-[#5E2880] hover:border-[#DB3634] text-md font-bold " >
                            {{ __('Membresías') }}
                        </x-jet-nav-link>
                        <x-jet-nav-link href="{{ route('eventos.index') }}" class="text-[#6b6c6f] hover:text-[#5E2880] hover:border-[#DB3634] text-md font-bold {{ request()->routeIs('eventos.index') ? 'text-[#5E2880] border-[#DB3634]' : '' }}" :active="request()->routeIs('eventos.index')">
                            {{ __('Eventos') }}
                        </x-jet-nav-link>
                        @auth
                            <x-jet-nav-link href="{{ route('dashboard') }}" class="text-[#6b6c6f] hover:text-[#5E2880] hover:border-[#DB3634] text-md font-bold {{ request()->routeIs('dashboard') ? 'text-[#5E2880] border-[#DB3634]' : '' }}" :active="request()->routeIs('dashboard')">
                                {{ __('Mis Cursos ') }}
                            </x-jet-nav-link>
                        @endauth
                        @guest
                          <x-jet-nav-link href="{{ route('login') }}" class=" text-white uppercase text-md bg-[#6b2b83] " :active="request()->routeIs('login')">
                              <span class="px-2">{{ __('Registrate') }}</span>
                          </x-jet-nav-link>
                        @endguest

                        <livewire:carrito.menu />
                    </div>
                </div>

                <div class="hidden sm:flex sm:items-center sm:ml-6  justify-end border-l-white border-l-2" >

                    @auth
                    <!-- Settings Dropdown -->
                    <div class="ml-3 relative">
                        <x-jet-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                    <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                        <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                    </button>
                                @else
                                    <span class="inline-flex rounded-md">
                                        <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                            {{ Auth::user()->name }}

                                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </span>
                                @endif
                            </x-slot>

                            <x-slot name="content">
                                <!-- Account Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Manage Account') }}
                                </div>

                                @auth
                                    <x-jet-dropdown-link href="{{ route('curso.administrador') }}" :active="request()->routeIs('curso.administrador')">
                                        {{ __('Administrador') }}
                                    </x-jet-dropdown-link>
                                @endauth

                                <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                    {{ __('Profile') }}
                                </x-jet-dropdown-link>

                                <div class="border-t border-gray-100"></div>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-jet-dropdown-link href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-jet-dropdown-link>
                                </form>
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
                    @else
                    @endauth
                </div>

                <!-- Hamburger -->
                <div class="-mr-2 flex items-center sm:hidden">
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <x-jet-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-jet-responsive-nav-link>
            </div>

            <!-- Responsive Settings Options -->

            @auth
                <div class="pt-4 pb-1 border-t border-gray-200">
                    <div class="flex items-center px-4">
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <div class="flex-shrink-0 mr-3">
                                <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            </div>
                        @endif

                        <div>
                            <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                            <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                        </div>
                    </div>

                    <div class="mt-3 space-y-1">
                        <!-- Account Management -->
                        <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                            {{ __('Profile') }}
                        </x-jet-responsive-nav-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-jet-responsive-nav-link>
                        </form>
                    </div>
                </div>
            @else
                <div class="ml-3 relative">
                    <x-jet-nav-link href="{{ route('login') }}" class="text-white uppercase text-lg" :active="request()->routeIs('login')">
                        {{ __('Ingreso') }}
                    </x-jet-nav-link>
                    <x-jet-nav-link href="{{ route('register') }}" class="text-white uppercase text-lg" :active="request()->routeIs('register')">
                        {{ __('Registro') }}
                    </x-jet-nav-link>
                </div>
            @endauth
        </div>
    </nav>
</header>
