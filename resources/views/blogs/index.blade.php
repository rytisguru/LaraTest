@extends('layouts.app')

@section('content')

<div class="container">
	@foreach($blogs as $blog)
		<h1><a href={{ route('blogs.show', [$blog->id]) }}>{{ $blog->title }}</a></h1>
		<p>{{ $blog->body }}</p>
	@endforeach
</div>

@endsection