<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-xl">Create User Blade</h3>
                    <form action="{{route('user.store') }}" method="POST">
                        @csrf

                        <div class="row flex flex-wrap">
                                    {{-- Form nom de famille:  --}}
                            <div class="w-full md:w-3/6 flex flex-wrap">

                                <div class="col w-3/6 flex justify-center items-center">
                                    <label for="nom">Nom de famille:</label> 
                                </div>

                                <div class="col w-3/6 flex justify-center items-center">
                                    <input type="text" name="nom" placeholder="nom de famille" class="w-full" value="{{old('nom')}}" />
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
                                    <input type="text" name="prenom" placeholder="prenom de l'utilisateur" class="w-full" value="{{old('prenom')}}"  />
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
                                    <input type="text" name="email" placeholder="@ de l'utilisateur" class="w-full" value="{{old('email')}}"  />
                                </div>
                                
                                <div class="col w-full text-right text-red-600 font-bold">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            {{-- form Role user  --}}
                            
                            <div class="w-full md:w-3/6 flex flex-wrap">
                                <div class="col w-3/6  flex justify-center items-center">
                                    <label for="role">Role:</label> 
                                </div>
                                <div class="col w-3/6 flex justify-center items-center">
                                    <select name="role" class="w-full" >
                                        @foreach ($roles->reverse() as $role) {{-- on fait un reverse pour que membre soit premier --}}
                                            <option value="{{$role->id}}" {{ $role->id == old('role') ? 'selected' : ''}}>{{$role->nom}}</option>
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
                                            <option value="{{$poste->id}}" {{ $role->id == old('poste') ? 'selected' : ''}}>{{$poste->nom}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- <div class="col w-full text-center bg-red-500">Erreur 100 %</div> --}}
                            </div>



                            {{-- Submit  --}}
                            <div class="w-full my-8 flex flex-wrap">

                                <fieldset class="border-gray-400 bg-gray-200 p-3 my-5">
                                    <legend class="underline">!! Notes importante:</legend>
                                    <p>L'utilisateur devra activer son compte. <br/> 
                                    Toutes les instructions lui seront envoyées par e-mail.</p>
                                </fieldset>

                                <div class="col w-full text-center">
                                    <button class="bgpurple collightblue font-bold py-2 px-4 rounded">Ajouter un utilisateur</button>
                                </div>
                            </div>
                        
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
