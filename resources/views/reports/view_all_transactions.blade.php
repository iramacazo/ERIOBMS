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

        <link rel="stylesheet" href="{{asset('css/view_all_transactions.css')}}">
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

    <!-- todo tabs -->

        <div class="container" id="main-body">
            <p>All Transactions</p>
            <div>
                <table>
                    <th colspan = "5">Supplies</th>
                    <tr>
                        <th>Date</th>
                        <th>Item Name</th>
                        <th>Amount</th>
                        <th>Owner</th>
                        <th>Description</th>
                    </tr>
                    @foreach($supplies as $s)
                        <tr>
                            <td>{{ $s->transaction_date }}</td>
                            <td>{{ $s->item_name }}</td>
                            <td>{{ $s->amount }}</td>
                            <td>{{ $s->owner }}</td>
                            <td>{{ $s->description }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>

            <div>
                <table>
                    <th colspan = "5">Transportation</th>
                    <tr>
                        <th>Date</th>
                        <th>Item Name</th>
                        <th>Amount</th>
                        <th>Owner</th>
                        <th>Description</th>
                    </tr>
                    @foreach($transportation as $s)
                        <tr>
                            <td>{{ $s->transaction_date }}</td>
                            <td>{{ $s->item_name }}</td>
                            <td>{{ $s->amount }}</td>
                            <td>{{ $s->owner }}</td>
                            <td>{{ $s->description }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>

            <div>
                <table>
                    <th colspan = "5">Mailing</th>
                    <tr>
                        <th>Date</th>
                        <th>Item Name</th>
                        <th>Amount</th>
                        <th>Owner</th>
                        <th>Description</th>
                    </tr>
                    @foreach($mailing as $s)
                        <tr>
                            <td>{{ $s->transaction_date }}</td>
                            <td>{{ $s->item_name }}</td>
                            <td>{{ $s->amount }}</td>
                            <td>{{ $s->owner }}</td>
                            <td>{{ $s->description }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>

            <div>
                <table>
                    <th colspan = "5">Meeting Expenses</th>
                    <tr>
                        <th>Date</th>
                        <th>Item Name</th>
                        <th>Amount</th>
                        <th>Owner</th>
                        <th>Description</th>
                    </tr>
                    @foreach($meeting_expenses as $s)
                        <tr>
                            <td>{{ $s->transaction_date }}</td>
                            <td>{{ $s->item_name }}</td>
                            <td>{{ $s->amount }}</td>
                            <td>{{ $s->owner }}</td>
                            <td>{{ $s->description }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>

            <div>
                <table>
                    <th colspan = "5">Workshops and Teambuilding</th>
                    <tr>
                        <th>Date</th>
                        <th>Item Name</th>
                        <th>Amount</th>
                        <th>Owner</th>
                        <th>Description</th>
                    </tr>
                    @foreach($workshop as $s)
                        <tr>
                            <td>{{ $s->transaction_date }}</td>
                            <td>{{ $s->item_name }}</td>
                            <td>{{ $s->amount }}</td>
                            <td>{{ $s->owner }}</td>
                            <td>{{ $s->description }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>

            <div>
                <table>
                    <th colspan = "5">Mimeo and Reproduction</th>
                    <tr>
                        <th>Date</th>
                        <th>Item Name</th>
                        <th>Amount</th>
                        <th>Owner</th>
                        <th>Description</th>
                    </tr>
                    @foreach($mimeo as $s)
                        <tr>
                            <td>{{ $s->transaction_date }}</td>
                            <td>{{ $s->item_name }}</td>
                            <td>{{ $s->amount }}</td>
                            <td>{{ $s->owner }}</td>
                            <td>{{ $s->description }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>

            <div>
                <table>
                    <th colspan = "5">Telephone Expenses</th>
                    <tr>
                        <th>Date</th>
                        <th>Item Name</th>
                        <th>Amount</th>
                        <th>Owner</th>
                        <th>Description</th>
                    </tr>
                    @foreach($telephone as $s)
                        <tr>
                            <td>{{ $s->transaction_date }}</td>
                            <td>{{ $s->item_name }}</td>
                            <td>{{ $s->amount }}</td>
                            <td>{{ $s->owner }}</td>
                            <td>{{ $s->description }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>

            <div>
                <table>
                    <th colspan = "5">Repairs and Maintenance</th>
                    <tr>
                        <th>Date</th>
                        <th>Item Name</th>
                        <th>Amount</th>
                        <th>Owner</th>
                        <th>Description</th>
                    </tr>
                    @foreach($repairs_and_maintenance as $s)
                        <tr>
                            <td>{{ $s->transaction_date }}</td>
                            <td>{{ $s->item_name }}</td>
                            <td>{{ $s->amount }}</td>
                            <td>{{ $s->owner }}</td>
                            <td>{{ $s->description }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>

            <div>
                <table>
                    <th colspan = "5">Publication</th>
                    <tr>
                        <th>Date</th>
                        <th>Item Name</th>
                        <th>Amount</th>
                        <th>Owner</th>
                        <th>Description</th>
                    </tr>
                    @foreach($publication as $s)
                        <tr>
                            <td>{{ $s->transaction_date }}</td>
                            <td>{{ $s->item_name }}</td>
                            <td>{{ $s->amount }}</td>
                            <td>{{ $s->owner }}</td>
                            <td>{{ $s->description }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>

            <div>
                <table>
                    <th colspan = "5">Uniform</th>
                    <tr>
                        <th>Date</th>
                        <th>Item Name</th>
                        <th>Amount</th>
                        <th>Owner</th>
                        <th>Description</th>
                    </tr>
                    @foreach($uniform as $s)
                        <tr>
                            <td>{{ $s->transaction_date }}</td>
                            <td>{{ $s->item_name }}</td>
                            <td>{{ $s->amount }}</td>
                            <td>{{ $s->owner }}</td>
                            <td>{{ $s->description }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>

            <div>
                <table>
                    <th colspan = "5">International Travel</th>
                    <tr>
                        <th>Date</th>
                        <th>Item Name</th>
                        <th>Amount</th>
                        <th>Owner</th>
                        <th>Description</th>
                    </tr>
                    @foreach($international_travel as $s)
                        <tr>
                            <td>{{ $s->transaction_date }}</td>
                            <td>{{ $s->item_name }}</td>
                            <td>{{ $s->amount }}</td>
                            <td>{{ $s->owner }}</td>
                            <td>{{ $s->description }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>

            <div>
                <table>
                    <th colspan = "5">Representation</th>
                    <tr>
                        <th>Date</th>
                        <th>Item Name</th>
                        <th>Amount</th>
                        <th>Owner</th>
                        <th>Description</th>
                    </tr>
                    @foreach($representation as $s)
                        <tr>
                            <td>{{ $s->transaction_date }}</td>
                            <td>{{ $s->item_name }}</td>
                            <td>{{ $s->amount }}</td>
                            <td>{{ $s->owner }}</td>
                            <td>{{ $s->description }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>

            <div>
                <table>
                    <th colspan = "5">International Tokens</th>
                    <tr>
                        <th>Date</th>
                        <th>Item Name</th>
                        <th>Amount</th>
                        <th>Owner</th>
                        <th>Description</th>
                    </tr>
                    @foreach($tokens as $s)
                        <tr>
                            <td>{{ $s->transaction_date }}</td>
                            <td>{{ $s->item_name }}</td>
                            <td>{{ $s->amount }}</td>
                            <td>{{ $s->owner }}</td>
                            <td>{{ $s->description }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>

            <div>
                <table>
                    <th colspan = "5">Commitments (Official)</th>
                    <tr>
                        <th>Date</th>
                        <th>Item Name</th>
                        <th>Amount</th>
                        <th>Owner</th>
                        <th>Description</th>
                    </tr>
                    @foreach($commitments_official as $s)
                        <tr>
                            <td>{{ $s->transaction_date }}</td>
                            <td>{{ $s->item_name }}</td>
                            <td>{{ $s->amount }}</td>
                            <td>{{ $s->owner }}</td>
                            <td>{{ $s->description }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>

            <div>
                <table>
                    <th colspan = "5">Commitments (Student)</th>
                    <tr>
                        <th>Date</th>
                        <th>Item Name</th>
                        <th>Amount</th>
                        <th>Owner</th>
                        <th>Description</th>
                    </tr>
                    @foreach($commitments_student as $s)
                        <tr>
                            <td>{{ $s->transaction_date }}</td>
                            <td>{{ $s->item_name }}</td>
                            <td>{{ $s->amount }}</td>
                            <td>{{ $s->owner }}</td>
                            <td>{{ $s->description }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>

            <div>
                <table>
                    <th colspan = "5">Membership</th>
                    <tr>
                        <th>Date</th>
                        <th>Item Name</th>
                        <th>Amount</th>
                        <th>Owner</th>
                        <th>Description</th>
                    </tr>
                    @foreach($membership as $s)
                        <tr>
                            <td>{{ $s->transaction_date }}</td>
                            <td>{{ $s->item_name }}</td>
                            <td>{{ $s->amount }}</td>
                            <td>{{ $s->owner }}</td>
                            <td>{{ $s->description }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>

            <div>
                <table>
                    <th colspan = "5">Orientation Programs</th>
                    <tr>
                        <th>Date</th>
                        <th>Item Name</th>
                        <th>Amount</th>
                        <th>Owner</th>
                        <th>Description</th>
                    </tr>
                    @foreach($orientation_programs as $s)
                        <tr>
                            <td>{{ $s->transaction_date }}</td>
                            <td>{{ $s->item_name }}</td>
                            <td>{{ $s->amount }}</td>
                            <td>{{ $s->owner }}</td>
                            <td>{{ $s->description }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>

            <div>
                <table>
                    <th colspan = "5">Internationalization Programs</th>
                    <tr>
                        <th>Date</th>
                        <th>Item Name</th>
                        <th>Amount</th>
                        <th>Owner</th>
                        <th>Description</th>
                    </tr>
                    @foreach($internationalization_programs as $s)
                        <tr>
                            <td>{{ $s->transaction_date }}</td>
                            <td>{{ $s->item_name }}</td>
                            <td>{{ $s->amount }}</td>
                            <td>{{ $s->owner }}</td>
                            <td>{{ $s->description }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>

            <div>
                <table>
                    <th colspan = "5">Activities</th>
                    <tr>
                        <th>Date</th>
                        <th>Item Name</th>
                        <th>Amount</th>
                        <th>Owner</th>
                        <th>Description</th>
                    </tr>
                    @foreach($activities as $s)
                        <tr>
                            <td>{{ $s->transaction_date }}</td>
                            <td>{{ $s->item_name }}</td>
                            <td>{{ $s->amount }}</td>
                            <td>{{ $s->owner }}</td>
                            <td>{{ $s->description }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>

            <div>
                <table>
                    <th colspan = "5">CAPEX</th>
                    <tr>
                        <th>Date</th>
                        <th>Item Name</th>
                        <th>Amount</th>
                        <th>Owner</th>
                        <th>Description</th>
                    </tr>
                    @foreach($capex as $s)
                        <tr>
                            <td>{{ $s->transaction_date }}</td>
                            <td>{{ $s->item_name }}</td>
                            <td>{{ $s->amount }}</td>
                            <td>{{ $s->owner }}</td>
                            <td>{{ $s->description }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>

    </body>
</html>