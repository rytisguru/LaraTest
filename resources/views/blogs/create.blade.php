@extends('layouts.app')

@section('content')
@include('partials.tinymce');

	<div class="container-fluid">
		<div class="bg-light p-5 rounded-lg m-3">
			<h1>Create a new blog</h1>
		</div>
		<div class="col-md-12">
			<form action="{{ route('blogs.store') }}" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="title">Title</label>
					<input type="text" name="title" class="form-control">
				</div>
				<div class="form-group">
				    <label for="body">Body</label>
					<textarea name="body" class="form-control my-editor">{!! old('body') !!}</textarea>
				</div>
				<div class="form-group">
				    @foreach($categories as $category)
						<input type="checkbox" value="{{ $category->id }}" name="category_id[]" class="form-check-input">
						<label class="form-check-label">{{ $category->name }}</label>
					@endforeach
				</div>
				<div class="form-group">
					<label for="featured_image">Featured Image</label>
					<input type="file" name="featured_image" class="form-control">
				</div>
				<button class="btn btn-primary" type="submit">Create Blog</button>
				@csrf
			</form>
		</div>
	</div>

@endsection