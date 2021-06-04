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
            {{-- {{ dd($car->id, $car->priority) }} --}}
                {{-- @if ($car->priority == 1) --}}
                    <div class="item hero-item" id="f-{{$car->id}}" data-prior="{{$car->priority == 1 ? 'oui' : 'non'}}" data-bg="{{asset($car->image)}}" data-text="{{$car->description}}"> </div>
                {{-- @else --}}
                    {{-- <div class="item hero-item" data-bg="{{asset($car->image)}}" data-text="{{$car->description}}"> </div> --}}
                {{-- @endif --}}
        @endforeach
    </div>
</div>
<!-- Intro Section -->

<!-- About section -->
<div class="about-section">
    <div class="overlay"></div>
    <!-- card section -->
    <div class="card-section">
        <div class="container">
            <div class="row">
                @forelse ($thservs as $serv)
                <!-- single card -->
                    <div class="col-md-4 {{ $loop->iteration == 3 ? 'col-sm-12' : 'col-sm-6' }} ">
                        <div class="lab-card">
                            <div class="icon">
                                <i class="{{$serv->icone}}"></i>
                            </div>
                            <h2>{{ $serv->titre }}</h2>
                            <p>{{ $serv->description }}</p>
                        </div>
                    </div>  
                @endforeach
            </div>
        </div>
    </div>
    <!-- card section end-->


    <!-- About contant -->
    <div class="about-contant">
        <div class="container">
            <div class="section-title">
                @php
                    $title1 = str_replace('(', '<span>', $homeinfo->t1);
                    $title2 = str_replace(')', '</span>', $title1);
                    echo "<h2>" .$title2 . "</h2>";      
                @endphp
            </div>
            <div class="row">
                <div class="col-md-6">
                    <p>{{ $homeinfo->desc1 }} </p>
                </div>
                <div class="col-md-6">
                    <p>{{ $homeinfo->desc2 }}</p>
                </div>
            </div>
            <div class="text-center mt60">
                <a href="{{ $homeinfo->btn1link }}" class="site-btn">{{ $homeinfo->btn1text }}</a>
            </div>
            <!-- popup video -->
            <div class="intro-video">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <img src="{{ asset($homeinfo->imglink) }}" alt="">
                        <a href="{{ $homeinfo->videolink }}" class="video-popup">
                            <i class="fa fa-play"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About section end -->


@endsection