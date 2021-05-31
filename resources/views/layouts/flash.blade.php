@if ($message = Session::get('success'))
    <div class="my-5 text-white px-6 py-4 border-0 rounded relative mb-4 bg-green-500 w-3/6 mx-auto">
        <strong>{{$message}}</strong>
    </div>
@endif

@if ($message = Session::get('error'))
    <div class="my-5 text-white px-6 py-4 border-0 rounded relative mb-4 bg-red-500 w-3/6 mx-auto">
        <strong>{{$message}}</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{  $error  }}</li>
            @endforeach
        </ul>
    </div>
@endif