@extends('layouts.app')
@section('content')
	<div class="container-lg my-2">
		<div class="py-3 mb-4 bg-light rounded-3">
			<h1 class="text-center">Contact Us</h1>
		</div>
		<div class="col-md-12">
			<form action="{{ route('mail.send') }}" method="post" enctype="multipart/form-data">
				@include('partials/error-message')
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" name="name" class="form-control" value="{!! old('name') !!}">
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="text" name="email" class="form-control" value="{!! old('email') !!}">
				</div>
				<div class="form-group">
					<label for="subject">Subject</label>
					<input type="text" name="subject" class="form-control" value="{!! old('subject') !!}">
				</div>
				<div class="form-group">
				    <label for="mail_message">Message</label>
					<textarea name="mail_message" class="form-control">{!! old('mail_message') !!}</textarea>
				</div>
				<div class="d-grid gap-2">
				<button class="btn btn-primary" type="submit">Send Mail</button>
			</div>
				@csrf
			</form>
		</div>
	</div>

@endsection