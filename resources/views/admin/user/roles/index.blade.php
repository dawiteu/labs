<link rel="stylesheet" href="{{asset('css/style.css')}}">

<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-xl m-4 text-center md:text-left">
                        Gestion des membres :: Roles (index): <br/>
                    </h3> 

                    @Webmaster
                    <ul class="flex md:flex-row flex-col justify-center">
                        <a href="{{route('user.all')}}" class=" m-2 p-1 rounded-sm"><li class="m-3 p-3 bg-green-400 hover:bg-green-600">Gestion membres</li></a>
                        
                        <a href="{{route('user.create')}}" class=" m-2 p-1 rounded-sm"><li class="m-3 p-3 bg-green-400 hover:bg-green-600">Ajouter un membre</li></a>
                        <a href="{{route('admin.user.roleindex')}}" class=" m-2 p-1 rounded-sm"><li class="m-3 p-3 bg-green-600 hover:bg-green-400">Gestion rôles</li></a>
                        <a href="#" class=" m-2 p-1 rounded-sm"><li class="m-3 p-3 bg-green-400 hover:bg-green-600">Gestion postes</li></a>
                        <a href="{{route('user.act')}}" class="m-2  p-1 rounded-sm"><li class="m-3 p-3 bg-green-400 hover:bg-green-600">Liste d'activation</li></a>
                    </ul>
                @endWebmaster  

                    <div class="w-full flex md:flex-row flex-col justify-center">
                        <div class="col m-1 w-full">
                            <form action="{{route('admin.user.rolestore')}}" method="POST" class="text-center">
                                @csrf
                                <input type="text" name="rolename" value="{{old('rolename')}}" />
                                <input type="submit" value="Ajouter>>" class="p-2 rounded-sm bg-gray-300" />
                                <br/> 
                                @error('rolename')
                                    <span class="text-red-500">{{$message}}</span>
                                @enderror
                            </form>
                        </div>
                        {{-- <div class="col m-1 w-full bg-gray-300">b</div> --}}
                        <div class="col m-1 w-full bg-gray-300">
                            <p class="text-center">Rôles:</p>
                            <div class="flex flex-col">
                                @forelse ($roles as $role)
                                    <div class="m-1 bg-purple-200 flex justify-between">
                                        <p>{{$role->nom }} </p>
                                        <div class="flex"> 
                                            <p><a href="{{route('admin.user.roleedit', $role)}}"><button class="bg-yellow-500 p-1 m-1  rounded" title="">M</button></a></p>
                                            <p><a href="{{route('admin.user.roledestroy', $role)}}"><button class="bg-red-500 p-1 m-1  rounded" title="">X</button></a></p>
                                        </div>
                                    </div>
                                @empty
                                    <div>pas de roles disponible..</div>
                                @endforelse
                                    
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>