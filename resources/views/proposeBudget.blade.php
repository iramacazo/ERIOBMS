<html>
	<head>
		<title> ERIO BMS </title>
	</head>
	<body>
		Propose Budget
		<form action="{{ route('proposeBudget') }}" method='POST'>
			Academic Year
			<input type='text' name='academicyear' placeholder="Academic Year"><br>
			<br>
			<br>
			<b>Operating Expenses<b><br>
			Supplies & Stationery
			<input type='number' name='supplies' placeholder="Supplies"><br>
			Transportation
			<input type='number' name='transportation' placeholder="Transportation"><br>
			Mailing
			<input type='number' name='mailing' placeholder="Mailing"><br>
			Meeting Expenses
			<input type='number' name='meeting_expenses' placeholder="Meeting Expenses"><br>
			Annual Workshop/Teambuilding
			<input type='number' name='workshop' placeholder="Workshop"><br>
			Mimeo and Reproduction
			<input type='number' name='mimeo' placeholder="Mimeo"><br>
			Telephone
			<input type='number' name='telephone' placeholder="Telephone"><br>
			Repairs and Maintenance
			<input type='number' name='repairs_and_maintenance' placeholder="Repairs and Maintenance"><br><br>
			<b>Other Operating Expenses<b><br>
			Publication
			<input type='number' name='publication' placeholder="Publication"><br>
			Uniform
			<input type='number' name='uniform' placeholder="Uniform"><br>
			International Travel
			<input type='number' name='international_travel' placeholder="International Travel"><br>
			Representation
			<input type='number' name='representation' placeholder="Representation"><br>
			Institutional Tokens
			<input type='number' name='tokens' placeholder="Institutional Tokens"><br>
			Commitments Official
			<input type='number' name='commitments_official' placeholder="Commitments Official"><br>

			<!-- Di sure kung kasama to starting from here (Iba kasi fund) -->
			International and Local Membership and Hostings
			<input type='number' name='membership' placeholder="Membership"><br>
			Internationalization Programs
			<input type='number' name='internationalization_programs' placeholder="Internationalization Programs"><br>
			Orientation Programs
			<input type='number' name='orientation_programs' placeholder="Orientation Programs"><br>
			Commitments Student
			<input type='number' name='commitments_student' placeholder="commitments_student"><br><br>
			<!-- to here -->

			<!-- Most likely marerevise ABB and CAPEX since nagkakalist sila of Activities and "to buy" ata... -->
			Activities/Projects - ABB
			<input type='number' name='activities' placeholder="Activities"><br>
			CAPEX
			<input type='number' name='capex' placeholder="CAPEX"><br>
			<input type='submit' name='submit' value='Submit'>
			{{ csrf_field() }}
		</form>
	</body>
</html>