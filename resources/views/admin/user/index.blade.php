<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-xl">Index Membre Blade</h3>
                    
                    <table class="tableusers">
                        <tr>
                            <td>#</td>
                            <td>Image</td>
                            <td>Nom</td>
                            <td>Prénom</td>
                            <td>Email</td>
                            <td>Role</td>
                            <td>Poste</td>
                            <td>Activé</td>
                            <td>Description</td>
                            @isAdmin
                            <td>Action</td>
                            @endisAdmin
                        </tr>

                        @foreach ($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td><img src="{{asset($user->image) }}" alt="{{$user->nom}} {{$user->prenom}}" class="h-10" /> </td>
                                <td>{{ $user->nom }}</td>
                                <td>{{ $user->prenom }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role->nom }}</td>
                                <td>{{ $user->poste->nom }}</td>
                                <td>{{ $user->active == '1' ? 'oui' : 'non' }}</td>
                                <td>{{ $user->description }} </td>
                                <td> 
                                    <button class="bg-purple-500 p-1 hover:bg-purple-300 rounded" title="change le status de l'activation">A</button>
                                    <button class="bg-green-500 p-1 hover:bg-green-300 rounded" title="Regarde le profil en détails">S</button>
                                    <a href="{{route('user.show', $user->id)}}">
                                        <button class="bg-yellow-500 p-1 hover:bg-yellow-300 rounded" title="Modifie le profil">M</button>
                                    </a>
                                    <button class="bg-red-500 p-1 hover:bg-red-300 rounded" title="supprime le profil">X</button> 
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
