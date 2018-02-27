<div class="form-group  col-md-4" style="margin-left: 400px;">
	@if(count($errors))
		<div class= "alert alert-danger" >
			<ul>
				@foreach($errors->all() as $error)
					<li>{{$error}}</li>
			
				@endforeach
			</ul>
		</div>
	@endif
</div>
