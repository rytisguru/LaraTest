@extends('layouts.app')

@section('content')

	<div class="container-lg my-2">
		<div class="py-3 mb-3 bg-light rounded-3">
			<h1 class="text-center">Edit Category</h1>
		</div>
		<div class="col-md-12">
			<form action="{{ route('categories.update', $category->id) }}" method="post">
				{{ method_field('patch') }}
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" name="name" class="form-control" value="{{ $category->name }}">
					<label for="slug">Slug</label>
					<input type="text" name="slug" class="form-control" value="{{ $category->slug }}">
				</div>
				<div class="d-grid gap-2">
				<button class="btn btn-primary" type="submit">Update Category</button>
			</div>
				@csrf
			</form>
		</div>
	</div>

@endsection