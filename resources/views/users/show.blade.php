@extends('layouts.app')
@section('content')
<div class="container-lg my-2">
  <div class="py-3 mb-4 bg-light rounded-3">
	<h1 class="text-center">{{ $user->name }}'s profile ({{ $user->role->name }})</h1>
  </div>
  <div class="container">
	@foreach($user->blogs as $blog)
		<h1><a href={{ route('blogs.show', [$blog->id]) }}>{{ $blog->title }}</a></h1>
		{!! $blog->body !!}
	<hr>
	@endforeach
  </div>
</div>
@endsection