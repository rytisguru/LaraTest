@extends('layouts.app')

@include('partials.meta_static')

@section('content')

<div class="container-lg my-2">
  <div class="py-3 mb-4 bg-light rounded-3">
	  <h1 class="text-center">Blogs</h1>
  </div>
  <div class="container">
  @if(Session::has('blog_created_message'))
  	<div class="alert alert-success">
  		{{ Session::get('blog_created_message') }}
  		<button type="button" class="close text-end" data-bs-dismiss="alert" aria-hidden="true">&times;</button>
  	</div>
  @endif
	@foreach($blogs as $blog)

		<h1><a href="{{ route('blogs.show', [$blog->slug]) }}">{{ $blog->title }}</a></h1>

		@if($blog->featured_image)
			<div class="col-md-12">
				<img src="/images/featured_images/{{ $blog->featured_image ? $blog->featured_image : '' }}" alt="{{ Str::limit($blog->title, 50) }}" class="img-responsive featured_image">
			</div>
		@endif

		{!! Str::limit($blog->body, 200) !!}

		@if($blog->user)
		<div class="text-end">
			Author: <a href="{{ route('users.show', Str::slug($blog->user->name)) }}">{{ $blog->user->name }}</a> Posted: {{ $blog->created_at->diffForHumans() }}
		</div>
		@endif

	<hr>
	@endforeach
  </div>
</div> 

@endsection