@extends('layouts.app')
@section('content')
<div class="container-lg my-2">
  <div class="py-3 mb-4 bg-light rounded-3">
	<h1 class="text-center">Manage Users</h1>
  </div>
  <div class="col-md-12">
  	<div class="row">
  		@foreach($users as $user)
  		<div class="col-md-4">
  			<form action="{{ route('users.update', $user->id) }}" method="post">
  				{{ method_field('patch') }}
  				<div class="form-group">
  					<input class="form-control" value="{{ $user->name }}" disabled>
  					<select name="role_id" class="form-control">
  						<option selected>{{ $user->role->name }}</option>
  						<option value="2">Author</option>
  						<option value="3">Subscriber</option>
  					</select>
  					<input class="form-control" value="{{ $user->email }}" disabled>
  					<input class="form-control" value="{{ $user->created_at->diffForHumans() }}">
  				</div>
				<button class="btn btn-primary col-md-12 mt-1" type="submit">Update User</button>
  				@csrf
  			</form>
  			<form action="{{ route('users.destroy', $user) }}" method="post">
				{{ method_field('delete') }}
				<button class="btn btn-danger col-md-12 mt-1" type="submit">Delete User</button>
  				@csrf
  			</form>
  		</div>
  		@endforeach
  	</div>
  </div>
</div> 
@endsection