@extends('layouts.front')


@section('content') 

	<!-- Page header -->
	<div class="page-top-section">
		<div class="overlay"></div>
		<div class="container text-right">
			<div class="page-info">
				<h2>Services</h2>
				<div class="page-links">
					<a href="{{route('front.index')}}">Home</a>
					<span>Services</span>
				</div>
			</div>
		</div>
	</div>
	<!-- Page header end-->

    <!-- services section -->
	<div class="services-section spad">
		<div class="container">
			<div class="section-title dark">
				<h2>{!! bbcodetitle($servinfo->t1) !!}</h2>
			</div>
			<div class="row">
                @foreach ($servs as $serv)  
                    <!-- single service -->
                    <div class="servcard col-md-4 col-sm-6">
                        <div class="service">
                            <div class="icon">
                                <i class="{{$serv->icone}}"></i>
                            </div>
                            <div class="service-text">
                                <h2>{{ $serv->titre }}</h2>
                                <p>{{  Str::limit($serv->description, 100, ) }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
			</div>
			<div class="text-center">
				<a href="{{$servinfo->btn1link}}" class="site-btn">{{$servinfo->btn1text}}</a>
			</div>
		</div>
	</div>
	<!-- services section end -->

	<!-- features section -->
	<div class="team-section spad">
		<div class="overlay"></div>
		<div class="container">
			<div class="section-title">
				<h2>{!! bbcodetitle($servinfo->t2) !!}</h2>
			</div>
			<div class="row">
                <div class="col-md-4 col-sm-4 features">
                        @for ($i = 0; $i < 3; $i++)
                            <div class="icon-box light left">
                                <div class="service-text">
                                    <h2>{{ $serv2[$i]->titre }} </h2>
                                    <p>{{  Str::limit($serv2[$i]->description, 100, ) }}</p>
                                </div>
                                <div class="icon">
                                    <i class="{{$serv2[$i]->icone}}"></i>
                                </div>
                            </div>
                        @endfor 
                </div> 
                <!-- Devices -->
				<div class="col-md-4 col-sm-4 devices">
					<div class="text-center">
						<img src="img/device.png" alt="">
					</div>
				</div>
                <!-- feature item -->
				<div class="col-md-4 col-sm-4 features">
                    @for ($i = 3; $i < 6; $i++)
                        <div class="icon-box light">
                            <div class="icon">
                                <i class="{{$serv2[$i]->icone}}"></i>
                            </div>
                            <div class="service-text">
                                <h2>{{ $serv2[$i]->titre }} </h2>
                                <p>{{  Str::limit($serv2[$i]->description, 100, ) }}</p>
                            </div>
                        </div>
                    @endfor 
                </div>
            </div>
			<div class="text-center mt100">
				<a href="{{$servinfo->btn2link}}" class="site-btn">{{$servinfo->btn2text}}</a>
			</div>
		</div>
	</div>
	<!-- features section end-->

    <!-- services card section-->
	<div class="services-card-section spad">
		<div class="container">
			<div class="row">
				<!-- Single Card -->
				<div class="col-md-4 col-sm-6">
					<div class="sv-card">
						<div class="card-img">
							<img src="img/card-1.jpg" alt="">
						</div>
						<div class="card-text">
							<h2>Get in the lab</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla..</p>
						</div>
					</div>
				</div>
				<!-- Single Card -->
				<div class="col-md-4 col-sm-6">
					<div class="sv-card">
						<div class="card-img">
							<img src="img/card-2.jpg" alt="">
						</div>
						<div class="card-text">
							<h2>Projects online</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla..</p>
						</div>
					</div>
				</div>
				<!-- Single Card -->
				<div class="col-md-4 col-sm-12">
					<div class="sv-card">
						<div class="card-img">
							<img src="img/card-3.jpg" alt="">
						</div>
						<div class="card-text">
							<h2>SMART MARKETING</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla..</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- services card section end-->



    @include('components.front.newsletter')
    {!! $footer !!}
@endsection 