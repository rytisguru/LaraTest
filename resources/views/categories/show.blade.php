@extends('layouts.app')

@section('content')
<div class="container-lg my-2">
		<div class="py-3 mb-3 bg-light rounded-3">
		  <h1 class="text-center">{{ $category->name }}</h1>
		</div>
		<div class="col-md-12">
			@foreach($category->blog as $blog)
				<a href="{{ route('blogs.show', $blog->id) }}">{{ $blog->title }}</a><br/>
			@endforeach
		</div>
	</div>
@endsection