<x-app-layout>
    
    @include('layouts.flash') 

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p>Bienvenu au centre de commandement. </p>
                    @if (Auth::user()->def_pass == 1)
                        <p class="text-red-500 bg-red-200">Attention! Votre mot de passe <b>doit</b> être changé.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
