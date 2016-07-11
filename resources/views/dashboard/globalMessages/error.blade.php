@if (count($errors) > 0 )
	<div class="alert alert-warning">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Cảnh bảo !</strong><br>
		@foreach ($errors->all() as $error)
			{!! $error !!}<br>
		@endforeach
	</div>
@endif