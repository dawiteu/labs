<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (Auth::user()->role_id <= 2 || Auth::user()->id == $user->id)
                        <h3 class="text-xl m-4 text-center md:text-left"> Modification de {{ $user->prenom }} {{$user->nom }} </h3>
                        <form action="" method="POST">
                            @csrf
                            @method('PUT')

                        <div class="row flex flex-wrap">
                                    {{-- Form nom de famille:  --}}
                            <div class="w-full md:w-3/6 flex flex-wrap">

                                <div class="col w-3/6 flex justify-center items-center">
                                    <label for="nom">Nom de famille:</label> 
                                </div>

                                <div class="col w-3/6 flex justify-center items-center">
                                    <input type="text" name="nom" placeholder="nom de famille" class="w-full" value="{{ $user->nom }}" />
                                </div>

                                <div class="col w-full text-right text-red-600 font-bold">
                                    @error('nom')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            {{-- Form prenom  --}}
                            <div class="w-full md:w-3/6 flex flex-wrap">
                                <div class="col w-3/6  flex justify-center items-center">
                                    <label for="prenom">Prénom:</label> 
                                </div>
                                <div class="col w-3/6  flex justify-center items-center">
                                    <input type="text" name="prenom" placeholder="prenom de l'utilisateur" class="w-full" value="{{ $user->prenom }}"  />
                                </div>
                                
                                <div class="col w-full text-right text-red-600 font-bold">
                                    @error('prenom')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            {{-- form Email user  --}}
                            
                            <div class="w-full md:w-3/6 flex flex-wrap">
                                <div class="col w-3/6 flex justify-center items-center">
                                    <label for="email">Email:</label> 
                                </div>
                                <div class="col w-3/6  flex justify-center items-center">
                                    <input type="text" name="email" placeholder="@ de l'utilisateur" class="w-full" value="{{$user->email}}"  />
                                </div>
                                
                                <div class="col w-full text-right text-red-600 font-bold">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            {{-- form Role user  --}}
                            @Admin
                            <div class="w-full md:w-3/6 flex flex-wrap">
                                <div class="col w-3/6  flex justify-center items-center">
                                    <label for="role">Role:</label> 
                                </div>
                                <div class="col w-3/6 flex justify-center items-center">
                                    <select name="role" class="w-full" >
                                        @foreach ($roles->reverse() as $role) {{-- on fait un reverse pour que membre soit premier --}}
                                            <option value="{{$role->id}}" {{ $role->id == $user->role_id ? 'selected' : ''}}>{{$role->nom}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- <div class="col w-full text-center bg-red-500">Erreur 100 %</div> --}}
                            </div>

                            {{-- form Poste user  --}}
                            
                            <div class="w-full md:w-3/6 flex flex-wrap">
                                <div class="col w-3/6  flex justify-center items-center">
                                    <label for="poste">Poste:</label> 
                                </div>
                                <div class="col w-3/6  flex justify-center items-center">
                                    <select name="poste" class="w-full" >
                                        @foreach ($postes as $poste)
                                            <option value="{{$poste->id}}" {{ $poste->id == $user->poste_id ? 'selected' : ''}}>{{$poste->nom}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- <div class="col w-full text-center bg-red-500">Erreur 100 %</div> --}}
                            </div>
                            @endAdmin
                            <div class="w-full md:w-3/6 flex flex-wrap mt-2">
                                <div class="col w-3/6  flex justify-center items-center">
                                    <label for="image">Image:</label> 
                                </div>
                                <div class="col w-3/6  flex justify-center items-center">
                                    <img src="{{asset($user->image)}}" alt="avatar de {{$user->prenom}} {{$user->nom}}" class="bg-gray-300 rounded-md">
                                </div>
                                {{-- <div class="col w-full text-center bg-red-500">Erreur 100 %</div> --}}
                            </div>



                            {{-- Submit  --}}
                            <div class="w-full my-8 flex flex-wrap">
                                <div class="col w-full text-center">
                                    <button class="bgpurple collightblue font-bold py-2 px-4 rounded">Modifier</button>
                                </div>
                            </div>
                        </form>
                        </div>
                    @else 
                        interdit
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
