@extends('layouts.app')
@section('content')
<div class="container-lg my-2">
    <div class="p-3 mb-4 bg-light border rounded-3">
        <h1 class="text-center">Admin Page</h1>
    </div>
    <div class="col-md-12">
        <a href="{{ route('blogs.create') }}" class="btn btn-success btn-margin-right">Create Blog</a>
        <a href="{{ route('blogs.trash') }}" class="btn btn-danger btn-margin-right">Trashed Blogs</a>
        <a href="{{ route('categories.create') }}" class="btn btn-success btn-margin-right">Create Categories</a>
        <a href="{{ route('admin.blogs') }}" class="btn btn-success btn-margin-right">Manage Blogs</a>
    </div>
</div>
@endsection
