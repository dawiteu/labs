<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-xl m-4 text-center md:text-left">Liste des services : <a href="{{route('service.create')}}" class="bg-green-400 hover:bg-green-300 rounded-md p-1">Ajouter un service</a></h3> 
                    @if (count($services) > 0)
                        <table class="w-full">
                            <tr class="text-center">
                                <td>#</td>
                                <td>Icon</td>
                                <td>Titre</td>
                                <td class="hidden md:table-cell">Description</td>
                                <td>Action</td>
                            </tr>
                        
                            @foreach ($services as $service)
                                <tr class="border-2">
                                    <td>{{ $service->id }}</td>
                                    <td><i class="{{ $service->icone }}"></i></td>
                                    <td>{{ $service->titre }}</td>
                                    <td class="hidden md:table-cell">{{ $service->description }}</td>
                                    <td class="flex">
                                        <a href="{{route('service.edit', $service->id) }}" class="bg-yellow-500 p-1 m-1 hover:bg-yellow-300 rounded">M</a>
                                        <form action="{{route('service.del', $service->id)}}" method="POST">
                                            @csrf
                                            <button type="submit" class="bg-red-500 p-1 m-1 hover:bg-red-300 rounded">X</button>
                                        </form>
                                    </td>
                                </tr> 
                            @endforeach
                        </table>

                        <div class="mt-3">
                            {{ $services->links() }}
                        </div>
                    @else
                        <p>Pas de services enregistré..</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>