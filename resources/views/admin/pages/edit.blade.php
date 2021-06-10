<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @switch($page)
                        @case("home")
                        <h3 class="text-xl m-4 text-center md:text-left"> Edit Page HOME </h3>
                            <form action="{{route('pages.updatehome')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="section">
                                    {{--  premier titre  --}}
                                    <div class="col m-2 bg-gray-300">
                                        <label for="t1">Titre 1: <p class="text-center bg-gray-400">les ( ) donnent un bg au text </p></label><br/>
                                        <input type="text" name="t1" value="{{$infopage->t1}}" class="w-full" />
                                        <br/>
                                        @error('t1')
                                            <span class="text-red-500">{{$message}}</span>
                                        @enderror
                                    </div>
                                    {{-- les btns  --}}
                                    <div class="col m-2 bg-gray-300 md:flex flex-wrap">
                                        <div class="w-full md:w-2/4 ">
                                            <label for="btn1text">button 1 titre:</label><br/>
                                            <input type="text" name="btn1text" value="{{$infopage->btn1text}}" class="w-full" />
                                            <br/>
                                            @error('btn1text')
                                                <span class="text-red-500">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="w-fulll md:w-2/4">
                                            <label for="btn1link">button 1 LINK:</label><br/>
                                            <input type="text" name="btn1link" value="{{$infopage->btn1link}}" class="w-full" />
                                            <br/>
                                            @error('btn1link')
                                                <span class="text-red-500">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- btn + img + video  --}}
                                    
                                    <div class="col m-2 bg-gray-300 md:flex">
                                        <div class="w-full md:w-2/4 m-1">
                                            <label for="img">Image actuelle sur la vidéo:</label><br/>
                                            <img src="{{asset($infopage->imglink)}}" class="w-full" alt="img actuelle "/>
                                        </div>
                                        <div class="w-full md:w-2/4 ">
                                            <label for="videolink">Lien de la vidéo (yt de pref)</label><br/>
                                            <input type="text" name="videolink" value="{{$infopage->videolink}}" class="w-full" /> <br/> 
                                            
                                            @error('videolink')
                                                <br/> <span class="text-red-500">{{$message}}</span><br/>
                                            @enderror
                                            
                                            <label for="imagelinkfile">Ajouter une image: <br/><strong>Utilisez uniquement en cas de modification.</strong></label><br/>
                                            <input type="file" name="imagelinkfile" class="w-full" />
                                            
                                            @error('imagelinkfile')
                                                <br/> <span class="text-red-500">{{$message}}</span><br/>
                                            @enderror
                                            
                                            {{-- <label for="imagelinktext">Image du net: <br/><strong>Utilisez uniquement en cas de modification.</strong></label><br/>
                                            <input type="text" name="imagelinktext" class="w-full" /> --}}
                                        </div>
                                    </div> 

                                    {{--  deuxième titre  --}}
                                    <div class="col m-2 bg-gray-300">
                                        <label for="t2">Titre 2: (Testimontial)</label><br/>
                                        <input type="text" name="t2" value="{{$infopage->t2}}" class="w-full" />
                                        <br/>
                                        @error('t2')
                                            <span class="text-red-500">{{$message}}</span>
                                        @enderror
                                    </div>

                                    {{--  3 titre  --}}
                                    <div class="col m-2 bg-gray-300">
                                        <label for="t3">Titre 3: (Services)<p class="text-center bg-gray-400">les ( ) donnent un bg au text </p></label><br/>
                                        <input type="text" name="t3" value="{{$infopage->t3}}" class="w-full" />
                                        <br/>
                                        @error('t3')
                                            <span class="text-red-500">{{$message}}</span>
                                        @enderror

                                        <div class="col md:flex">
                                            <div class="w-full md:w-2/4 ">
                                                <label for="btn2text">button titre:</label><br/>
                                                <input type="text" name="btn2text" value="{{$infopage->btn2text}}" class="w-full" />
                                                <br/>
                                                @error('btn2text')
                                                        <span class="text-red-500">{{$message}}</span>
                                                @enderror 
                                            <br/>
                                            </div>
                                            <div class="w-fulll md:w-2/4">
                                                <label for="btn2link">button LINK:</label><br/>
                                                <input type="text" name="btn2link" value="{{$infopage->btn2link}}" class="w-full" />
                                                <br/>
                                                @error('btn2link')
                                                        <span class="text-red-500">{{$message}}</span>
                                                @enderror 
                                                <br/>
                                            </div>
                                        </div> 
                                    </div>


                                    {{--  4 titre  --}}
                                    <div class="col m-2 bg-gray-300">
                                        <label for="t4">Titre 4: (Team)<p class="text-center bg-gray-400">les ( ) donnent un bg au text </p></label><br/>
                                        <input type="text" name="t4" value="{{$infopage->t4}}" class="w-full" />
                                        <br/>
                                        @error('t4')
                                            <span class="text-red-500">{{$message}}</span>
                                        @enderror
                                    </div>

                                    {{--  dernier titre  --}}
                                    <div class="col m-2 bg-gray-300">
                                        <label for="t5">Titre 5: (L'info avant le footer) </label><br/>
                                        <input type="text" name="t5" value="{{$infopage->t5}}" class="w-full" />
                                        <br/>
                                        @error('t5')
                                                <span class="text-red-500">{{$message}}</span>
                                        @enderror 
                                        <br/>
                                        <label for="desc3">Description :</label><br/>
                                        <input type="text" name="desc3" value="{{$infopage->desc3}}" class="w-full" />
                                        <br/>
                                        @error('desc3')
                                                <span class="text-red-500">{{$message}}</span>
                                        @enderror 
                                        <br/>
                                        <div class="col md:flex">
                                            <div class="w-full md:w-2/4 ">
                                                <label for="btn3text">button titre:</label><br/>
                                                <input type="text" name="btn3text" value="{{$infopage->btn3text}}" class="w-full" />
                                                <br/>
                                            @error('btn3text')
                                                    <span class="text-red-500">{{$message}}</span>
                                            @enderror 
                                            <br/>
                                            </div>
                                            <div class="w-fulll md:w-2/4">
                                                <label for="btn3link">button LINK:</label><br/>
                                                <input type="text" name="btn3link" value="{{$infopage->btn3link}}" class="w-full" />
                                                <br/>
                                                @error('btn3link')
                                                        <span class="text-red-500">{{$message}}</span>
                                                @enderror 
                                                <br/>
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="text-center mt-7"><button type="submit" class="bg-green-400 p-2 rounded-sm">Valider la modification</button></div>
                                </div>
                            </form>
                            @break
                            {{-- END SWITCH PAGE HOME  --}}
                        @case("home-car")
                            
                        {{-- Modificaiton du caorusel de la page home --}}
                            
                        @break
                        @case("services")
                            <h3 class="text-xl m-4 text-center md:text-left"> Edit Page services </h3>
                            <form action="{{route('pages.updateservices')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="section">
                                    {{--  premier titre  --}}
                                    <div class="col m-2 bg-gray-300">
                                        <label for="t1">Titre 1: (Services) <p class="text-center bg-gray-400">les ( ) donnent un bg au text </p></label><br/>
                                        <input type="text" name="t1" value="{{$infopage->t1}}" class="w-full" />
                                        
                                        @error('t1')
                                        <br/>    <span class="text-red-500">{{$message}}</span> <br/>
                                        @enderror

                                        {{-- <div class="col m-2 bg-gray-300 md:flex flex-wrap">
                                    
                                            <div class="w-full md:w-2/4 ">
                                                <label for="btn1text">button 1 titre:</label><br/>
                                                <input type="text" name="btn1text" value="{{$infopage->btn1text}}" class="w-full" />
                                                <br/>
                                                @error('btn1text')
                                                    <span class="text-red-500">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="w-fulll md:w-2/4">
                                                <label for="btn1link">button 1 LINK:</label><br/>
                                                <input type="text" name="btn1link" value="{{$infopage->btn1link}}" class="w-full" />
                                                <br/>
                                                @error('btn1link')
                                                    <span class="text-red-500">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div> --}}

                                    </div>
                                    
                                    {{--  deuxième titre  --}}
                                    <div class="col m-2 bg-gray-300">
                                        <label for="t2">Titre 2: (Device)</label><br/>
                                        <input type="text" name="t2" value="{{$infopage->t2}}" class="w-full" />
                                        <br/>
                                        @error('t2')
                                            <br/> <span class="text-red-500">{{$message}}</span><br/>
                                        @enderror
                                        <div class="col m-2 bg-gray-300">
                                            <div class="col md:flex">
                                                <div class="w-full md:w-2/4 ">
                                                    <label for="btn2text">button titre:</label><br/>
                                                    <input type="text" name="btn2text" value="{{$infopage->btn2text}}" class="w-full" />
                                                    <br/>
                                                    @error('btn2text')
                                                            <span class="text-red-500">{{$message}}</span>
                                                    @enderror 
                                                <br/>
                                                </div>
                                                <div class="w-fulll md:w-2/4">
                                                    <label for="btn2link">button LINK:</label><br/>
                                                    <input type="text" name="btn2link" value="{{$infopage->btn2link}}" class="w-full" />
                                                    <br/>
                                                    @error('btn2link')
                                                            <span class="text-red-500">{{$message}}</span>
                                                    @enderror 
                                                    <br/>
                                                </div>
                                            </div> 
                                        </div>
                                    </div>

                                    <div class="text-center mt-7"><button type="submit" class="bg-green-400 p-2 rounded-sm">Valider la modification</button></div>
                                </div>
                            </form>
                            
                        @break
                        {{-- CONTACT --}}
                        @case("contact")
                            <h3 class="text-xl m-4 text-center md:text-left"> Edit Page Contact (+ footer) </h3>
                            <form action="{{route('pages.updatecontact')}}" method="POST">
                                @csrf
                                <div class="section">
                                    {{-- Les coords pour la map:  --}}
                                    <div class="col m-2 bg-gray-200 flex flex-col">
                                        <label for="position">Position sur Google Maps: 
                                            <p class="bg-gray-400">Astuce: sur google maps click droit sur l'endroit. </p>
                                        </label>
                                        <input type="text" name="position" value="{{$infopage->position}}"/>
                                        @error('position')
                                            <br/><span class="text-red-500">{{$message}} </span> <br/> 
                                        @enderror
                                    </div>
                                    {{--  premier titre  --}}
                                    <div class="col m-2 bg-gray-300">
                                        <label for="t1">Titre 1: (Contact) </label><br/>
                                        <input type="text" name="t1" value="{{$infopage->t1}}" class="w-full" />
                                        
                                        @error('t1')
                                        <br/>    <span class="text-red-500">{{$message}}</span> <br/>
                                        @enderror

                                        <label for="desc1">Description :</label><br/>
                                        <textarea name="desc1" rows="10" cols="50"> {{$infopage->desc1}} </textarea>
                                        <br/>
                                        @error('desc1')
                                                <span class="text-red-500">{{$message}}</span>
                                        @enderror 
                                        <br/>
                                    </div>
                                    
                                    {{--  deuxième titre  --}}
                                    <div class="col m-2 bg-gray-300">
                                        <label for="t2">Titre 2: (Device)</label><br/>
                                        <input type="text" name="t2" value="{{$infopage->t2}}" class="w-full" />
                                        <br/>
                                        @error('t2')
                                            <br/> <span class="text-red-500">{{$message}}</span><br/>
                                        @enderror
                                        <div class="col m-2 bg-gray-300">
                                            <div class="col md:flex">
                                                <div class="w-full md:w-2/4 ">
                                                    <label for="adresse">Adresse: </label><br/>
                                                    <input type="text" name="adresse" value="{{$infopage->adresse}}" class="w-full" />
                                                    <br/>
                                                    @error('adresse')
                                                            <span class="text-red-500">{{$message}}</span>
                                                    @enderror 
                                                <br/>
                                                </div>
                                                <div class="w-fulll md:w-2/4">
                                                    <label for="tel">TEL:</label><br/>
                                                    <input type="text" name="tel" value="{{$infopage->tel}}" class="w-full" />
                                                    <br/>
                                                    @error('tel')
                                                            <span class="text-red-500">{{$message}}</span>
                                                    @enderror 
                                                    <br/>
                                                </div>
                                                <div class="w-fulll md:w-2/4">
                                                    <label for="email">Email:</label><br/>
                                                    <input type="email" name="email" value="{{$infopage->email}}" class="w-full" />
                                                    <br/>
                                                    @error('email')
                                                            <span class="text-red-500">{{$message}}</span>
                                                    @enderror 
                                                    <br/>
                                                </div>
                                            </div> 
                                        </div>
                                    </div>
                                    
                                    <div class="col m-2 bg-gray-300">
                                        <div class="col md:flex md:flex-col">
                                            <label for="footer">Footer</label>
                                            <input type="text" name="footer" value="{{$infopage->footer}}" />          
                                        </div>
                                    </div>

                                    <div class="text-center mt-7"><button type="submit" class="bg-green-400 p-2 rounded-sm">Valider la modification</button></div>
                                </div>
                            </form>
                        @break
                        @default
                            <p class="text-red-500">Erreur 404..</p>
                    @endswitch






                </div>
            </div>
        </div>
    </div>
</x-app-layout>