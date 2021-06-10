<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-xl m-4 text-center md:text-left">
                        Envoyer un e-mail à la liste newsletter (total: {{ count($newss) }})
                    </h3>
                    <form action="{{route('newsletter.sendmailsub')}}" class="flex flex-col" method="POST">
                        @csrf
                        <textarea name="message" class="w-full" name="message" style="text-align:left!important;">
                        {{ old('message') }}
                        </textarea> 

                        <div class="mt-5 pt-5 text-center">
                            <input type="submit" value="Envoyer >>" class="w-max p-1 bg-green-500 hover:bg-green-600" />
                        </div>
                    </form>                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>