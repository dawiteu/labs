<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-xl m-4 text-center md:text-left">
                        Testimontial index: 
                    </h3> 

                    @if (count($tests) >= 0)
                        <table>
                            <tr class="text-center">
                                <td>#</td>
                                <td>Auteur / image</td>
                                <td>Description</td>
                                <td>Action</td>
                            </tr>
                            @foreach ($tests as $test)
                                <tr class="border-b-2">
                                    <td>{{ $test->id }}</td>
                                    <td><p class="text-center">{{ $test->author }}</p> <img src="{{ asset($test->author_image) }}" alt="{{ $test->author }}" class=" object-contain"></td>
                                    <td>{{ $test->description }}</td>
                                    <td>M | X </td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p>Pas de tests sur le site... </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
                    