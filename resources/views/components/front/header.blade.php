	<!-- Header section -->
	<header class="header-section">
		<div class="logo">
			<img src="img/logo.png" alt=""><!-- Logo -->
		</div>
		<!-- Navigation -->
		<div class="responsive"><i class="fa fa-bars"></i></div>
		<nav>
			<ul class="menu-list">
				<li class={{request()->routeIs('front.index') ? 'active' : '' }}><a href="{{route('front.index')}}">Home</a></li>
				<li class={{request()->routeIs('services.index') ? 'active' : ''}}><a href="{{route('services.index')}}">Services</a></li>
				<li><a href="blog.html">Blog</a></li>
				<li><a href="contact.html">Contact</a></li>
				<li><a href="elements.html">Elements</a></li>
			</ul>
		</nav>
	</header>
	<!-- Header section end -->