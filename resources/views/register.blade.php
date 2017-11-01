<html>
	<head>
		<!-- Required Meta Tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<title> Register </title>

		<!-- Bootstrap CSS and JS -->
		<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
		<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
		<script src="{{asset('js/bootstrap.min.js')}}"></script>

		<!-- Global CSS for Background Colours and fonts and stuff -->
		<link rel="stylesheet" href="{{asset('css/global.css')}}">

		<!-- Specific CSS -->
		<link rel="stylesheet" href="{{asset('css/register.css')}}">

		<!-- Follow the format of CSS and JS files so that the specifics can override the generals -->
	</head>
	<body>
        <nav class="navbar navbar-fixed-top">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ route('login') }}">
                    <img class="nav-icon" src="{{asset('images/Logo.png')}}">
                </a>
            </div>
        </nav>
        <div class="container" id="main-body">
            <div class="row">
                <span class="col-md-3"></span>
                <div id="form-block" class="col-md-6">
                    <form action="{{ url('registerUser') }}" method="POST"> <!-- Insert Action -->
                        <label for="firstname">First Name</label>
                        <input class="form-control" type="text" name="firstname" placeholder="First Name">
                        <label for="lastname">Last Name</label>
                        <input class="form-control" type="text" name="lastname" placeholder="Last Name">
                        <label for="username">Username</label>
                        <input class="form-control" type="text" name="username" placeholder="Username">
                        <label for="password">Password</label>
                        <input class="form-control" type="password" name="password" placeholder="Password">
                        <label for="repass">Retype Password</label>
                        <input class="form-control" type="password" name="repass" placeholder="Retype Password">
                        <label for="usertype">User Type</label>
                        <input class="form-control" type="text" name="usertype" placeholder="User Type">
                        <!-- Change to Radio Button -->
                        <input class="form-control" type="submit" name="submit" value="Register" id="register-button"
                               placeholder="Register">
                        {{ csrf_field() }}
                    </form>
                </div>
                <span class="col-md-3"></span>
            </div>
        </div>
		<!-- Insert JS -->
	</body>
</html>