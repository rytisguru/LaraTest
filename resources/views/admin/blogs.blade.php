@extends('layouts.app')
@section('content')
<div class="container-lg my-2">
    <div class="row">
        <div class="col-md-6">
            <div class="p-3 mb-2 bg-light rounded-3">
                <h1 class="text-center">Published Blogs</h1>
            </div>
            @foreach($publishedBlogs as $blog)
            	<h1><a href={{ route('blogs.show', [$blog->id]) }}>{{ $blog->title }}</a></h1>
            	<p>{{ strip_tags(Str::limit($blog->body, 100)) }}</p>
            	<form action="{{ route('blogs.update', $blog->id) }}" method="post">
                {{ method_field('patch') }}
                	<input name="status" type="hidden" value="0">
               		<button class="btn btn-warning btn-sm" type="submit">Save as Draft</button>
                @csrf
            </form>
            <hr>
            @endforeach
        </div>
        <div class="col-md-6">
            <div class="p-3 mb-2 bg-light border rounded-3">
                <h1 class="text-center">Draft Blogs</h1>
            </div>
            @foreach($draftBlogs as $blog)
            	<h1><a href={{ route('blogs.show', [$blog->id]) }}>{{ $blog->title }}</a></h1>
            	<p>{{ strip_tags(Str::limit($blog->body, 100)) }}</p>
            	<form action="{{ route('blogs.update', $blog->id) }}" method="post">
                {{ method_field('patch') }}
               	 	<input name="status" type="hidden" value="1">
                	<button class="btn btn-success btn-sm" type="submit">Publish</button>
                @csrf
            </form>
            <hr>
            @endforeach
        </div>
    </div>
</div>
@endsection

