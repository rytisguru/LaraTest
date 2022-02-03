@extends('layouts.app')

@include('partials.meta_static')

@section('content')

<div class="container-lg my-2">
  <div class="py-3 mb-4 bg-light rounded-3">
	<h1 class="text-center">Blogs</h1>
  </div>
  <div class="container">
	@foreach($blogs as $blog)
		<h1><a href={{ route('blogs.show', [$blog->id]) }}>{{ $blog->title }}</a></h1>
		<p>{!! $blog->body !!}</p>
	@endforeach
  </div>
  <hr>
</div> 

@endsection