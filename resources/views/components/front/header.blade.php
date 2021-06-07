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
				<li class={{request()->routeIs('blog.index') ? 'active' : ''}}><a href={{route('blog.index')}}>Blog</a></li>
				<li class={{request()->routeIs('contact.index') ? 'active' : ''}}><a href={{route('contact.index')}}>Contact</a></li>
			</ul>
		</nav>
	</header>
	<!-- Header section end -->