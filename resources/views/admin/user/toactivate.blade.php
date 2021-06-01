<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                
                @include('layouts.flash')  



                <div class="p-6 bg-white border-b border-gray-200">
                    @Webmaster
                    <h3 class="text-xl m-4 text-center md:text-left"> 
                        Liste des membres à activer: 

                        <fieldset class="w-full md:w-3/6 border-gray-400 bg-gray-200 p-3 my-5 text-left">
                            <legend class="underline">!! Notes importante:</legend>
                            <p>Si vous refuser un utilisateur son compte sera bloqué. <br/></p>
                        </fieldset>

                    </h3>
                    @if (count($ustoacts) <= 0)
                        <p>Pas d'utilisateur en attente... </p>
                    @else
                        <table class="tableusers">
                            <tr>
                                <td>Nom</td>
                                <td>Prénom</td>
                                <td>Poste</td>
                                <td>Rôle</td>
                                <td>Activation</td>
                            </tr>
                        @foreach ($ustoacts as $user)
                            <tr>
                                <td>{{ $user->nom }}</td>
                                <td>{{ $user->prenom }}</td>
                                <td>{{ $user->poste->nom }}</td>
                                <td>{{ $user->role->nom }}</td>
                                <td> 
                                    <a href="{{route('user.activate', ['user' => $user->id, 'proced' => 'act'])}}">
                                        <button class="bg-green-400 hover:bg-green-600 rounded-sm p-1">Activer</button> 
                                    </a>
                                    | 
                                    <a href="{{route('user.activate',  ['user' => $user->id, 'proced' => 'ref'])}}">
                                        <button class="bg-red-400 hover:bg-red-600 rounded-sm p-1">Refuser</button>
                                    </a>
                                </td>
                        @endforeach
                    @endif
                    @endWebmaster
                </div>
            </div>
        </div>
    </div>
</x-app-layout>