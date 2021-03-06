<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Labs - Design Studio">
	<meta name="keywords" content="lab, onepage, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    <!-- Favicon -->
	<link href="{{ asset('img/favicon.ico') }}" rel="shortcut icon"/>
    <!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500,700|Roboto:300,400,700" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Stylesheets -->
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"/>
	<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}"/>
	<link rel="stylesheet" href="{{ asset('css/flaticon.css') }}"/>
	<link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}"/>
	<link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}"/>
	<link rel="stylesheet" href="{{ asset('css/style.css') }}"/>

	<!--[if lt IE 9]>
	    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>

    <!-- Page Preloder -->
	<div id="preloder">
		<div class="loader">
			<img src="{{ asset('img/big-logo.png') }}" alt="">
			<h2>Loading.....</h2>
		</div>
	</div> 

    @include('components.front.header')
    
	@include('layouts.frontflash')

    @yield('content')



    <!--====== Javascripts & Jquery ======-->
	<script src="{{ asset('js/jquery-2.1.4.min.js') }}" ></script>
	<script src="{{ asset('js/bootstrap.min.js') }}" ></script>
	<script src="{{ asset('js/magnific-popup.min.js') }}" ></script>
	<script src="{{ asset('js/owl.carousel.min.js') }}" ></script>
	<script src="{{ asset('js/circle-progress.min.js') }}" ></script>
	<script src="{{ asset('js/main.js') }}"></script>
	<script src="{{ asset('js/myscript.js') }}"></script>

</body>
</html>