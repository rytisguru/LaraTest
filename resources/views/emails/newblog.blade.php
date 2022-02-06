<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
</head>
<body>
	<h2>Hi {{ $user->name }}</h2>
	<hr>
	<p>NEW BLOG CREATED: "<a href="{{ APP_URL . $blog->slug }}">{{ $blog->title }}"</a></p>
</body>
</html>