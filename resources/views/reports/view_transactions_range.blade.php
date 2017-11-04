<html>
<head>

</head>
<body>
<div>
    <h4>From: {{$from}}</h4> <!-- todo fix -->
    <h4>To: {{$to}}</h4>

    <h3>Transactions</h3>
    <table>
        <th>Date</th>
        <th>Item Name</th>
        <th>Amount</th>
        <th>Owner</th>
        <th>Category</th>
        <th>Running Balance</th>
        <th>Description</th>
        @foreach($transactions as $t)
            <tr>
                <td>{{ $t->transaction_date }}</td>
                <td>{{ $t->item_name }}</td>
                <td>{{ $t->amount }}</td>
                <td>{{ $t->owner }}</td>
                <td>{{ $t->category }}</td>
                <td> todo </td>
                <td>{{ $t->description }}</td>
            </tr>
        @endforeach
    </table>
</div>
</body>
</html>