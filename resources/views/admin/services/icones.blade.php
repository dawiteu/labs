<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between">
                        <h3 class="text-xl m-4 text-center md:text-left">Liste des icones: </h3> 
                        <p class="m-3 text-right text-gray-500">Icones disponibles: <span id="counts">{{count($allservs)}}</span></p>
                    </div>
                    <div class="my-4">
                        <input  class="w-full" 
                                type="text" 
                                name="query" 
                                id="query" 
                                placeholder="Entrer un nom pour commancer une recherche avancée" />
                    </div>
                    <div id="results" class="flex flex-wrap">
                        @for ($i = 0; $i < count($allservs); $i++)
                            {{-- <script>tab.push( @php $allservs[$i] @endphp )</script>  --}}
                            <div class="m-5 ico w-max flex flex-col justify-center text-center selecticon" data="{{$allservs[$i]}}">
                                <i style="font-size:4rem;" class="{{ $allservs[$i] }} bg-gray-200" title="{{$allservs[$i]}}"></i>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
                    