<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
</head>
<body>
	<h2>NEW MESSAGE FROM {{ $name }} ({{ $email }})</h2>
	<hr>
	<h2>Subject: {{ $subject }}</h2>
	<hr>
	<p>Message: {{ $mail_message }}</p>
</body>
</html>