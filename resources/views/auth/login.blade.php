<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title> ERIO BMS </title>

    <!-- Bootstrap CSS and JS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>

    <!-- Global CSS for Background Colours and fonts and stuff -->
    <link rel="stylesheet" href="{{asset('css/global.css')}}">

    <!-- Specific CSS -->
    <link rel="stylesheet" href="{{asset('css/login.css')}}">

    <!-- Follow the format of CSS and JS files so that the specifics can override the generals -->
</head>
<body>

    <!-- RIBBON BAR -->
    <nav class="navbar navbar-fixed-top">
        <div class="navbar-header">
            <a class="navbar-brand" href="/">
                <img class="nav-icon" src="{{asset('images/Logo.png')}}">
            </a>
        </div>
    </nav>

    <!-- BODY -->
    <div class="container" id="main-body">
        <div class="row">
            <span class="col-md-3"></span>

            <!-- LOG IN BOX -->
            <div id="login-block" class="col-md-4">
                <form action="{{route('login')}}" method="POST" class="form"> <!-- Insert Action -->

                    <!-- USERNAME -->
                    <div class="form-group{{ $errors->has('username') ? ' has-danger' : '' }}">
                        <label for="username">Username</label>
                        <input class="form-control" type="text" name="username" value="{{old('username')}}" required>
                        @if ($errors->has('username'))
                            <div class="form-control-feedback">{{ $errors->first('username') }}</div>
                        @endif
                    </div>

                    <!-- PASSWORD -->
                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                        <label for="password" class="control-label">Password</label>
                        <input class="form-control" type="password" name="password" required>
                        @if ($errors->has('password'))
                            <div class="form-control-feedback">{{ $errors->first('password') }}</div>
                        @endif
                    </div>

                    <!-- LOG IN BUTTON -->
                    <input class="form-control" type="submit" name="submit" value="Login" id="login-button" placeholder="Login">
                    {{ csrf_field() }}
                </form>

                <!-- REGISTER -->
                <p id="register-link">New Employee? <br><a href="{{ url('register') }}">Register here!</a></p>
            </div>

            <span class="col-md-3"></span>
        </div>
    </div>

</body>
</html>