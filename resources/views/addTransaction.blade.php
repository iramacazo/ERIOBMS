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

    <!-- Date Picker -->
    <script src="{{asset('js/bootstrap-datepicker.min.js')}}">
    </script>
    <script src="{{asset('js/bootstrap-datepicker.js')}}">
    </script>
    <link rel="stylesheet" href="{{asset('css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-datepicker3.min.css')}}">

    <!-- Global CSS for Background Colours and fonts and stuff -->
    <link rel="stylesheet" href="{{asset('css/global.css')}}">

    <link rel="stylesheet" href="{{asset('css/add_transaction.css')}}">
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

<!-- BODY -->
<div class="container" id="main-body">
    <div class="row">
        <span class="col-md-1"></span>
        <div class="col-md-8" id="transaction_form_box">
            <h1>Add Transaction</h1>
            <form class="form" action="{{ route('submitTransaction') }}" method="POST" id="transaction_form">
                <h2>Owner: {{ \Illuminate\Support\Facades\Auth::user()->username }}</h2>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group{{$errors->has('category') ? ' has-danger' : ''}}">
                            <label for="category">Category</label>
                            <select class="form-control" name="category" id="category">
                                <option value="supplies">Supplies and Stationary</option>
                                <option value="transportation">Transportation</option>
                                <option value="mailing">Mailing</option>
                                <option value="meeting">Meeting Expenses</option>
                                <option value="workshop">Workshops and Teambuilding</option>
                                <option value="mimeo"> Mimeo and Reproduction</option>
                                <option value="telephone">Telephone</option>
                                <option value="repairs">Repairs and Maintenance</option>
                                <option value="publication">Publication</option>
                                <option value="uniform">Uniform</option>
                                <option value="internationtravel">International Travel</option>
                                <option value="representation">Representation</option>
                                <option value="tokens">Internation Tokens</option>
                                <option value="commitmentsstudent">Commitments (Student)</option>
                                <option value="commitmentsofficial">Commitments (Official)</option>
                                <option value="membership">Membership</option>
                                <option value="orientationprograms">Orientation Programs</option>
                                <option value="internationalizationprograms">Internationalization Programs</option>
                                <option value="activities">Activities</option>
                                <option value="capex">CAPEX</option>
                            </select>
                        </div>

                        <div class="form-group" id="date_group">
                            <label for="dat">Transaction Date </label>
                            <div class="input-daterange input-group" id="datepicker">
                                <input class="form-control text-left" id="date" name="transaction_date" required/>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('amount') ? ' has-danger ' : '' }}">
                            <label for="amount">Amount</label>
                            <input class="form-control number text-right" name="amount" value="{{old('amount')}}"
                                   required>
                            @if ($errors->has('amount'))
                                <div class="form-control-feedback">{{ $errors->first('amount') }}</div>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('item_name') ? ' has-danger ': '' }}">
                            <label for="item_name">Item or Activity Name</label>
                            <input class="form-control" name="item_name" value="{{old('item_name')}}" required>
                            @if ($errors->has('item_name'))
                                <div class="form-control-feedback">{{ $errors->first('item_name') }}</div>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('item_desc') ? ' has-danger ': '' }}">
                            <label for="item_desc">Description</label>
                            <textarea class="form-control" name="item_desc" value="{{old('item_desc')}}" rows="3"
                                      required></textarea>
                            @if ($errors->has('item_desc'))
                                <div class="form-control-feedback">{{ $errors->first('item_desc') }}</div>
                            @endif
                        </div>

                        <fieldset class="form-group">
                            <legend>Paid in Petty Cash?</legend>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="petty" value="yes" checked>
                                    Yes
                                </label>
                            </div>

                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="petty" value="no">
                                    No
                                </label>
                            </div>
                        </fieldset>

                        <br>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        {{ csrf_field() }}
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $(".number").keydown(function (e) {
            // Allow: backspace, delete, tab, escape, enter and .
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                // Allow: Ctrl/cmd+A
                (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                // Allow: Ctrl/cmd+C
                (e.keyCode === 67 && (e.ctrlKey === true || e.metaKey === true)) ||
                // Allow: Ctrl/cmd+X
                (e.keyCode === 88 && (e.ctrlKey === true || e.metaKey === true)) ||
                // Allow: home, end, left, right
                (e.keyCode >= 35 && e.keyCode <= 39)) {
                // let it happen, don't do anything
                return;
            }
            // Ensure that it is a number and stop the keypress
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
        })
    })
</script>
<script type="text/javascript">
    $('#date_group .input-daterange').datepicker({
        format: "yyyy-mm-dd",
        orientation: "bottom auto",
        endDate: 'today',
        autoclose: true
    });
</script>
</body>
</html>

