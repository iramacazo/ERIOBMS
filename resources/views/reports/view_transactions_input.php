<html>
<head>
    
</head>
<body>
    <div>
        <form action="{{route('view.transactions.result')}}" method="post" >
            Minimum Date:
            <input type="date" name="mindate">
            Maximum Date:
            <input type="date" name="maxdate">
            {{ csrf_field() }}
            <input type="submit" name="submit">
        </form>
    </div>
</body>
</html>