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

    <!-- RIBBON BAR -->
    <nav class="navbar navbar-fixed-top">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('login') }}">
                <img class="nav-icon" src="{{asset('images/Logo.png')}}">
            </a>
        </div>
    </nav>

    <!-- BODY -->
    <div class="container" id="main-body">
        <div class="row">
            <span class="col-md-3"></span>

            <!-- REGISTER BOX -->
            <div id="form-block" class="col-md-5">
                <form action="{{ route('register') }}" method="POST" class="form">

                    <!-- FIRST NAME -->
                    <div class="form-group{{ $errors->has('firstname') ? ' has-danger' : '' }}">
                        <label for="firstname" class="control-label">First Name</label>
                        <input class="form-control" type="text" name="firstname" required autofocus
                               value="{{old('firstname')}}">

                        @if ($errors->has('firstname'))
                            <div class="form-control-feedback">{{ $errors->first('firstname') }}</div>
                        @endif
                    </div>

                    <!-- LAST NAME -->
                    <div class="form-group{{$errors->has('lastname') ? ' has-danger' : ''}}">
                        <label for="lastname" class="control-label">Last Name</label>
                        <input class="form-control" type="text" name="lastname" required
                            value="{{old('lastname')}}">

                        @if ($errors->has('lastname'))
                            <div class="form-control-feedback">{{ $errors->first('lastname') }}</div>
                        @endif
                    </div>

                    <!-- USERNAME -->
                    <div class="form-group{{$errors->has('username') ? ' has-danger' : ''}}">
                        <label for="username" class="control-label">Username</label>
                        <input class="form-control" type="text" name="username" required
                            value="{{old('username')}}">

                        @if($errors->has('username'))
                            <div class="form-control-feedback">{{$errors->first('username')}}</div>
                        @endif
                    </div>

                    <!-- EMAIL -->
                    <div class="form-group{{$errors->has('email') ? ' has-danger' : ''}}">
                        <label for="email" class="control-label">E-mail Address</label>
                        <input class="form-control" type="email" name="email" required
                            value="{{old('email')}}">

                        @if($errors->has('email'))
                            <div class="form-control-feedback">{{$errors->first('email')}}</div>
                        @endif
                    </div>

                    <!-- PASSWORD -->
                    <div class="form-group{{$errors->has('password') ? 'has-error': ''}}">
                        <label for="password" class="control-label">Password</label>
                        <input class="form-control" type="password" name="password" minlength = 6 required>

                        @if($errors->has('password'))
                            <div class="form-control-feedback">{{$errors->first('password')}}</div>
                        @endif
                        <small class="form-text text-muted">Minimum 6 characters</small>
                    </div>

                    <!-- RE PASSWORD -->
                    <div class="form-group">
                        <label for="password_confirmation" class="control-label">Retype Password</label>
                        <input class="form-control" type="password" name="password_confirmation" required>
                    </div>

                    {{-- <label for="usertype">User Type</label>
                    <input class="form-control" type="text" name="usertype" placeholder="User Type">--}}

                    <!-- Change to Radio Button -->
                    <input class="form-control" type="submit" name="submit" value="Register" id="register-button">
                    <small id = "register-reminder"class="form-text text-muted">*All fields are required</small>
                    {{ csrf_field() }}
                </form>
            </div>
            <span class="col-md-3"></span>
        </div>
    </div>
<!-- Insert JS -->
</body>
</html>