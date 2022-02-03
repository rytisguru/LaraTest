@extends('layouts.app')

@section('content')


<div class="container-lg my-2">
  <div class="py-3 mb-3 bg-light rounded-3">
	<h1 class="text-center">Trashed Blogs</h1>
  </div>
<div class="col-md-12">
	@foreach($trashedBlogs as $blog)
		<h1>{{ $blog->title }}</h1>
		<p>{!! $blog->body !!}</p>
	{{-- restore --}}
	<div class="btn-group">
	<form method="get" action="{{ route('blogs.restore', $blog->id) }}">
		<button type="submit" class="btn btn-success btn-sm">Restore</button>
		@csrf
	</form>
	{{-- permament delete --}}
	<form method="get" action="{{ route('blogs.permament-delete', $blog->id) }}">
		{{ method_field('delete') }}
		<button type="submit" class="btn btn-danger btn-sm">Delete</button>
		@csrf
	</form>
    </div>
    <hr>
	@endforeach
</div>
@endsection