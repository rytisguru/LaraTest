@extends('layouts.app')

@section('content')

<div class="container-fluid">
	<div class="bg-light p-5 rounded-lg m-3">
		<h1>Admin Page</h1>
	</div>

	<div class="col-md-12">
		<a href="{{ route('blogs.create') }}" class="btn btn-success btn-margin-right">Create Blog</a>
		<a href="{{ route('blogs.trash') }}" class="btn btn-danger btn-margin-right">Trashed Blogs</a>
		<a href="{{ route('categories.create') }}" class="btn btn-success btn-margin-right">Create Categories</a>
	</div>
</div>
@endsection