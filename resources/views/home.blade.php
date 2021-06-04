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
                <h2> {!! bbcodetitle($homeinfo->t1) !!} </h2>
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

<!-- Testimonial section -->
<div class="testimonial-section pb100">
    <div class="test-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-4">
                <div class="section-title left">
                    <h2>{{ $homeinfo->t2 }} </h2>
                </div>
                {{-- {{ dd($testims) }} --}}
                <div class="owl-carousel" id="testimonial-slide">
                    @forelse ($testims as $test)
                        <!-- single testimonial -->
                        <div class="testimonial">
                            <span>‘​‌‘​‌</span>
                            <p>{{$test->description }} </p>
                            <div class="client-info">
                                <div class="avatar">
                                    <img src="{{ asset($test->author_image) }} " alt="{{ $test->author }}">
                                </div>
                                <div class="client-name">
                                    <h2>{{ $test->author }} </h2>
                                    <p>{{ $test->poste}} </p>
                                </div>
                            </div>
                        </div>
                    @empty
                        
                    @endforelse
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial section end-->

<!-- Services section -->
<div class="services-section spad">
    <div class="container">
        <div class="section-title dark">
            <h2> {!! bbcodetitle($homeinfo->t3) !!} </h2>
        </div>
        <div class="row">
            @forelse ($collection as $item)
                
            @empty
                
            @endforelse
            <!-- single service -->
            <div class="col-md-4 col-sm-6">
                <div class="service">
                    <div class="icon">
                        <i class="flaticon-023-flask"></i>
                    </div>
                    <div class="service-text">
                        <h2>Get in the lab</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla..</p>
                    </div>
                </div>
            </div>
            <!-- single service -->
            <div class="col-md-4 col-sm-6">
                <div class="service">
                    <div class="icon">
                        <i class="flaticon-011-compass"></i>
                    </div>
                    <div class="service-text">
                        <h2>Projects online</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla..</p>
                    </div>
                </div>
            </div>
            <!-- single service -->
            <div class="col-md-4 col-sm-6">
                <div class="service">
                    <div class="icon">
                        <i class="flaticon-037-idea"></i>
                    </div>
                    <div class="service-text">
                        <h2>SMART MARKETING</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla..</p>
                    </div>
                </div>
            </div>
            <!-- single service -->
            <div class="col-md-4 col-sm-6">
                <div class="service">
                    <div class="icon">
                        <i class="flaticon-039-vector"></i>
                    </div>
                    <div class="service-text">
                        <h2>Social Media</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla..</p>
                    </div>
                </div>
            </div>
            <!-- single service -->
            <div class="col-md-4 col-sm-6">
                <div class="service">
                    <div class="icon">
                        <i class="flaticon-036-brainstorming"></i>
                    </div>
                    <div class="service-text">
                        <h2>Brainstorming</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla..</p>
                    </div>
                </div>
            </div>
            <!-- single service -->
            <div class="col-md-4 col-sm-6">
                <div class="service">
                    <div class="icon">
                        <i class="flaticon-026-search"></i>
                    </div>
                    <div class="service-text">
                        <h2>Documented</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla..</p>
                    </div>
                </div>
            </div>
            <!-- single service -->
            <div class="col-md-4 col-sm-6">
                <div class="service">
                    <div class="icon">
                        <i class="flaticon-018-laptop-1"></i>
                    </div>
                    <div class="service-text">
                        <h2>Responsive</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla..</p>
                    </div>
                </div>
            </div>
            <!-- single service -->
            <div class="col-md-4 col-sm-6">
                <div class="service">
                    <div class="icon">
                        <i class="flaticon-043-sketch"></i>
                    </div>
                    <div class="service-text">
                        <h2>Retina ready</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla..</p>
                    </div>
                </div>
            </div>
            <!-- single service -->
            <div class="col-md-4 col-sm-6">
                <div class="service">
                    <div class="icon">
                        <i class="flaticon-012-cube"></i>
                    </div>
                    <div class="service-text">
                        <h2>Ultra modern</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla..</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center">
            <a href="" class="site-btn">Browse</a>
        </div>
    </div>
</div>
<!-- services section end -->

@endsection