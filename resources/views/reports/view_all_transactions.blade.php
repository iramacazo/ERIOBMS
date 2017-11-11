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
        <script>
            /*$(document).ready(function() {
                jQuery('.tabs .tab-links a').on('click', function(e)  {
                    var currentAttrValue = jQuery(this).attr('href');

                    // Show/Hide Tabs
                    jQuery('.tabs ' + currentAttrValue).show().siblings().hide();

                    // Change/remove current tab to active
                    jQuery(this).parent('li').addClass('active').siblings().removeClass('active');

                    e.preventDefault();
                });
            });*/
        </script>

        <link rel="stylesheet" type="text/css" href="{{asset('DataTables/datatables.css')}}"/>
        <script type="text/javascript" src="{{asset('DataTables/datatables.js')}}"></script>

        <!-- Global CSS for Background Colours and fonts and stuff -->
        <link rel="stylesheet" href="{{asset('css/global.css')}}">

        <link rel="stylesheet" href="{{asset('css/view_all_transactions.css')}}">
        <script type="text/javascript" src="{{asset('js/view_all_transactions.js')}}"></script>
        <!-- Follow the format of CSS and JS files so that the specifics can override the generals -->

        <script>
            var transactions = @json($all);
            var budget = @json($budget)
        </script>
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

        <div class="row">
            <span class="col-md-2"></span>
            <div class="col-md-8" id="main-container">
                <div class="d-flex flex-row justify-content-between">
                    <h2>Transactions</h2>
                    <div class="d-flex flex-row-reverse align-items-center align-content-center">
                        <div class="dropdown" style="margin-right: 15px">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dd-menu-button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                All
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-label="gay" id="dropdowncategory">
                                <a class="dropdown-item category" name="all">
                                    All</a>
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
                                <a class="dropdown-item category" name="international_events">
                                    International Events</a>
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
                                <a class="dropdown-item category" name="support_for_outbound_students">
                                    Support for Outbound Students</a>
                                <a class="dropdown-item category" name="telephone">
                                    Telephone</a>
                                <a class="dropdown-item category" name="transportation">
                                    Transportation</a>
                                <a class="dropdown-item category" name="uniform">
                                    Uniform</a>
                            </div>
                        </div>
                    </div>
                </div>

                <br>

                <div class="d-flex flex-row">
                    <table class="table table-striped" id="transactions_table">
                        <thead class="thead-default">
                        <tr id="table_head">
                            <th>Date</th>
                            <th>Term</th>
                            <th>Owner</th>
                            <th>Item</th>
                            <th>Description</th>
                            <th>Amount</th>
                        </tr>
                        </thead>
                        <tbody id="transactions_body">
                        @foreach($all as $trans)
                            <tr>
                                <td>{{ $trans->transaction_date}}</td>
                                <td>Term {{$trans->term}}</td>
                                <td>{{ $trans->owner }}</td>
                                <td>{{ $trans->item_name }}</td>
                                <td>{{ $trans->description }}</td>
                                <td class="text-right">P{{ number_format($trans->amount, 2) }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <span class="col-md-2"></span>
        </div>
    </body>
</html>