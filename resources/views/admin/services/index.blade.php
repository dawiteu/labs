<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-xl m-4 text-center md:text-left">Liste des services :</h3> 
                    @if (count($services) > 0)
                        <table>
                            <tr>
                                <td>#</td>
                                <td>Icon</td>
                                <td>Titre</td>
                                <td>Description</td>
                            </tr>
                        
                            @foreach ($services as $service)
                                <tr>
                                    <td>{{ $service->id }}</td>
                                    <td><i class="{{ $service->icone }}"></i></td>
                                    <td>{{ $service->titre }}</td>
                                    <td>{{ $service->description }}</td>
                                </tr>
                            @endforeach
                        </table>

                        {{ $services->links() }}
                    @else
                        <p>Pas de services enregistré..</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>