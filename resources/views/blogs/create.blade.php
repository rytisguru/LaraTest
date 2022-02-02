@extends('layouts.app')

@section('content')

	<div class="container-fluid">
		<div class="bg-light p-5 rounded-lg m-3">
			<h1>Create a new blog</h1>
		</div>
		<div class="col-md-12">
			<form action="{{ route('blogs.store') }}" method="post">
				<div class="form-group">
					<label for="title">Title</label>
					<input type="text" name="title" class="form-control">
				</div>
				<div class="form-group">
				    <label for="body">Body</label>
					<textarea type="text" name="body" class="form-control"></textarea>
				</div>
				<div class="form-group">
				    @foreach($categories as $category)
						<input type="checkbox" value="{{ $category->id }}" name="category_id[]" class="form-check-input">
						<label class="form-check-label">{{ $category->name }}</label>
					@endforeach
				</div>
				<button class="btn btn-primary" type="submit">Create Blog</button>
				@csrf
			</form>
		</div>
	</div>

@endsection