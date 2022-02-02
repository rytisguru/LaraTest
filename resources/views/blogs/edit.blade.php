@extends('layouts.app')

@section('content')

	<div class="container-fluid">
		<div class="bg-light p-5 rounded-lg m-3">
			<h1>Edit blog</h1>
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
					<textarea type="text" name="body" class="form-control">{{ $blog->body }}</textarea>
				</div>
				<button class="btn btn-primary" type="submit">Update Blog</button>
				@csrf
			</form>
		</div>
	</div>

@endsection