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
        <div>
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
    </div>
</body>
</html>