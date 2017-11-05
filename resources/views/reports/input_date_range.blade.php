<html>
</body>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title> ERIO BMS </title>

        <!-- Bootstrap CSS and JS -->
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>

        <script src="{{asset('js/canvasjs.min.js')}}"></script>

        <!-- Global CSS for Background Colours and fonts and stuff -->
        <link rel="stylesheet" href="{{asset('css/global.css')}}">

        <link rel="stylesheet" href="{{asset('css/budgetVarianceReport.css')}}">
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
                <ul class="navbar-nav ml-auto">
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

        <div class="container" id="main-body">
            <div class="col-md-12 text-center">
                <p>Choose a time range</p>
                <form action="{{route('view.transactions.result')}}" method="post" >
                    Minimum Date:
                    <input type="date" name="mindate">
                    Maximum Date:
                    <input type="date" name="maxdate">
                    {{ csrf_field() }}
                    <input type="submit" name="submit">
                </form>
            </div>
            @if($errors->any())
                <div class="errors">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </body>
</html>