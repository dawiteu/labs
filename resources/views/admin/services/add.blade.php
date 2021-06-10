<x-app-layout>
    <style>
        .modal {
        transition: opacity 0.25s ease;
        }
        body.modal-active {
        overflow-x: hidden;
        overflow-y: visible !important;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">  

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-xl m-4 text-center md:text-left">Ajouter un service: </h3> 
                    
                    <form action="{{route('service.store')}}" method="POST">
                        @csrf
                        <div class="flex flex-col md:w-2/6">
                            <i style="font-size:4rem;" class="{{old('icone')}}" id="displnewicon"></i>
                            <div class="flex justify-between">
                                <label for="icone">* Icon:</label>
                                <a href="#" class="modal-open text-blue-400 hover:text-blue-600 hover:no-underline underline text-right">Liste complète des icones.</a>
                            </div> 
                            
                            <input type="text" name="icon" value="{{old('icone')}}" id="setnewicon" readonly />
                            @error('icon')
                                <span class="text-red-500 font-bold">{{$message}}</span> 
                            @enderror
                            </div>
                        <div class="mt-4 flex flex-col md:w-2/6">
                            <label for="titre">* Titre:</label>
                            <input type="text" name="titre" value="{{old('titre')}}" />
                            @error('titre')
                                <span class="text-red-500 font-bold">{{$message}}</span> 
                            @enderror
                        </div>

                        <div class="mt-4 flex flex-col md:w-4/6">
                            <label for="description">* Description:</label>
                            <textarea name="description" id="desc" maxlength="200" cols="30" rows="10" style="resize:none;">{{old('description')}}</textarea>
                            <p class="text-right text-gray-400 strong"> <span id="limit">0</span> / 200 </p>
                            @error('description')
                                <span class="text-red-500 font-bold">{{$message}}</span> 
                            @enderror
                        </div>


                        <div class="flex flex-col md:w-1/6">
                            <input type="submit" value="Ajouter >>" class="bg-green-400 hover:bg-green-300 rounded:md" />
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>

    <script>
        const desc      = document.getElementById("desc");
        const descval   =  document.getElementById("desc").value; 
        const span      = document.getElementById("limit");
        span.innerHTML  = descval.length;
        desc.addEventListener("keydown", () => span.innerHTML = desc.value.length );
    </script>


{{-- modal --}}
{{-- <button class="modal-open bg-transparent border border-gray-500 hover:border-indigo-500 text-gray-500 hover:text-indigo-500 font-bold py-2 px-4 rounded-full">Open Modal</button> --}}

<!--Modal-->
<div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
<div class="modal-overlay fixed w-full h-full bg-gray-900 opacity-50"></div>

<div class="modal-container bg-white w-11/12 mx-auto rounded shadow-lg z-50 overflow-y-auto">
    
    <div class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
    <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
        <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
    </svg>
    <span class="text-sm">(Esc)</span>
    </div>

    <!-- Add margin if you want to see some of the overlay behind the modal-->
    <div class="modal-content py-4 text-left px-6" style="overflow-y: auto; max-height: 680px;">
    <!--Title-->
    <div class="flex justify-between items-center pb-3">
        <p class="text-2xl font-bold">Liste des icones: ({{count($allservs)}})</p>
        <div class="modal-close cursor-pointer z-50">
        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
        </svg>
        </div>
    </div>

    <!--Body-->
    <div class="my-4">
        <input  class="w-full" 
                type="text" 
                name="query" 
                id="query" 
                placeholder="Entrer un nom pour commancer une recherche avancée" />
    </div>
    <div id="results" class="flex flex-wrap overflow-y-auto">
        @for ($i = 0; $i < count($allservs); $i++)
            <div class="m-5 ico w-max flex flex-col justify-center text-center selecticon" data="{{$allservs[$i]}}">
                <i style="font-size:4rem;" class="{{ $allservs[$i] }} bg-gray-200" title="{{$allservs[$i]}}"></i>
            </div>
        @endfor
    </div>

    <!--Footer-->
    <div class="flex justify-end pt-2">
        {{-- <button class="px-4 bg-transparent p-3 rounded-lg text-indigo-500 hover:bg-gray-100 hover:text-indigo-400 mr-2">Action</button> --}}
        <button class="modal-close px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400">Close</button>
    </div>
    
    </div>
</div>
</div>

<script>
        var openmodal = document.querySelectorAll('.modal-open')
        for (var i = 0; i < openmodal.length; i++) {
        openmodal[i].addEventListener('click', function(event){ 
            document.querySelector("body").classList.add("overflow-hidden")
            event.preventDefault()
            toggleModal()
        })
        }
    
    const overlay = document.querySelector('.modal-overlay')
    overlay.addEventListener('click', toggleModal)
    
    var closemodal = document.querySelectorAll('.modal-close')
    for (var i = 0; i < closemodal.length; i++) {
        closemodal[i].addEventListener('click', toggleModal)
    }
    
    document.onkeydown = function(evt) {
        evt = evt || window.event
        var isEscape = false
        if ("key" in evt) {
            isEscape = (evt.key === "Escape" || evt.key === "Esc")
        } else {
            isEscape = (evt.keyCode === 27)
        }
        if (isEscape && document.body.classList.contains('modal-active')) {
            toggleModal()
        }
    };
    
    
    function toggleModal () {
        const body = document.querySelector('body')
        const modal = document.querySelector('.modal')
        modal.classList.toggle('opacity-0')
        modal.classList.toggle('pointer-events-none')
        body.classList.toggle('modal-active')
        body.classList.remove("overflow-hidden")
    }
    
</script>


{{-- endmodal --}}
</x-app-layout>