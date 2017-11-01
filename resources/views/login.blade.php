<html>
	<head>
		<title> ERIO BMS </title>
		<!-- Insert CSS -->
	</head>
	<body>
		Login
		<form action="" method="POST"> <!-- Insert Action -->
			<input type="text" name="username" placeholder="Username">
			<input type="password" name="password" placeholder="Password">
			<input type="submit" name="submit" value="submit" placeholder="Login">
			{{ csrf_field() }}
		</form>
		<br>
		<br>
		<a href="{{ url('register') }}">Register</a> <!-- Remove Later? -->

		<!-- Insert JS -->
	</body>
</html>