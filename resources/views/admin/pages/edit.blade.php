<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @switch($page)

                        @case("home")
                                {{-- {{ dd($infopage) }} --}}
                                <div class="section">
                                    {{--  premier titre  --}}
                                    <div class="col">
                                        <label for="t1">Titre 1: <p class="text-center bg-gray-400">les ( ) donnent un bg au text </p></label><br/>
                                        <input type="text" name="t1" value="{{$infopage->t1}}" class="w-full" />
                                    </div>

                                    {{-- les 2 paraphs  --}}
                                    <div class="col md:flex">
                                        <div class="w-full md:w-2/4 md:justify-center">
                                            <label for="t1">Text à gauche (200 ch limit): </label><br/>
                                            <textarea name="desc1" id="" cols="40" rows="10">{{$infopage->desc1}}</textarea>
                                        </div>
                                        <div class="w-fulll md:w-2/4">
                                            <label for="t1">Text à droite (200 ch limit): </label><br/>
                                            <textarea name="desc2" id="" cols="40" rows="10" >{{$infopage->desc2}}</textarea>
                                        </div>
                                    </div>

                                    {{-- btn + img + video  --}}
                                    <div class="col md:flex">
                                        <div class="w-full md:w-2/4 ">
                                            <label for="btn1text">button 1 titre:</label><br/>
                                            <input type="text" name="btn1text" value="{{$infopage->btn1text}}" class="w-full" />
                                        </div>
                                        <div class="w-fulll md:w-2/4">
                                            <label for="btn1link">button 1 LINK:</label><br/>
                                            <input type="text" name="btn1link" value="{{$infopage->btn1link}}" class="w-full" />
                                        </div>
                                    </div> 
                                    <div class="col md:flex">
                                        <div class="w-full md:w-2/4 ">
                                            <label for="img">Image actuelle sur la vidéo:</label><br/>
                                            <img src="{{asset($infopage->imglink)}}" class="w-full" alt="img actuelle "/>
                                        </div>
                                        <div class="w-full md:w-2/4 ">
                                            <label for="videolink">Lien de la vidéo (yt de pref) </label><br/>
                                            <input type="text" name="videolink" value="{{$infopage->videolink}}" class="w-full" /> <br/> 
                                            
                                            <label for="imagelinkfile">Ajouter une image: </label><br/>
                                            <input type="file" name="imagelinkfile" class="w-full" />
                                            
                                            <label for="imagelinktext">Image du net:</label><br/>
                                            <input type="text" name="imagelinktext" class="w-full" />
                                        </div>
                                    </div> 

                                </div>
                            @break
                        @case(2)
                            
                            @break
                        @default
                            
                    @endswitch
                    <h3 class="text-xl m-4 text-center md:text-left">
                        Page modification ... {{ $page }}
                    </h3>



                </div>
            </div>
        </div>
    </div>
</x-app-layout>