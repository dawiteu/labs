<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-xl m-4 text-center md:text-left">
                        Gestion des Sujets (formulaire FRONT de contact) <br/>
                    </h3> 

                    {{-- <ul class="flex md:flex-row flex-col justify-center">
                        <a href="{{route('admin.blog.create')}}"><li class="m-3 p-3 bg-green-400 hover:bg-green-600">Ajouter un article</li></a>
                        {{-- <li class="m-3 p-3 bg-green-400 hover:bg-green-600">Modifier mes articles</li> --}}
                        {{-- @Webmaster --}}
                        {{-- <a href="{{route('categorie.index')}}"><li class="m-3 p-3 bg-green-600 hover:bg-green-400">Gérer catégories</li></a>
                        <a href="{{route('tag.index')}}"><li class="m-3 p-3 bg-green-400 hover:bg-green-600">Gérer TAGS </li></a>
                        <a href="{{route('admin.blog.valide','articles')}}"><li class="m-3 p-3 bg-green-400 hover:bg-green-600">Validation articles ({{ count($artovali) }}) </li></a>
                        <a href="{{route('admin.blog.valide','coms')}}"><li class="m-3 p-3 bg-green-400 hover:bg-green-600">Validation comms ({{ count($tovalide)}}) </li></a>
                        {{-- @endWebmaster --}}
                    {{-- </ul> --}}  

                    <div class="w-full flex md:flex-row flex-col justify-center">
                        <div class="col m-1 w-full">
                            <form action="{{route('subject.store')}}" method="POST" class="text-center">
                                @csrf
                                <input type="text" name="sujtitre" value="{{old('sujtitre')}}" />
                                <input type="submit" value="Ajouter>>" class="p-2 rounded-sm bg-gray-300" />
                                <br/> 
                                @error('sujtitre')
                                    <span class="text-red-500">{{$message}}</span>
                                @enderror
                            </form>
                        </div>
                        {{-- <div class="col m-1 w-full bg-gray-300">b</div> --}}
                        <div class="col m-1 w-full bg-gray-300">
                            <p class="text-center">Sujets: </p>
                            <div class="flex flex-col">
                                @forelse ($sujs as $suj)
                                    <div class="m-1 bg-purple-200 flex justify-between">
                                        <p>{{$suj->nom }} </p>
                                        <div class="flex"> 
                                            <p><a href="{{route('subject.edit', $suj)}}"><button class="bg-yellow-500 p-1 m-1  rounded" title="">M</button></a></p>
                                            <p><a href="{{route('subject.destroy', $suj)}}"><button class="bg-red-500 p-1 m-1  rounded" title="">X</button></a></p>
                                        </div>
                                    </div>
                                @empty
                                    <div>pas de sujets disponible..</div>
                                @endforelse

                                {{-- {{ $cats->links() }} --}}
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>