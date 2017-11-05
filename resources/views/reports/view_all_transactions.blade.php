<html>
    <head>

    </head>
    <body>

    <!-- todo tabs -->

    <div>
        <h3>Supplies</h3>
    <table>
        <th>Date</th>
        <th>Item Name</th>
        <th>Amount</th>
        <th>Owner</th>
        <th>Description</th>
        @foreach($supplies as $s)
            <tr>
                <td>{{ $s->transaction_date }}</td>
                <td>{{ $s->item_name }}</td>
                <td>{{ $s->amount }}</td>
                <td>{{ $s->owner }}</td>
                <td>{{ $s->description }}</td>
            </tr>
        @endforeach
    </table></div>

    <div><h3>Transportation</h3>
    <table>
        <th>Date</th>
        <th>Item Name</th>
        <th>Amount</th>
        <th>Owner</th>
        <th>Description</th>
        @foreach($transportation as $s)
            <tr>
                <td>{{ $s->transaction_date }}</td>
                <td>{{ $s->item_name }}</td>
                <td>{{ $s->amount }}</td>
                <td>{{ $s->owner }}</td>
                <td>{{ $s->description }}</td>
            </tr>
        @endforeach
    </table></div>

    <div><h3>Mailing</h3>
        <table>
            <th>Date</th>
            <th>Item Name</th>
            <th>Amount</th>
            <th>Owner</th>
            <th>Description</th>
            @foreach($mailing as $s)
                <tr>
                    <td>{{ $s->transaction_date }}</td>
                    <td>{{ $s->item_name }}</td>
                    <td>{{ $s->amount }}</td>
                    <td>{{ $s->owner }}</td>
                    <td>{{ $s->description }}</td>
                </tr>
            @endforeach
        </table></div>

    <div><h3>Meeting Expenses</h3>
    <table>
        <th>Date</th>
        <th>Item Name</th>
        <th>Amount</th>
        <th>Owner</th>
        <th>Description</th>
        @foreach($meeting_expenses as $s)
            <tr>
                <td>{{ $s->transaction_date }}</td>
                <td>{{ $s->item_name }}</td>
                <td>{{ $s->amount }}</td>
                <td>{{ $s->owner }}</td>
                <td>{{ $s->description }}</td>
            </tr>
        @endforeach
    </table></div>

    <div>
    <h3>Workshops and Teambuilding</h3>
    <table>
        <th>Date</th>
        <th>Item Name</th>
        <th>Amount</th>
        <th>Owner</th>
        <th>Description</th>
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
        <h3>Mimeo and Reproduction</h3>
    <table>
        <th>Date</th>
        <th>Item Name</th>
        <th>Amount</th>
        <th>Owner</th>
        <th>Description</th>
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
        <h3>Telephone Expenses</h3>
        <table>
            <th>Date</th>
            <th>Item Name</th>
            <th>Amount</th>
            <th>Owner</th>
            <th>Description</th>
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
        <h3>Repairs and Maintenance</h3>
        <table>
            <th>Date</th>
            <th>Item Name</th>
            <th>Amount</th>
            <th>Owner</th>
            <th>Description</th>
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
        <h3>Publication</h3>
        <table>
            <th>Date</th>
            <th>Item Name</th>
            <th>Amount</th>
            <th>Owner</th>
            <th>Description</th>
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
        <h3>Uniform</h3>
        <table>
            <th>Date</th>
            <th>Item Name</th>
            <th>Amount</th>
            <th>Owner</th>
            <th>Description</th>
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
        <h3>International Travel</h3>
        <table>
            <th>Date</th>
            <th>Item Name</th>
            <th>Amount</th>
            <th>Owner</th>
            <th>Description</th>
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
        <h3>Representation</h3>
        <table>
            <th>Date</th>
            <th>Item Name</th>
            <th>Amount</th>
            <th>Owner</th>
            <th>Description</th>
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
        <h3>International Tokens</h3>
        <table>
            <th>Date</th>
            <th>Item Name</th>
            <th>Amount</th>
            <th>Owner</th>
            <th>Description</th>
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
        <h3>Commitments (Official)</h3>
        <table>
            <th>Date</th>
            <th>Item Name</th>
            <th>Amount</th>
            <th>Owner</th>
            <th>Description</th>
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


    <h3>Commitments (Student)</h3>
    <table>
        <th>Date</th>
        <th>Item Name</th>
        <th>Amount</th>
        <th>Owner</th>
        <th>Description</th>
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

    <h3>Membership</h3>
    <table>
        <th>Date</th>
        <th>Item Name</th>
        <th>Amount</th>
        <th>Owner</th>
        <th>Description</th>
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

    <h3>Orientation Programs</h3>
    <table>
        <th>Date</th>
        <th>Item Name</th>
        <th>Amount</th>
        <th>Owner</th>
        <th>Description</th>
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

    <h3>Internationalization Programs</h3>
    <table>
        <th>Date</th>
        <th>Item Name</th>
        <th>Amount</th>
        <th>Owner</th>
        <th>Description</th>
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

    <h3>Activities</h3>
    <table>
        <th>Date</th>
        <th>Item Name</th>
        <th>Amount</th>
        <th>Owner</th>
        <th>Description</th>
        <th></th>
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
    <h3>CAPEX</h3>
    <table>
        <th>Date</th>
        <th>Item Name</th>
        <th>Amount</th>
        <th>Owner</th>
        <th>Description</th>
        <th></th>
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

    </body>
</html>