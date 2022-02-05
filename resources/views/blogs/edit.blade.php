@extends('layouts.app')
@section('content')
@include('partials.tinymce')
	<div class="container-lg my-2">
		<div class="py-3 mb-3 bg-light rounded-3">
			<h1 class="text-center">Edit blog</h1>
		</div>
		<div class="col-md-12">
			<form action="{{ route('blogs.update', $blog->id) }}" method="post">
				{{ method_field('patch') }}
				<div class="form-group">
					<label for="title">Title</label>
					<input type="text" name="title" class="form-control" value="{{ $blog->title }}">
				</div>
				<div class="form-group">
					<label for="body">Body</label>
					<textarea type="text" name="body" class="form-control my-editor">{{ $blog->body }}</textarea>
				</div>
				<div class="form-group">
					{{ $blog->category->count() ? 'Current categories' : '' }}
				    @foreach($blog->category as $category)
						<input type="checkbox" value="{{ $category->id }}" name="category_id[]" class="form-check-input" checked>
						<label class="form-check-label">{{ $category->name }}</label>
					@endforeach
				</div>
				<div class="form-group">
					{{ $filtered->count() ? 'Unused categories' : '' }}
				    @foreach($filtered as $category)
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
				<button class="btn btn-primary" type="submit">Update Blog</button>
			</div>
				@csrf
			</form>
		</div>
	</div>

@endsection