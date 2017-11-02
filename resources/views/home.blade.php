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


    <!-- Follow the format of CSS and JS files so that the specifics can override the generals -->
</head>
<body>

<!-- RIBBON BAR -->
<nav class="navbar navbar-fixed-top navbar-toggleable-md">
    <div class="navbar-header ml-auto">
        <a class="navbar-brand" href="/">
            <img class="nav-icon" src="{{asset('images/Logo.png')}}">
        </a>
    </div>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto mr-3">
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"
                   aria-haspopup="true">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>

<!-- BODY -->
<div class="container" id="main-body">
    <div class="row">
        <span class="col-md-3"></span>

        <div class="panel panel-default">
            <div class="panel-heading">Dashboard</div>

            <div class="panel-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                You are logged in!
                <br>
                <a href="{{ url('/propose_budget') }}"> Propose Budget </a> <!-- revise niyo nalang UI temp lang to-->
                <br>
                <a href="{{ url('/add_transaction') }}"> Add Transaction </a> <!-- same -->
            </div>
        </div>


        <span class="col-md-3"></span>
    </div>
</div>

</body>
</html>