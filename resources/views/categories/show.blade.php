@extends('layouts.app')

@section('content')
<div class="bg-light p-5 rounded-lg m-3">
		<div class="col-md-12">
		  <h1>{{ $category->name }}</h1>
		</div>
		<div class="col-md-12">
		  <div class="btn-group">
			<a class="btn btn-primary btn-xs pull-left" href="{{ route('categories.edit', $category->id) }}"> Edit</a>
			<form method="post" action="{{ route('categories.destroy', $category->id) }}">
			  {{ method_field('delete') }}
			  <button type="submit" class="btn btn-danger btn-xs pull-left">Delete</button>
			  @csrf
		  	</form>
		  </div>
		</div>
	</div>
		<div class="col-md-12">
			@foreach($category->blog as $blog)
				<a href="{{ route('blogs.show', $blog->id) }}">{{ $blog->title }}</a><br/>
			@endforeach
		</div>
@endsection