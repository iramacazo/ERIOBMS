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

    <script src="{{asset('js/canvasjs.min.js')}}"></script>

    <!-- Global CSS for Background Colours and fonts and stuff -->
    <link rel="stylesheet" href="{{asset('css/global.css')}}">

    <link rel="stylesheet" href="{{asset('css/home.css')}}">
    <!-- Follow the format of CSS and JS files so that the specifics can override the generals -->

    <!-- The Actual Chart -->
    @if($budgetdata != null)
        <script>
            var budgetdata = @json($budgetdata);
            var termdata = @json($amounts);
            var categorybudget = @json($categorybudget);
        </script>

    @endif
    <script src="{{asset('js/yearlybudgetpie.js')}}"></script>{{--
    <script src="{{asset('js/specificbudget.js')}}"></script>--}}
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

<!-- BODY -->
<div class="container" id="main-body">
    <div class="row">
        <span class="col-md-1"></span>
        <div class="col-md-10">
            <div class="card" id="overview">
                <div class="card-header">
                    <h1>Overview</h1>
                </div>
                <div class="card-block">
                    <div class="row" id="yearly_budget_area">
                        <div class="col-md-12 text-center">
                            @if(\App\ProposedBudget::all()->count() == 0 )
                                <h3>There is no approved budget!</h3>
                                <a href="{{route('goto_propose_budget')}}" role="button" id="propose_budget_button"
                                   class="btn btn-primary">Add Budget</a>

                            @else
                                <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                                <a href="{{route('goto_propose_budget')}}" role="button" id="propose_budget_button"
                                   class="btn btn-primary float-right">Add Budget</a>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6" id="transaction_area">
                            @if(\App\Transaction::all()->count() == 0)
                                <div class="text-center">
                                    <br>
                                    <h4>There are currently no transactions</h4>
                                    <a href="{{route('goto_add_transaction')}}" role="button" class="btn btn-primary
                                            @if(\App\ProposedBudget::all()->count() == 0)
                                                disabled
                                            @endif"
                                       id="add_transaction_button">Add Transaction</a>
                                    <br><br>
                                    @if(\App\ProposedBudget::all()->count() == 0)
                                        <small><i>You can't add a transaction without an approved budget</i></small>
                                    @endif
                                </div>
                            @else
                                <h3>Latest Transactions</h3>
                                <div class="list-group">
                                @foreach(\App\Transaction::all()->sortByDesc('transaction_date')->take(5)
                                                as $something)
                                    <div class="list-group-item flex-column align-items-start">
                                        <div class="d-flex w-100 justify-content-between">
                                            <strong>{{$something->item_name}}</strong>
                                            <small>{{$something->transaction_date}}</small>
                                        </div>
                                        <p class="mb-1">{{$something->description}}</p>
                                        <p class="mb-1">P{{number_format($something->amount, 2)}}</p>
                                    </div>
                                @endforeach
                                </div>
                                <a href="{{route('goto_add_transaction')}}" role="button"
                                   class="float-right btn btn-primary" id="add_transaction_button">Add Transaction</a>
                            @endif
                        </div>
                        <div class="col-md-6 text-center" id="category">
                            <div class="dropdown float-right">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dd-menu-button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Categories
                                </button>
                                <div class="dropdown-menu" aria-label="gay" id="dropdowncategory">
                                    <a class="dropdown-item category" name="activities">
                                        Activities/Projects - ABB </a>
                                    <a class="dropdown-item category" name="workshop">
                                        Annual Workshops/Teambuilding</a>
                                    <a class="dropdown-item category" name="capex">
                                        Capex</a>
                                    <a class="dropdown-item category" name="commitments_official">
                                        Commitments - Official</a>
                                    <a class="dropdown-item category" name="commitments_student">
                                        Commitments - Students</a>
                                    <a class="dropdown-item category" name="membership">
                                        International and Local Membership and Hostings</a>
                                    <a class="dropdown-item category" name="tokens">
                                        Institutional Tokens</a>
                                    <a class="dropdown-item category" name="international_travel">
                                        International Travel</a>
                                    <a class="dropdown-item category" name="internationalization_programs">
                                        Internationalization Programs</a>
                                    <a class="dropdown-item category" name="mailing">
                                        Mailing</a>
                                    <a class="dropdown-item category" name="meeting_expenses">
                                        Meeting Expenses</a>
                                    <a class="dropdown-item category" name="mimeo">
                                        Mimeo and Reproduction</a>
                                    <a class="dropdown-item category" name="orientation_programs">
                                        Orientation Programs</a>
                                    <a class="dropdown-item category" name="publication">
                                        Publication</a>
                                    <a class="dropdown-item category" name="repairs_and_maintenance">
                                        Repairs and Maintenance</a>
                                    <a class="dropdown-item category" name="representation">
                                        Representation</a>
                                    <a class="dropdown-item category" name="supplies">
                                        Supplies</a>
                                    <a class="dropdown-item category" name="telephone">
                                        Telephone</a>
                                    <a class="dropdown-item category" name="transportation">
                                        Transportation</a>
                                    <a class="dropdown-item category" name="uniform">
                                        Uniform</a>
                                </div>
                            </div>
                            <br>
                            <br>
                            <div id="chartContainer2" style="height: 300px; width: 100%; display: none"></div>
                            <h4 id="categorySplash">Select a category to see specific expenses</h4>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<a href="{{ route('budget_variance') }}"> Generate Budget Variance Report </a> 

</body>
</html>