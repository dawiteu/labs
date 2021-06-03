@extends('layouts.front')


@section('content')

<!-- Intro Section -->
<div class="hero-section">
    <div class="hero-content">
        <div class="hero-center">
            <img src="{{$logo}}"  alt="{{ config('app_name') }}">
            <p id="cartext">
                @foreach ($carous as $car)
                    @if ($car->priority == 1)
                        {{ $car->description }}
                    @endif
                @endforeach
            </p>
        </div>
    </div>
    <!-- slider -->
    <div id="hero-slider" class="owl-carousel">

        @foreach ($carous as $car)
                @if ($car->priority == 1)
                    <div class="item hero-item item1" data-order="1" data-bg="{{asset($car->image)}}" data-text="{{$car->description}}"> </div>
                @else
                    <div class="item hero-item" data-order="2" data-bg="{{asset($car->image)}}" data-text="{{$car->description}}"> </div>
                @endif
        @endforeach
        
        {{-- <div class="item  hero-item" data-bg="img/02.jpg"></div> --}}
    </div>
</div>
<!-- Intro Section -->


abc a bc abvc 
@endsection