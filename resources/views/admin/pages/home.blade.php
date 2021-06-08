<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-xl m-4 text-center md:text-left">
                        Choississez une page pour la modifier: 
                    </h3>
                    <ul>
                        <li><a href="{{ route('pages.edit', "home")  }}">Home</a></li>
                        <li><a href="{{ route('pages.edit', "home-car")  }}">Home (Carousel) </a></li>
                        <li><a href="{{ route('pages.edit', "services") }}">Services</a></li>
                        <li><a href="{{ route('pages.edit', "contact" ) }}">Contact (+footer) </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>