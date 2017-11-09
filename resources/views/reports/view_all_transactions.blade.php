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
        <script src="{{asset('js/canvasjs.min.js')}}"></script>

        <link rel="stylesheet" type="text/css" href="{{asset('DataTables/datatables.min.css')}}"/>
        <script type="text/javascript" src="{{asset('DataTables/datatables.min.js')}}"></script>

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

       {{-- <div class="container" id="main-body">
            <p>All Transactions</p>

            <div class="tabs">
                <ul class="tab-links">
                    <li class="active"><a href="#supplies">Supplies</a></li>
                    <li><a href="#transportation">Transportation</a></li>
                    <li><a href="#mailing">Mailing Expenses</a></li>
                    <li><a href="#workshop">Workshop and Teambuilding</a></li>
                    <li><a href="#meetings">Meeting Expenses</a></li>
                    <li><a href="#mimeo">Mimeo and Reproduction</a></li>
                    <li><a href="#telephone">Telehpone Expenses</a></li>
                    <li><a href="#repairs">Repairs and Maintenance</a></li>
                    <li><a href="#publication">Publication</a></li>
                    <li><a href="#uniform">Uniform</a></li>
                    <li><a href="#international_travel">International Travel</a></li>
                    <li><a href="#representation">Representation</a></li>
                    <li><a href="#international_tokens">International Tokens</a></li>
                    <li><a href="#commitments_official">Commitments (Official)</a></li>
                    <li><a href="#commitments_student">Commitments (Student)</a></li>
                    <li><a href="#membership">Membership</a></li>
                    <li><a href="#orientation_programs">Orientation Programs</a></li>
                    <li><a href="#internationalization_programs">Internationalization Programs</a></li>
                    <li><a href="#activities">Activities</a></li>
                    <li><a href="#capex">CAPEX</a></li>
                </ul>

                <div class="tab-content">

                    <div id="supplies" class="tab active">
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
                    </div>

                    <div id="transportation" class="tab">
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
                    </div>

                    <div id="mailing" class="tab">
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
                    </div>

                    <div id="meetings" class="tab">
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
                    </div>
                    <div id="workshop" class="tab">
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
                    </div>

                    <div id="mimeo" class="tab">
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
                    </div>

                    <div id="telephone" class="tab">
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
                    </div>

                    <div id="repairs" class="tab">
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
                    </div>

                    <div id="publication" class="tab">
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
                    </div>

                    <div id="uniform" class="tab">
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
                    </div>

                    <div id="international_travel" class="tab">
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
                    </div>

                    <div id="representation" class="tab">
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
                    </div>

                    <div id="international_tokens" class="tab">
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
                    </div>

                    <div id="commitments_official" class="tab">
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
                    </div>

                    <div id="commitments_student" class="tab">
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
                    </div>

                    <div id="membership" class="tab">
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
                    </div>

                    <div id="orientation_programs" class="tab">
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
                    </div>

                    <div id="internationalization_programs" class="tab">
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
                    </div>

                    <div id="activities" class="tab">
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
                    </div>

                    <div id="capex" class="tab">
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
                </div> <!-- end of tab contents -->

            </div> <!-- end of tabs div-->

        </div> <!-- end of content div -->
--}}

        <div class="row">
            <span class="col-md-2"></span>
            <div class="col-md-8" id="main-container">
                <h2 class="float-left">Transactions</h2>
                <div class="dropdown float-right">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dd-menu-button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        All
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-label="gay" id="dropdowncategory">
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

                <table class="table">
                    <thead class="thead-default">
                    <tr>
                        <th>Date</th>
                        <th>Item</th>
                        <th>Owner</th>
                        <th>Description</th>
                        <th>Amount</th>
                        <th>Running Balance</th>
                    </tr>
                    </thead>
                </table>

            </div>
            <span class="col-md-2"></span>
        </div>

    </body>
</html>