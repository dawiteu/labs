<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                        <h3 class="text-xl m-4 text-center md:text-left">
                        Gestion des membres <br/></h3> 
                        {{-- {{ dd( request()->is('admin/user/*')  ? 'oui' : 'non' ) }} --}}
                        @Webmaster
                            <ul class="flex md:flex-row flex-col justify-center">
                                <a href="{{route('user.create')}}" class=" m-2 p-1 rounded-sm"><li class="m-3 p-3 bg-green-400 hover:bg-green-600">Ajouter un membre</li></a>
                                <a href="{{route('role.index')}}" class=" m-2 p-1 rounded-sm"><li class="m-3 p-3 bg-green-400 hover:bg-green-600">Gestion rôles</li></a>
                                <a href="{{route('postes.index')}}" class=" m-2 p-1 rounded-sm"><li class="m-3 p-3 bg-green-400 hover:bg-green-600">Gestion postes</li></a>
                                <a href="{{route('user.act')}}" class="m-2  p-1 rounded-sm"><li class="m-3 p-3 bg-green-400 hover:bg-green-600">Liste d'activation</li></a>
                            </ul>
                            
                            <fieldset class="w-full md:w-3/6 border-gray-400 bg-gray-200 p-3 my-5 text-left rounded">
                                <legend class="underline">!! Notes importante:</legend>
                                <p><button class="bg-green-500 p-1 m-1  rounded">S</button> - Regarde le profil en détails </p>
                                <p><button class="bg-yellow-500 p-1 m-1  rounded" title="">M</button> - Modifie le profil</p>
                                <p><button class="bg-red-500 p-1 m-1  rounded" title="">X</button> - Supprime le profil</p>
                            </fieldset> 
                        @endWebmaster  
                    
                    <h3 class="text-xl m-4 text-center md:text-left">
                        Liste de tous les membres <br/></h3> 
                    <table class="tableusers">
                        <tr>
                            <td>#</td>
                            <td>Image</td>
                            <td>Nom</td>
                            <td>Prénom</td>
                            <td class="hidden md:table-cell">Email</td>
                            <td class="hidden md:table-cell">Role</td>
                            <td class="hidden md:table-cell">Poste</td>
                            <td>Activé</td>
                            <td class="hidden xl:table-cell">Description</td>
                            @Webmaster
                            <td>Action</td>
                            @endWebmaster
                        </tr>

                        @foreach ($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td><img src="{{asset($user->image) }}" alt="{{$user->nom}} {{$user->prenom}} -avatar" class="h-10" /> </td>
                                <td>{{ $user->nom }}</td>
                                <td>{{ $user->prenom }}</td>
                                <td class="hidden md:table-cell">{{ $user->email }}</td>
                                <td class="hidden md:table-cell">{{ $user->role->nom }}</td>
                                <td class="hidden md:table-cell">{{ $user->poste->nom }}</td>
                                <td>{{ $user->active == '1' ? 'oui' : 'non' }}</td>
                                <td class="hidden xl:table-cell">{{ $user->description }} </td>
                                @Webmaster
                                <td>
                                    <a href="{{route('user.show', $user->id)}}">
                                        <button class="bg-green-500 p-1 hover:bg-green-300 rounded" title="Regarde le profil en détails">S</button>
                                    </a>
                                    <a href="{{route('user.edit', $user->id)}}">
                                        <button class="bg-yellow-500 p-1 hover:bg-yellow-300 rounded" title="Modifie le profil">M</button>
                                    </a>
                                        @if ((Auth::user()->role_id == 1) && (Auth::user()->id != $user->id))
                                        <button class="bg-red-500 p-1 hover:bg-red-300 rounded" title="supprime le profil">X</button> 
                                    @endif 
                                </td>
                                @endWebmaster
                            </tr>
                        @endforeach
                    </table>

                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
