@extends('layouts.app')

@section('content')


<div class="container-fluid">
	<h1>Deleted Categories</h1>
</div>
<div class="col-md-12">
	@foreach($deletedCategories as $category)
		<h1>{{ $category->name }}</h1>
		<p>{{ $category->slug }}</p>
	{{-- restore --}}
	<div class="btn-group">
	<form method="get" action="{{ route('categories.restore', $category->id) }}">
		<button type="submit" class="btn btn-success btn-xs pull-left btn-margin-right">Restore</button>
		@csrf
	</form>
	{{-- permament delete --}}
	<form method="get" action="{{ route('categories.permament-delete', $category->id) }}">
		{{ method_field('delete') }}
		<button type="submit" class="btn btn-danger btn-xs pull-left btn-margin-right">Delete</button>
		@csrf
	</form>
    </div>
	@endforeach
</div>
@endsection