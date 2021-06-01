<nav id="mySidenav" class="sidenav text-center">
    <!-- Logo -->
    <div class="flex-shrink-0 flex flex-col items-center mt-3 bg-gray-100">
        <a href="{{ route('dashboard') }}">
            <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
        </a>
        <p class="text-red-600 font-bold">AdminPanel</p>
    </div>

    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

    <div class="flex flex-col bg-gray-300 m-2 rounded-md text-center">
            <img src="{{ asset(Auth::user()->image) }} " alt="{{ Auth::user()->nom }} {{ Auth::user()->prenom }}" class="object-contain">
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

    <x-nav-link :href="route('home')">
        {{ __('Home') }} 
    </x-nav-link>
    
    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">   
        {{ __('Admin Home') }}
    </x-nav-link>

    <x-nav-link :href="route('user.show', Auth::user()->id)" :active="request()->routeIs('user.show')"> 
        {{ __('Votre Profil') }}
    </x-nav-link>

    @Webmaster
        <x-nav-link :href="route('user.all')" :active="request()->is('/admin/user/all')"> 
            
            {{ __('Gestion membres') }}
        </x-nav-link>

        <x-nav-link :href="route('newsletter.all')" :active="request()->is('/admin/newsletter/all')"> 
            
            {{ __('Gestion Newsletter') }}
        </x-nav-link>

        <x-nav-link :href="route('services.all')" :active="request()->is('/admin/services/all')"> 
            
            {{ __('Gestion Services') }}
        </x-nav-link>
        
    @endWebmaster

        <x-nav-link :href="route('logout')" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">   
            <form id="logout-form" method="POST" action="{{ route('logout') }}">
                @csrf        
                {{ __('Log out') }}
            </form>    
        </x-nav-link>
</nav>
