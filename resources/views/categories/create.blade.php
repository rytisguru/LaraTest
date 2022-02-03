@extends('layouts.app')

@section('content')

	<div class="container-lg my-2">
		<div class="py-3 mb-3 bg-light rounded-3">
		  <h1 class="text-center">Create a new category</h1>
		</div>
		<div class="col-md-12">
			<form action="{{ route('categories.store') }}" method="post">
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" name="name" class="form-control">
				</div>
				<div class="d-grid gap-2">
				<button class="btn btn-primary" type="submit">Create Category</button>
			</div>
				@csrf
			</form>
		</div>
	</div>

@endsection