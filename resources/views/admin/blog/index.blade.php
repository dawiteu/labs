<link rel="stylesheet" href="{{asset('css/style.css')}}">

<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-xl m-4 text-center md:text-left">Gestion du Blog</h3>
    
                    <ul class="flex md:flex-row flex-col justify-center">
                        <a href="{{route('admin.blog.create')}}"><li class="m-3 p-3 bg-green-400 hover:bg-green-600">Ajouter un article</li></a>
                        {{-- <li class="m-3 p-3 bg-green-400 hover:bg-green-600">Modifier mes articles</li> --}}
                        @Webmaster
                        <a href="{{route('categorie.index')}}"><li class="m-3 p-3 bg-green-400 hover:bg-green-600">Gérer catégories</li></a>
                        <a href="{{route('tag.index')}}"><li class="m-3 p-3 bg-green-400 hover:bg-green-600">Gérer TAGS </li></a>
                        <a href="{{route('admin.blog.valide','articles')}}"><li class="m-3 p-3 bg-green-400 hover:bg-green-600">Validation articles ({{ count($artovali) }}) </li></a>
                        <a href="{{route('admin.blog.valide','coms')}}"><li class="m-3 p-3 bg-green-400 hover:bg-green-600">Validation comms ({{ count($tovalide)}}) </li></a>
                        @endWebmaster
                    </ul>
                    
                    {{-- @Webmaster --}}
                    <fieldset class="w-full md:w-3/6 border-gray-400 bg-gray-200 p-3 my-5 text-left rounded">
                        <legend class="underline">!! Notes importante:</legend>
                        <p><button class="bg-green-500 p-1 m-1  rounded">S</button> - Regarde l'article en détails </p>
                        <p><button class="bg-yellow-500 p-1 m-1  rounded" >M</button> - Modifie l'article </p>
                        <p><button class="bg-red-500 p-1 m-1  rounded" >X</button> - Supprime l'article</p>
                        <p class="bg-green-200">Article en attente de validation</p>
                        {{-- @Webmaster
                        <p><button class="p-1 m-1 rounded" >Com ATT</button>Commantaire en attente</p>
                        @endWebmaster --}}
                    </fieldset> 

                    <table class="w-full">
                        <tr class="underline">
                            <td>#</td>
                            <td>Image</td>
                            <td>Titre</td>
                            <td>Action</td>
                        </tr>
                        @forelse ($arts as $art)
                            @if ($art->user_id == Auth::user()->id || Auth::user()->role_id < 3)                                
                                <tr class="{{$art->valide == 0 ? 'bg-green-200' : ''}}">
                                    <td>{{ $art->id }}</td>
                                    <td><img src="{{ asset($art->image) }}" alt="{{ $art->titre }}" style="max-height:50px;"></td>
                                    <td>{{ $art->titre }}</td>
                                    <td>
                                        <a href="{{route('admin.blog.show', $art)}}">
                                            <button class="bg-green-500 p-1 hover:bg-green-300 rounded" title="Regarde l'article en détails">S</button>                        
                                        </a>
                                        <a href="{{route('admin.blog.edit', $art)}}">
                                            <button class="bg-yellow-500 p-1 hover:bg-yellow-300 rounded" title="Modifie l'article">M</button>
                                        </a>
                                        <form action="{{route('admin.blog.destroy', $art)}}" method="POST" class="inline">
                                            @csrf
                                            <button class="bg-red-500 p-1 hover:bg-red-300 rounded" title="supprime l'article">X</button> 
                                        </form>
                                    </td>
                                </tr>
                            @endif
                        @empty
                            
                        @endforelse
                    </table>
                    
                    <div class="page-pagination">
                    {{ $arts->links('vendor/pagination/default') }}
                    </div>
                    {{-- @endWebmaster --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>                     