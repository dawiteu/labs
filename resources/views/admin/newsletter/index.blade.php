<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-xl m-4 text-center md:text-left">
                        Gestion des emails dans le newsletter 
                    </h3>

                    @if (count($newss) > 0)
                        <table>
                            <tr>
                                <td>Email</td>
                                <td>Action</td>
                            </tr>
                            @foreach ($newss as $news)
                                <tr>
                                    <td>{{ $news->email }}</td>
                                    <td>
                                        <a href="#" class="bg-red-200">Désinscrire</a>
                                    </td>
                            @endforeach
                        </table>
                    @else
                        <p>Pas d'email enregistré dans la newsletter :( </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>