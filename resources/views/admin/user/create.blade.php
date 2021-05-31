<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-xl">Create User Blade</h3>
                    <form action="" method="POST">
                        @csrf

                        <div class="row flex">
                                    {{-- Form nom de famille:  --}}
                            <div class="w-3/6 flex flex-wrap">
                                <div class="col w-2/6 bg-red-400 flex justify-center items-center">
                                    <label for="nom">Nom de famille:</label> 
                                </div>
                                <div class="col w-4/6 bg-red-400 flex justify-center items-center">
                                    <input type="text" name="nom" placeholder="nom de famille" class="w-5/6" />
                                </div>
                                <div class="col w-full text-center bg-red-500">Erreur 100 %</div>
                            </div>

                            {{-- Form prenom  --}}
                            <div class="w-3/6 flex flex-wrap">
                                <div class="col w-2/6 bg-red-400 flex justify-center items-center">
                                    <label for="prenom">Prénom:</label> 
                                </div>
                                <div class="col w-4/6 bg-red-400 flex justify-center items-center">
                                    <input type="text" name="prenom" placeholder="prenom de l'utilisateur" class="w-5/6" />
                                </div>
                                
                                <div class="col w-full text-center bg-red-500">Erreur 100 %</div>
                            </div>

                            
                            <div class="w-3/6 flex flex-wrap">
                                <div class="col w-2/6 bg-red-400 flex justify-center items-center">
                                    <label for="prenom">Prénom:</label> 
                                </div>
                                <div class="col w-4/6 bg-red-400 flex justify-center items-center">
                                    <input type="text" name="prenom" placeholder="prenom de l'utilisateur" class="w-5/6" />
                                </div>
                                
                                <div class="col w-full text-center bg-red-500">Erreur 100 %</div>
                            </div>
                        
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
