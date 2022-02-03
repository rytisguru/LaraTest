@extends('layouts.app')

@section('content')

<div class="container-lg my-2">
		<div class="py-3 mb-3 bg-light rounded-3">
			<h1 class="text-center">Categories</h1>
		</div>
	@foreach($categories as $category)
		<h1><a href={{ route('categories.show', [$category->slug]) }}>{{ $category->name }}</a></h1>
	@endforeach
</div>

@endsection