<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-xl m-4 text-center md:text-left">Gestion du Blog :: Regarde l'article: {{ $article->id }} </h3>
                        
                    <div class="text-center md:text-left">
                        <img src="{{asset($article->image)}}" alt="{{$article->titre}}" />
                        <p>Date de création: {{$article->created_at->format('d M, Y - H:m ') }}</p>
                        <p>Écrit par: {{ $article->user->nom . ' ' . $article->user->prenom . ' (' . $article->user->poste->nom . ') '}} </p>
                    
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
                   