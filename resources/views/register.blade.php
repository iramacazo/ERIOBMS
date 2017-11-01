<html>
	<head>
		<title> Register </title>
		<!-- Insert CSS -->
	</head>
	<body>
		Register
		<form action="" method="POST"> <!-- Insert Action -->
			<input type="text" name="firstname" placeholder="First Name">
			<input type="text" name="lastname" placeholder="Last Name">
			<input type="text" name="username" placeholder="Username">
			<input type="password" name="password" placeholder="Password">
			<input type="password" name="repass" placeholder="Retype Password">
			<input type="text" name="usertype" placeholder="User Type"> <!-- Change to Radio Button -->
			<input type="submit" name="submit" value="submit" placeholder="Register">
			{{ csrf_field() }}
		</form>

		<!-- Insert JS -->
	</body>
</html>