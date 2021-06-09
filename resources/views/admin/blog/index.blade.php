<link rel="stylesheet" href="{{asset('css/style.css')}}">

<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-xl m-4 text-center md:text-left">Gestion du Blog</h3>
    
                    <ul class="flex justify-center">
                        <li class="m-3 p-3 bg-green-400 hover:bg-green-600">Ajouter un article</li>
                    </ul>

                    <fieldset class="w-full md:w-3/6 border-gray-400 bg-gray-200 p-3 my-5 text-left rounded">
                        <legend class="underline">!! Notes importante:</legend>
                        <p><button class="bg-green-500 p-1 m-1  rounded">S</button> - Regarde l'article en détails </p>
                        <p><button class="bg-yellow-500 p-1 m-1  rounded" >M</button> - Modifie l'article </p>
                        <p><button class="bg-red-500 p-1 m-1  rounded" >X</button> - Supprime l'article</p>
                    </fieldset> 

                    <table class="w-full">
                        <tr class="underline">
                            <td>#</td>
                            <td>Image</td>
                            <td>Titre</td>
                            <td>Action</td>
                        </tr>
                        @forelse ($arts as $art)
                            <tr>
                                <td>{{ $art->id }}</td>
                                <td><img src="{{ asset($art->image) }}" alt="{{ $art->titre }}" style="max-height:50px;"></td>
                                <td>{{ $art->titre }}</td>
                                <td>
                                    <a href="{{route('admin.blog.show', $art)}}">
                                        <button class="bg-green-500 p-1 hover:bg-green-300 rounded" title="Regarde l'article en détails">S</button>                        
                                    </a>
                                    <a href="#">
                                        <button class="bg-yellow-500 p-1 hover:bg-yellow-300 rounded" title="Modifie l'article">M</button>
                                    </a>
                                    <a href="#">
                                        <button class="bg-red-500 p-1 hover:bg-red-300 rounded" title="supprime l'article">X</button> 
                                    </a>
                                </td>
                            </tr>
                        @empty
                            
                        @endforelse
                    </table>
                    
                    <div class="page-pagination">
                    {{ $arts->links('vendor/pagination/default') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
                           