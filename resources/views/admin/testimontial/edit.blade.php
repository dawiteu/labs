<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-xl m-4 text-center md:text-left">
                        Testimontial Create: 
                    </h3> 
                    <form action="{{route('testimontial.update', $testimontial)}}" method="POST" enctype="multipart/form-data">
                        @csrf    
                        <div class="mt-3 bg-gray-300 flex flex-col">
                            <label for="author">Auteur:</label>
                            <input type="text" name="author" value="{{$testimontial->author}}"/>
                            @error('author')
                                <p class="text-red-500">{{$message}} </p>
                            @enderror
                        </div>
                        <div class="mt-3 bg-gray-300 flex flex-col">
                            <label for="authimg">Image de l'auteur:</label>
                            <img src="{{asset($testimontial->author_image)}}" alt="{{$testimontial->author}}" style="max-height:300px; max-width:300px; margin:0 auto;" class="rounded-md">
                            <strong>upload que si modif.</strong>
                            <input type="file" name="authimg" />
                            @error('authimg')
                                <p class="text-red-500">{{$message}} </p>
                            @enderror
                        </div>
                        <div class="mt-3 bg-gray-300 flex flex-col">
                            <label for="description">Description:</label>
                            <textarea name="description" cols="30" rows="10">{{$testimontial->description}}</textarea>
                            @error('description')
                                <p class="text-red-500">{{$message}} </p>
                            @enderror
                        </div>
                        <div class="mt-3 bg-gray-300 flex flex-col">
                            <label for="poste">Poste dans l'entreprise:</label>
                            <input type="text" name="poste" value="{{$testimontial->poste}}" />
                            @error('poste')
                                <p class="text-red-500">{{$message}} </p>
                            @enderror
                        </div>

                        <div class="mt-6  flex flex-col">
                            <input type="submit" value="Envoyer >> " class="bg-green-500 text-purple-700 w-max p-1 rounded-md mx-auto" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>