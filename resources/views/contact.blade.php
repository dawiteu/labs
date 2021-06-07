@extends('layouts.front')


@section('content') 

	<!-- Page header -->
	<div class="page-top-section">
		<div class="overlay"></div>
		<div class="container text-right">
			<div class="page-info">
				<h2>Contact</h2>
				<div class="page-links">
					<a href="{{route('front.index')}}">Home</a>
					<span>Contact</span>
				</div>
			</div>
		</div>
	</div>
	<!-- Page header end -->

    <!-- Google map -->
	<div class="map" id="map-area"></div>

    {!! $footer !!}

    {{-- @include('components.front.footer') --}}

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB0YyDTa0qqOjIerob2VTIwo_XVMhrruxo"></script>
	<script src="{{asset('js/map.js')}}"></script>
	<script src="{{asset('js/main.js')}}"></script>

@endsection 