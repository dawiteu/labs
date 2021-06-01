<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-xl">Profil de : {{$user->nom}} {{$user->prenom}}</h3>

                    <div class="row w-full md:flex">
                        <div class="w-full md:w-2/6">
                            <img src="{{asset($user->image)}}" alt="{{$user->nom}} {{$user->prenom}} - avatar" class="h-2/4 bg-gray-200 rounded mx-auto" />
                        </div>
                        <div class="w-full md:w-4/6">
                            <div class="w-full">

                                @if ( $user->deleted == 1)
                                    <p class="text-center text-red-500 font-bold ">Attention! ce compte est bloqué.</p>
                                @endif
                                
                                <p class="text-center md:w-3/6 md:text-left p-1"><span class="underline font-bold">Nom:</span> {{ $user->nom }}</p> 
                                <p class="text-center md:w-3/6 md:text-left p-1"><span class="underline font-bold">Prénom: </span>{{ $user->prenom }}</p> 
                                <p class="text-center md:w-3/6 md:text-left p-1"><span class="underline font-bold">Email: </span>{{ $user->email }}</p> 
                                <p class="text-center md:w-3/6 md:text-left p-1"><span class="underline font-bold">Role: </span>{{ $user->role->nom }}</p> 
                                <p class="text-center md:w-3/6 md:text-left p-1"><span class="underline font-bold">Poste: </span>{{ $user->poste->nom }}</p> 
                                <p class="text-center md:w-3/6 md:text-left p-1"><span class="underline font-bold">Activé: </span> {{ $user->active == 1 ? 'Activé' : 'non-activé' }}</p>
                                <p class="text-center md:w-3/6 md:text-left p-1"><span class="underline font-bold">Supprimé: </span> {{ $user->deleted == 1 ? 'oui' : 'non' }}</p>
                                <p class="text-center md:w-3/6 md:text-left p-1"><span class="underline font-bold">Créer le: </span> {{ $user->created_at->format('d/m/Y H:i:s') }} </p>
                                <p class="text-center md:w-3/6 md:text-left p-1"><span class="underline font-bold">Créer par: </span> {{ $user->created_by }} </p>
                                <p class="text-center md:w-3/6 md:text-left p-1"><span class="underline font-bold">Description: </span> <br/> {{ $user->description }} </p>
                                
                            </div>
                        </div>
                    </div>

                    <div class="row w-full">
                        
                    </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>