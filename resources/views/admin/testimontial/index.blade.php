<link rel="stylesheet" href="{{asset('css/style.css')}}">
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-xl m-4 text-center md:text-left">
                        Testimontial index: <a href="{{route('testimontial.create')}}" class="p-1 bg-green-400 hover:bg-green-600">Ajouter >></a>
                    </h3> 

                    @if (count($tests) >= 0)
                        <table class="w-full text-center">
                            <tr class="underline">
                                <td>#</td>
                                <td>Auteur / image</td>
                                <td>Description</td>
                                <td>Action</td>
                            </tr>
                            @foreach ($tests as $test)
                                <tr class="border-b-2">
                                    <td>{{ $test->id }}</td>
                                    <td>
                                            <p class="text-center">{{ $test->author }}</p> 
                                            <img src="{{ asset($test->author_image) }}" alt="{{ $test->author }}" class="object-contain" style="max-height:117px; ">
                                    </td>
                                    <td>{{ $test->description }}</td>
                                    <td class="flex justify-center">
                                        
                                            <p><a href="{{route('testimontial.edit', $test)}}"><button class="bg-yellow-500 p-1 m-1  rounded" title="">M</button></a></p>
                                            <p><a href="{{route('testimontial.destroy', $test)}}"><button class="bg-red-500 p-1 m-1  rounded" title="">X</button></a></p>
                                        
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p>Pas de tests sur le site... </p>
                    @endif

                    <!-- Pagination -->
                
                    <div class="mt-5 page-pagination">
                        {{ $tests->links('vendor/pagination/default') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
                    