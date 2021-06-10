<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-xl m-4 text-center md:text-left">Validations des {{ $valide == 'coms' ? 'commentaires' : 'articles' }}</h3>

                    @switch($valide)
                        @case("articles")
                            @forelse ($arts as $article)
                                
                            <div class="mt-5  bg-gray-200">
                                <img src="{{asset($article->image)}}" alt="{{$article->titre}}" />
                                <p>Date de création: {{$article->created_at->format('d M, Y - H:m ') }}</p>
                                <p>Écrit par: {{ $article->user->nom . ' ' . $article->user->prenom . ' (' . $article->user->poste->nom . ') '}} </p>
                                <p>Catégorie: {{ $article->categorie->nom }} </p>
                                <p>Liste de tags: 
                                    @forelse ($article->tags as $tag)
                                        #{{$tag->nom}}
                                    @empty
                                        <span>pas de tags pour cet article..</span>
                                    @endforelse
                                </p>
        
                                <p class="m-2 bg-gray-200"> {!! $article->description !!} </p>

                                <div class="action flex">
                                    <a href="{{route('admin.blog.validepost', $article)}}" class="p-2 bg-green-400 m-1 hover:bg-green-500 rounded-md">Accept</a> 
                                    <a href="{{route('admin.blog.refusepost', $article)}}" class="p-2 bg-red-400 m-1 hover:bg-red-500 rounded-md">Refuse</a> 
                                </div>
                            </div>

                            @empty
                            <p>Pas d'article pour valider</p>
                            @endforelse
                            {{-- {{ $arts->links() }} --}}
                            @break
                        @case("coms")
                            @forelse ($coms as $com)
                                <div class="mt-5 bg-gray-200">
                                    <p>Le: {{$com->created_at->format('d/m/Y à H:i') }}, {{ $com->auteur }} ( {{$com->auteur_email}} ) à réagit sous l'article: {{--n'{{ $com->article_id }}--}} ( {{$com->article->titre}}) </p>
                                    <p>{!! $com->message !!}</p>

                                    <div class="action flex">
                                        <a href="{{route('admin.blog.validecom', $com)}}" class="p-2 bg-green-400 m-1 hover:bg-green-500 rounded-md">Accept</a> 
                                        <a href="{{route('admin.blog.refusecom', $com)}}" class="p-2 bg-red-400 m-1 hover:bg-red-500 rounded-md">Refuse</a> 
                                    </div>

                                </div>
                            @empty
                                
                            @endforelse
                            @break
                        @default
                            <h4>Error </h4>
                    @endswitch
                </div>
            </div>
        </div>
    </div>
</x-app-layout>