<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-xl m-4 text-center md:text-left">Modification du service: ({{ $service->id }}) {{ $service->titre }} </h3> 
                    
                    <form action="#" method="POST">
                        @csrf
                        <div class="flex flex-col md:w-2/6">
                            <i style="font-size:4rem;" class="{{$service->icone}}" id="displnewicon"></i>
                            <div class="flex justify-between">
                                <label for="icone">Icon: </label>
                                <a href="#" onClick="window.open('{{route('services.icones'),'Selection d\'icones - Labs-Studio.com',"height=200,width=200"}}').focus();return false;" class="text-blue-400 hover:text-blue-600 hover:no-underline underline text-right">Liste complète des icones.</a>
                        
                            </div> 
                            
                            <input type="text" name="icon" value="{{$service->icone}}" id="setnewicon" />
                            </div>
                        <div class="mt-4 flex flex-col md:w-2/6">
                            <label for="titre">Titre:</label>
                            <input type="text" name="titre" value="{{$service->titre}}" />
                        </div>

                        <div class="mt-4 flex flex-col md:w-4/6">
                            <label for="description">Description:</label>
                            <textarea name="description" id="desc" maxlength="200" cols="30" rows="10" style="resize:none;">{{$service->description}}</textarea>
                            <p class="text-right text-gray-400 strong"> <span id="limit">0</span> / 200 </p>
                        </div>


                        <div class="flex flex-col md:w-1/6">
                            <input type="submit" value="Modifier" class="bg-green-400 hover:bg-green-300 rounded:md" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        const desc      = document.getElementById("desc");
        const descval   =  document.getElementById("desc").value; 
        const span      = document.getElementById("limit");
        span.innerHTML  = descval.length;
        desc.addEventListener("keydown", () => span.innerHTML = desc.value.length );
    </script>
</x-app-layout>