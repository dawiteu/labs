	<!-- newsletter section -->
	<div class="newsletter-section spad" id="newsletter">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<h2>Newsletter</h2>
				</div>
				<div class="col-md-9">
					<!-- newsletter form -->
					<form class="nl-form" action="{{route('newsletterstore')}}" method="POST">
						@csrf
						<input type="text" name="newsemail" placeholder="Your e-mail here" value="{{old('newsemail')}}">

						<button class="site-btn btn-2">Newsletter</button>
						@error('newsemail')
							<p class="text-danger">{{$message}}</p>
						@enderror
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- newsletter section end-->