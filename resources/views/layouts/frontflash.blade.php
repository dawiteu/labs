@if ($message = Session::get('success'))
<div class="alert alert-success text-center" style="position:absolute; top:50%; width:100%; z-index:1001;">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif


@if ($message = Session::get('error'))
<div class="alert alert-danger text-center" style="position:absolute; top:50%; width:100%; z-index:1001;">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif


@if ($message = Session::get('warning'))
<div class="alert alert-warning text-center" style="position:absolute; top:50%; width:100%; z-index:1001;">
	<button type="button" class="close" data-dismiss="alert">×</button>	
	<strong>{{ $message }}</strong>
</div>
@endif