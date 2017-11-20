<!DOCTYPE html>
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

    <link rel="stylesheet" href="{{asset('css/homepage.css')}}">
    <!-- Follow the format of CSS and JS files so that the specifics can override the generals -->
</head>
<body>
    <div class="flex-row" style="padding-bottom: 3%">
        <div class="d-flex justify-content-center">
            <img src="{{asset('images/Logo-2.png')}}" style="height: 250px;">
        </div>
    </div>
    <br>
    <div class="flex-row">
        <div class="d-flex justify-content-around">
            <span></span>
            <a class="home_link" href="#">Budget Proposal</a>
            <a class="home_link" href="#">General Journal</a>
            <a class="home_link" href="#">Ledger</a>
            <a class="home_link" href="#">Balance Sheet</a>
            <span></span>
        </div>
    </div>
    <img src="{{asset('images/airplane.png')}}" style="height: 25%; position: fixed; top: 15%; right: 5%;" >
</body>
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
</html>
