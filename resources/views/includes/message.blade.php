<div class="form-group" style="padding-top: 20px">
@if(session('success'))
		<div class="alert alert-success">
			<label>{{session('success')}}</label>
		</div>
@endif

@if(session('error'))
		<div class="alert alert-danger">
			<label>{{session('error')}}</label>
		</div>
@endif
</div>