	<!-- Contact section -->
	<div class="contact-section spad fix">
		<div class="container">
			<div class="row">
				<!-- contact info -->
				<div class="col-md-5 col-md-offset-1 contact-info col-push">
					<div class="section-title left">
						<h2>{!! $footinfo->t1 !!} </h2>
					</div>
					<p> {!! $footinfo->desc1 !!}</p>
					<h3 class="mt60">{!! $footinfo->t2 !!} </h3>
					<p class="con-item">{!! $footinfo->adresse !!}</p>
					<p class="con-item">{!! $footinfo->tel !!} </p>
					<p class="con-item">{!! $footinfo->email !!} </p>
				</div>
				<!-- contact form -->
				<div class="col-md-6 col-pull">
					<form class="form-class" id="con_form" method="POST" action="{{route('contact.sendemail')}}">
						@csrf
						<div class="row">
							<div class="col-sm-6">
								<input type="text" name="name" placeholder="Your name">
								<br/> 
								@error('name')
									<span class="text-danger">{{$message}}</span>
								@enderror
							</div>
							<div class="col-sm-6">
								<input type="text" name="email" placeholder="Your email">
								<br/> 
								@error('email')
									<span class="text-danger">{{$message}}</span>
								@enderror
							</div>
							<div class="col-sm-12">
								<select name="subject" style="background-color:#f6edfb; width:100%; padding-top:10px; padding-bottom:10px; margin-bottom:10px;">
									@foreach ($subjects as $suj)
										<option value="{{$suj->id}}">{{$suj->nom}}</option>
									@endforeach
								</select>
								<textarea name="message" placeholder="Message" style="resize:none!important;" maxlength="200"></textarea>
								<br/> 
								@error('message')
									<span class="text-danger">{{$message}}</span>
								@enderror
								<br/> 
								<button class="site-btn" name="submitcontactform">send</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- Contact section end-->


	<!-- Footer section -->
	<footer class="footer-section">
		<h2>2017 All rights reserved. Designed by <a href="https://colorlib.com" target="_blank">Colorlib</a></h2>
	</footer>
	<!-- Footer section end -->

