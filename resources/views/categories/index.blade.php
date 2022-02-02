@extends('layouts.app')

@section('content')

<div class="container">
	@foreach($categories as $category)
		<h1><a href={{ route('categories.show', [$category->slug]) }}>{{ $category->name }}</a></h1>
	@endforeach
</div>

@endsection