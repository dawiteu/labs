<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="w-full mx-auto px-6 sm:px-7 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex flex-col items-center mt-3">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                    </a>
                    <p class="text-red-600 font-bold">AdminPanel</p>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    
                    <x-nav-link :href="route('home')">
                        {{ __('Home') }}
                    </x-nav-link>

                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Admin Home') }}
                    </x-nav-link>
                                
                    <x-nav-link :href="route('user.show', Auth::user()->id)" :active="request()->routeIs('user.show')"> 
                        {{ __('Profil') }}
                    </x-nav-link>

                    <x-nav-link :href="route('user.all')" :active="request()->routeIs('user.all')"> 
                        {{ __('Membre') }}
                    </x-nav-link>

                    {{-- <x-nav-link :href="route('user.create')" :active="request()->routeIs('user.create')"> 
                        {{ __('Membre') }}
                    </x-nav-link> --}}

                    <x-nav-link :href="route('logout')" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="float:right;">   
                        <form id="logout-form" method="POST" action="{{ route('logout') }}">
                            @csrf        
                            {{ __('Log out') }}
                        </form>    
                    </x-nav-link>
                
                    

                </div>

            </div>
            
            
            <button class="flex flex-col items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                <div class="flex flex-col bg-gray-300 p-1 rounded-md">
                    <img src="{{ asset(Auth::user()->image) }} " alt="{{ Auth::user()->nom }} {{ Auth::user()->prenom }}" class="object-contain h-10">
                    <p>{{ Auth::user()->nom }} {{ Auth::user()->prenom }} </p> 
                    <p class="
                            @switch(Auth::user()->role->id) 
                                @case(1)             text-red-600    @break
                                @case(2)             text-yellow-600 @break
                                @case(2)             text-blue-400   @break
                                @default @case(4)    text-purple-500 @break
                            @endswitch
                        ">
                        {{ Auth::user()->role->nom }} 
                    </p>
                </div>
            </button>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
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
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
