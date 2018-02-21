<div class="form-group" style="margin-left: 500px;>
	@if(count($errors))
		<div class=" alert alert-error col-md-4">
			<ul>
				@foreach($errors->all() as $error)
					<li>{{$error}}</li>
			
				@endforeach
			</ul>
		</div>
	@endif
</div>
