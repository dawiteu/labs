<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <form action="{{route('admin.blog.update', $article)}}" method="POST" enctype="multipart/form-data">
                @csrf
                    <h3 class="text-xl m-4 text-center md:text-left">Gestion du Blog :: Modifier l'article {{$article->id}} </h3>
                    <div class="text-center md:text-left">
                        <img src="{{asset($article->image)}}" alt="{{$article->titre}}" />
                        <div class="col bg-gray-200">
                            <label for="newimg">Image: 
                                <strong>Ne uploader que si vous voulez la modifier <strong>
                            </label><br/> 
                            <input type="file" name="newimg" />
                        </div>

                        
                        <div class="col bg-gray-200">

                            <label for="titre">Titre: </label>

                            <input type="text" name="titre" value="{{$article->titre}}" class="w-full">
                            
                        </div>

                        <div class="col bg-gray-200">

                            <label for="cat">Catégorie: </label>

                            <select name="cat">
                                @foreach ($cats as $cat)
                                    <option value="{{$cat->id}}">{{$cat->nom}}</option>
                                @endforeach
                            </select>

                        </div>

                        <div class="col bg-gray-200">
                        <label for="tags">Tags: </label> <br/> 
                            <div class="grid grid-flow-col grid-rows-3">
                                {{-- {{ dd($article->tags) }} --}}
                            @forelse ($tags as $tag)
                                <div class="col w-auto block">
                                    <input type="checkbox" name="taglist[]" value="{{$tag->id}}"
                                    @foreach ($article->tags as $taag)
                                        @if ($taag->nom == $tag->nom)
                                            checked
                                        @endif
                                    @endforeach
                                    >
                                    <label for="taglist[{{$tag->id}}]">{{$tag->nom}}</label>            
                                </div>                   
                            @empty
                                <span>pas de tags dans la db..</span>
                            @endforelse
                            </div>

                            <textarea class="mt-5 bg-gray-200 w-full" name="description"> {{$article->description }} </textarea>

                        </div>

                        <div class="text-center mt-5">
                            <button class=" mt-5 bgpurple collightblue font-bold py-2 px-4 rounded">Modifier</button>
                        </div>
                
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>                   