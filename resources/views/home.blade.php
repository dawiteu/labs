@extends('layouts.front')


@section('content')

<!-- Intro Section -->
<div class="hero-section">
    <div class="hero-content">
        <div class="hero-center">
            <img src="{{$logo}}" alt="" class="w-full">
            <p id="cartext"></p>
        </div>
    </div>
    <!-- slider -->
    <div id="hero-slider" class="owl-carousel">

        @foreach ($carous as $car)
                <div class="item hero-item" data-bg="{{asset($car->image)}}" data-text="{{$car->description}}"> </div>
        @endforeach
        
        {{-- <div class="item  hero-item" data-bg="img/02.jpg"></div> --}}
    </div>
</div>
<!-- Intro Section -->


abc a bc abvc 
@endsection