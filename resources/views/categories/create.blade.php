@extends('layouts.app')

@section('content')

	<div class="container-fluid">
		<div class="bg-light p-5 rounded-lg m-3">
			<h1>Create a new category</h1>
		</div>
		<div class="col-md-12">
			<form action="{{ route('categories.store') }}" method="post">
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" name="name" class="form-control">
				</div>
				<button class="btn btn-primary" type="submit">Create Category</button>
				@csrf
			</form>
		</div>
	</div>

@endsection