@extends('layouts.app')
@include('partials.meta_dynamic')
@section('content')
<div class="container-lg my-2">
  <div class="py-3 mb-3 bg-light rounded-3">
    <div class="row">
		<div class="col-md-10">
			<h1>{{ $blog->title }}</h1>
		</div>
		<div class= "col-md-2 text-end">
			<div class="btn-group">
			  <a class="btn btn-primary btn-sm rounded-3" href="{{ route('blogs.edit', $blog->id) }}"> Edit</a>
			  <form method="post" action="{{ route('blogs.delete', $blog->id) }}">
			    {{ method_field('delete') }}
			    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
			    @csrf
		   	  </form>
		   	</div>
		</div>
	</div>
			@if($blog->featured_image)
				<img src="/images/featured_images/{{ $blog->featured_image ? $blog->featured_image : '' }}" alt="{{ Str::limit($blog->title, 50) }}" class="img-responsive featured_image"><br/>
			@endif
		</div>
		<div class="col-md-12">
			{!! $blog->body !!}
			@if($blog->user)
				<div class="text-end">
					Author: <a href="{{ route('users.show', Str::slug($blog->user->name)) }}">{{ $blog->user->name }}</a> Posted: {{ $blog->created_at->diffForHumans() }}
				</div>
			@endif
			<hr>
			<strong>Categories: </strong>
			@foreach($blog->category as $category)
			<span><a href="{{ route('categories.show', $category->slug) }}">{{ $category->name }}</a></span>
			@endforeach
		</div>
	</div>
@endsection