@extends('layouts.app')
@section('content')
@include('partials.tinymce')
	<div class="container-lg my-2">
		<div class="py-3 mb-4 bg-light rounded-3">
			<h1 class="text-center">Create a new blog</h1>
		</div>
		<div class="col-md-12">
			<form action="{{ route('blogs.store') }}" method="post" enctype="multipart/form-data">
				@include('partials/error-message')
				<div class="form-group">
					<label for="title">Title</label>
					<input type="text" name="title" class="form-control" value="{!! old('title') !!}">
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
					<label class="btn btn-default">
						<span class="btn btn-outline btn-sm btn-info">Featured Image</span>
						<input type="file" name="featured_image" class="form-control" hidden>
					</label>
				</div>
				<div class="d-grid gap-2">
				<button class="btn btn-primary" type="submit">Create Blog</button>
			</div>
				@csrf
			</form>
		</div>
	</div>

@endsection