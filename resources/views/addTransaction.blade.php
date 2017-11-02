@extends ('layouts.app')

@section('content')
<div>
Add Transaction
    <form action="addTransactionConfirm" method="POST" id="transaction_form">
        {{ csrf_field() }}
        <h4>Category:</h4>
        <select name="category" id="category" form="transaction_form">
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
        <h4>Transaction date:</h4>
        <input type="date" name="transaction_date">
        <h4>Amount: </h4>
        <input type="number" name="amount">
        <h4>Item or Activity Name:</h4>
        <input type="text" name="item_name">
        <h4>Description</h4>
        <input type="textarea" name="item_desc">
        <h4>Paid in petty cash?</h4>
        <input type="radio" name="petty" value="yes"> Yes
        <input type="radio" name="petty" value="no"> No
        <br>
        <input type="submit" name="submit">
    </form>



</div>
@endsection
