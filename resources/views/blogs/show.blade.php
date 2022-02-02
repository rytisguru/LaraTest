@extends('layouts.app')

@section('content')

@section('meta_title')  {{ $blog->meta_title }}  @endsection
@section('meta_description')  {{ $blog->meta_description }}  @endsection
		<div class="bg-light p-5 rounded-lg m-3">
			@if($blog->featured_image)
				<img src="/images/featured_images/{{ $blog->featured_image ? $blog->featured_image : '' }}" alt="{{ Str::limit($blog->title, 50) }}" class="img-responsive featured_image"><br/>
			@endif
		</div>
		<div class="col-md-12">
		  <h1>{{ $blog->title }}</h1>
		</div>
		<div class="col-md-12">
		  <div class="btn-group">
			<a class="btn btn-primary btn-xs pull-left" href="{{ route('blogs.edit', $blog->id) }}"> Edit</a>
			<form method="post" action="{{ route('blogs.delete', $blog->id) }}">
			  {{ method_field('delete') }}
			  <button type="submit" class="btn btn-danger btn-xs pull-left">Delete</button>
			  @csrf
		  	</form>
		  </div>
		</div>
		<div class="col-md-12">
			<p>{!! $blog->body !!}</p>
			<hr>
			<strong>Categories: </strong>
			@foreach($blog->category as $category)
			<span><a href="{{ route('categories.show', $category->slug) }}">{{ $category->name }}</a></span>
			@endforeach
		</div>
@endsection