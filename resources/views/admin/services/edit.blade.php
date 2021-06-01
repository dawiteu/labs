<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-xl m-4 text-center md:text-left">Modification du service: ({{ $service->id }}) {{ $service->titre }} </h3> 
                    
                    <form action="#" method="POST">
                        @csrf
                        <div class="flex flex-col">
                            <label for="titre">Titre:</label>
                            <input type="text" name="titre" />
                        </div>

                        <div class="flex flex-col">
                            <label for="description">Description:</label>
                            <textarea name="description" id="desc" maxlength="200" cols="30" rows="10" style="resize:none;"></textarea>
                            <p class="text-right text-gray-400 strong"> <span id="limit"></span> / 200 </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        const desc = document.getElementById("desc"); 
        const span = document.getElementById("limit");
        desc.addEventListener("keydown", () => span.innerHTML = desc.value.length );
    </script>
</x-app-layout>