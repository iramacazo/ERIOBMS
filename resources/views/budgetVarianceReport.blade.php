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

		<link rel="stylesheet" href="{{asset('css/budgetVarianceReport.css')}}">
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

		<div class="container" id="main-body">
			<div class="col-md-12 text-center" id = table-block>
				<p>Budget Variance Report from <!--Get date from what the user picked--></p>
				<!-- TODO table -->
				<!-- Col 1 = Categories ... Col 2 = Budget ... Col 3 = Actual ... Col 4 = Budget - Actual ... Col 5 = Budget-Actual/Budget -->
				<table>
					<tr>
						<th>Categories</th>
						<th id = "budget-variance-report-column-header">Orable Code</th>
						<th id = "budget-variance-report-column-header">Budget</th>
						<th id = "budget-variance-report-column-header">Actual</th>
						<th id = "budget-variance-report-column-header">Difference</th>
						<th id = "budget-variance-report-column-header">Variance</th>
					</tr>
					<tr>
						<th colspan = "6">General Operating Expenses</th>
					</tr>
					<tr>
						<td id = "budget-variance-report-row-header">Supplies and Stationery</td>
						<td>810010</td>
						<td>{{ $data["supplies"]["budget"] }}</td>
						<td>{{ $data["supplies"]["amount"] }}</td>
						<td>{{ $data["supplies"]["budget"] - $data["supplies"]["amount"] }}</td>
						<td>{{ number_format((($data["supplies"]["budget"] - $data["supplies"]["amount"])/$data["supplies"]["budget"])*100, 2) }}%</td>
					</tr>
					<tr>
						<td id = "budget-variance-report-row-header">Transportation</td>
						<td>815010</td>
						<td>{{ $data["transportation"]["budget"] }}</td>
						<td>{{ $data["transportation"]["amount"] }}</td>
						<td>{{ $data["transportation"]["budget"] - $data["transportation"]["amount"] }}</td>
						<td>{{ number_format((($data["transportation"]["budget"] - $data["transportation"]["amount"])/$data["transportation"]["budget"])*100, 2) }}%</td>
					</tr>
					<tr>
						<td id = "budget-variance-report-row-header">Mailing</td>
						<td>814020</td>
						<td>{{ $data["mailing"]["budget"] }}</td>
						<td>{{ $data["mailing"]["amount"] }}</td>
						<td>{{ $data["mailing"]["budget"] - $data["mailing"]["amount"] }}</td>
						<td>{{ number_format((($data["mailing"]["budget"] - $data["mailing"]["amount"])/$data["mailing"]["budget"])*100, 2) }}%</td>
					</tr>
					<tr>
						<td id = "budget-variance-report-row-header">Meeting Expenses</td>
						<td>816010</td>
						<td>{{ $data["meeting_expenses"]["budget"] }}</td>
						<td>{{ $data["meeting_expenses"]["amount"] }}</td>
						<td>{{ $data["meeting_expenses"]["budget"] - $data["meeting_expenses"]["amount"] }}</td>
						<td>{{ number_format((($data["meeting_expenses"]["budget"] - $data["meeting_expenses"]["amount"])/$data["meeting_expenses"]["budget"])*100, 2) }}%</td>
					</tr>
					<tr>
						<td id = "budget-variance-report-row-header">Annual Workshop/Teambuilding</td>
						<td>831160</td>
						<td>{{ $data["workshop"]["budget"] }}</td>
						<td>{{ $data["workshop"]["amount"] }}</td>
						<td>{{ $data["workshop"]["budget"] - $data["workshop"]["amount"] }}</td>
						<td>{{ number_format((($data["workshop"]["budget"] - $data["workshop"]["amount"])/$data["workshop"]["budget"])*100, 2) }}%</td>
					</tr>
					<tr>
						<td id = "budget-variance-report-row-header">Mimeo and Reproduction</td>
						<td>810020</td>
						<td>{{ $data["mimeo"]["budget"] }}</td>
						<td>{{ $data["mimeo"]["amount"] }}</td>
						<td>{{ $data["mimeo"]["budget"] - $data["mimeo"]["amount"] }}</td>
						<td>{{ number_format((($data["mimeo"]["budget"] - $data["mimeo"]["amount"])/$data["mimeo"]["budget"])*100, 2) }}%</td>
					</tr>
					<tr>
						<td id = "budget-variance-report-row-header">Telephone</td>
						<td>814011</td>
						<td>{{ $data["telephone"]["budget"] }}</td>
						<td>{{ $data["telephone"]["amount"] }}</td>
						<td>{{ $data["telephone"]["budget"] - $data["telephone"]["amount"] }}</td>
						<td>{{ number_format((($data["telephone"]["budget"] - $data["telephone"]["amount"])/$data["telephone"]["budget"])*100, 2) }}%</td>
					</tr>
					<tr>
						<td id = "budget-variance-report-row-header">Repairs and Maintenance</td>
						<td>811040</td>
						<td>{{ $data["repairs_and_maintenance"]["budget"] }}</td>
						<td>{{ $data["repairs_and_maintenance"]["amount"] }}</td>
						<td>{{ $data["repairs_and_maintenance"]["budget"] - $data["repairs_and_maintenance"]["amount"] }}</td>
						<td>{{ number_format((($data["repairs_and_maintenance"]["budget"] - $data["repairs_and_maintenance"]["amount"])/$data["repairs_and_maintenance"]["budget"])*100, 2) }}%</td>
					</tr>
					<tr>
						<th>Subtotal</th>
						<td></td>
						<td><b>{{ $data["supplies"]["budget"] + $data["transportation"]["budget"] + $data["mailing"]["budget"] + $data["meeting_expenses"]["budget"] + $data["workshop"]["budget"] + $data["mimeo"]["budget"] + $data["telephone"]["budget"] + $data["repairs_and_maintenance"]["budget"] }}</b></td>
						<td><b>{{ $data["supplies"]["amount"] + $data["transportation"]["amount"] + $data["mailing"]["amount"] + $data["meeting_expenses"]["amount"] + $data["workshop"]["amount"] + $data["mimeo"]["amount"] + $data["telephone"]["amount"] + $data["repairs_and_maintenance"]["amount"] }}</b></td>
						<td><b>{{ ($data["supplies"]["budget"] + $data["transportation"]["budget"] + $data["mailing"]["budget"] + $data["meeting_expenses"]["budget"] + $data["workshop"]["budget"] + $data["mimeo"]["budget"] + $data["telephone"]["budget"] + $data["repairs_and_maintenance"]["budget"])-($data["supplies"]["amount"] + $data["transportation"]["amount"] + $data["mailing"]["amount"] + $data["meeting_expenses"]["amount"] + $data["workshop"]["amount"] + $data["mimeo"]["amount"] + $data["telephone"]["amount"] + $data["repairs_and_maintenance"]["amount"]) }}</b></td>
						<td><b>{{ number_format(((($data["supplies"]["budget"] + $data["transportation"]["budget"] + $data["mailing"]["budget"] + $data["meeting_expenses"]["budget"] + $data["workshop"]["budget"] + $data["mimeo"]["budget"] + $data["telephone"]["budget"] + $data["repairs_and_maintenance"]["budget"])-($data["supplies"]["amount"] + $data["transportation"]["amount"] + $data["mailing"]["amount"] + $data["meeting_expenses"]["amount"] + $data["workshop"]["amount"] + $data["mimeo"]["amount"] + $data["telephone"]["amount"] + $data["repairs_and_maintenance"]["amount"]))/($data["supplies"]["budget"] + $data["transportation"]["budget"] + $data["mailing"]["budget"] + $data["meeting_expenses"]["budget"] + $data["workshop"]["budget"] + $data["mimeo"]["budget"] + $data["telephone"]["budget"] + $data["repairs_and_maintenance"]["budget"]))*100, 2) }}%</b></td>
					</tr>
					<tr>
						<th colspan = "6">Other Operating Expenses</th>
					</tr>
					<tr>
						<td id = "budget-variance-report-row-header">Publication/Subscription/Brochures</td>
						<td>810080</td>
						<td>{{ $data["publication"]["budget"] }}</td>
						<td>{{ $data["publication"]["amount"] }}</td>
						<td>{{ $data["publication"]["budget"] - $data["publication"]["amount"] }}</td>
						<td>{{ number_format((($data["publication"]["budget"] - $data["publication"]["amount"])/$data["publication"]["budget"])*100, 2) }}%</td>
					</tr>
					<tr>
						<td id = "budget-variance-report-row-header">Uniform</td>
						<td>802251</td>
						<td>{{ $data["uniform"]["budget"] }}</td>
						<td>{{ $data["uniform"]["amount"] }}</td>
						<td>{{ $data["uniform"]["budget"] - $data["uniform"]["amount"] }}</td>
						<td>{{ number_format((($data["uniform"]["budget"] - $data["uniform"]["amount"])/$data["uniform"]["budget"])*100, 2) }}%</td>
					</tr>
					<tr>
						<td id = "budget-variance-report-row-header">International Travel</td>
						<td>815030</td>
						<td>{{ $data["international_travel"]["budget"] }}</td>
						<td>{{ $data["international_travel"]["amount"] }}</td>
						<td>{{ $data["international_travel"]["budget"] - $data["international_travel"]["amount"] }}</td>
						<td>{{ number_format((($data["international_travel"]["budget"] - $data["international_travel"]["amount"])/$data["international_travel"]["budget"])*100, 2) }}%</td>
					</tr>
					<tr>
						<td id = "budget-variance-report-row-header">Representation</td>
						<td>826010</td>
						<td>{{ $data["representation"]["budget"] }}</td>
						<td>{{ $data["representation"]["amount"] }}</td>
						<td>{{ $data["representation"]["budget"] - $data["representation"]["amount"] }}</td>
						<td>{{ number_format((($data["representation"]["budget"] - $data["representation"]["amount"])/$data["representation"]["budget"])*100, 2) }}%</td>
					</tr>
					<tr>
						<td id = "budget-variance-report-row-header">Institutional Tokens</td>
						<td>826030</td>
						<td>{{ $data["tokens"]["budget"] }}</td>
						<td>{{ $data["tokens"]["amount"] }}</td>
						<td>{{ $data["tokens"]["budget"] - $data["tokens"]["amount"] }}</td>
						<td>{{ number_format((($data["tokens"]["budget"] - $data["tokens"]["amount"])/$data["tokens"]["budget"])*100, 2) }}%</td>
					</tr>
					<tr>
						<td id = "budget-variance-report-row-header">Official Institutional Functions</td>
						<td>832142</td>
						<td>{{ $data["commitments_official"]["budget"] }}</td>
						<td>{{ $data["commitments_official"]["amount"] }}</td>
						<td>{{ $data["commitments_official"]["budget"] - $data["commitments_official"]["amount"] }}</td>
						<td>{{ number_format((($data["commitments_official"]["budget"] - $data["commitments_official"]["amount"])/$data["commitments_official"]["budget"])*100, 2) }}%</td>
					</tr>
					<tr>
						<td id = "budget-variance-report-row-header">International and Local Membership and Hostings</td>
						<td>819010</td>
						<td>{{ $data["membership"]["budget"] }}</td>
						<td>{{ $data["membership"]["amount"] }}</td>
						<td>{{ $data["membership"]["budget"] - $data["membership"]["amount"] }}</td>
						<td>{{ number_format((($data["membership"]["budget"] - $data["membership"]["amount"])/$data["membership"]["budget"])*100, 2) }}%</td>
					</tr>
					<tr>
						<td id = "budget-variance-report-row-header">Internationalization Programs</td>
						<td>832450</td>
						<td>{{ $data["internationalization_programs"]["budget"] }}</td>
						<td>{{ $data["internationalization_programs"]["amount"] }}</td>
						<td>{{ $data["internationalization_programs"]["budget"] - $data["internationalization_programs"]["amount"] }}</td>
						<td>{{ number_format((($data["internationalization_programs"]["budget"] - $data["internationalization_programs"]["amount"])/$data["internationalization_programs"]["budget"])*100, 2) }}%</td>
					</tr>
					<tr>
						<td id = "budget-variance-report-row-header">Support for Outbound Students</td>
						<td>834030</td>
						<td>{{ $data["support_for_outbound_students"]["budget"] }}</td>
						<td>{{ $data["support_for_outbound_students"]["amount"] }}</td>
						<td>{{ $data["support_for_outbound_students"]["budget"] - $data["support_for_outbound_students"]["amount"] }}</td>
						<td>{{ number_format((($data["support_for_outbound_students"]["budget"] - $data["support_for_outbound_students"]["amount"])/$data["support_for_outbound_students"]["budget"])*100, 2) }}%</td>
					</tr>
					<tr>
						<td id = "budget-variance-report-row-header">International Events</td>
						<td>834030</td>
						<td>{{ $data["international_events"]["budget"] }}</td>
						<td>{{ $data["international_events"]["amount"] }}</td>
						<td>{{ $data["international_events"]["budget"] - $data["international_events"]["amount"] }}</td>
						<td>{{ number_format((($data["international_events"]["budget"] - $data["international_events"]["amount"])/$data["international_events"]["budget"])*100, 2) }}%</td>
					</tr>
					<tr>
						<td id = "budget-variance-report-row-header">Orientation Programs</td>
						<td>832013</td>
						<td>{{ $data["orientation_programs"]["budget"] }}</td>
						<td>{{ $data["orientation_programs"]["amount"] }}</td>
						<td>{{ $data["orientation_programs"]["budget"] - $data["orientation_programs"]["amount"] }}</td>
						<td>{{ number_format((($data["orientation_programs"]["budget"] - $data["orientation_programs"]["amount"])/$data["orientation_programs"]["budget"])*100, 2) }}%</td>
					</tr>
					<tr>
						<td id = "budget-variance-report-row-header">Institutional Commitments (Student Engagement)</td>
						<td>832141</td>
						<td>{{ $data["commitments_student"]["budget"] }}</td>
						<td>{{ $data["commitments_student"]["amount"] }}</td>
						<td>{{ $data["commitments_student"]["budget"] - $data["commitments_student"]["amount"] }}</td>
						<td>{{ number_format((($data["commitments_student"]["budget"] - $data["commitments_student"]["amount"])/$data["commitments_student"]["budget"])*100, 2) }}%</td>
					</tr>
					<tr>
						<th>Subtotal</th>
						<td></td>
						<td><b>{{ $data["international_events"]["budget"] + $data["support_for_outbound_students"]["budget"] + $data["publication"]["budget"] + $data["uniform"]["budget"] + $data["international_travel"]["budget"] + $data["representation"]["budget"] + $data["tokens"]["budget"] + $data["commitments_official"]["budget"] + $data["membership"]["budget"] + $data["internationalization_programs"]["budget"] + $data["orientation_programs"]["budget"] + $data["commitments_student"]["budget"] }}</b></td>
						<td><b>{{ $data["international_events"]["amount"] + $data["support_for_outbound_students"]["amount"] + $data["publication"]["amount"] + $data["uniform"]["amount"] + $data["international_travel"]["amount"] + $data["representation"]["amount"] + $data["tokens"]["amount"] + $data["commitments_official"]["amount"] + $data["membership"]["amount"] + $data["internationalization_programs"]["amount"] + $data["orientation_programs"]["amount"] + $data["commitments_student"]["amount"] }}</b></td>
						<td><b>{{ ($data["publication"]["budget"] + $data["uniform"]["budget"] + $data["international_travel"]["budget"] + $data["representation"]["budget"] + $data["tokens"]["budget"] + $data["commitments_official"]["budget"] + $data["membership"]["budget"] + $data["internationalization_programs"]["budget"] + $data["orientation_programs"]["budget"] + $data["commitments_student"]["budget"]) - ( $data["international_events"]["amount"] + $data["support_for_outbound_students"]["amount"] + $data["publication"]["amount"] + $data["uniform"]["amount"] + $data["international_travel"]["amount"] + $data["representation"]["amount"] + $data["tokens"]["amount"] + $data["commitments_official"]["amount"] + $data["membership"]["amount"] + $data["internationalization_programs"]["amount"] + $data["orientation_programs"]["amount"] + $data["commitments_student"]["amount"]) }}</b></td>
						<td><b>{{ number_format((( $data["international_events"]["budget"] + $data["support_for_outbound_students"]["budget"] + $data["publication"]["budget"] + $data["uniform"]["budget"] + $data["international_travel"]["budget"] + $data["representation"]["budget"] + $data["tokens"]["budget"] + $data["commitments_official"]["budget"] + $data["membership"]["budget"] + $data["internationalization_programs"]["budget"] + $data["orientation_programs"]["budget"] + $data["commitments_student"]["budget"]) - ( $data["international_events"]["amount"] + $data["support_for_outbound_students"]["amount"] + $data["publication"]["amount"] + $data["uniform"]["amount"] + $data["international_travel"]["amount"] + $data["representation"]["amount"] + $data["tokens"]["amount"] + $data["commitments_official"]["amount"] + $data["membership"]["amount"] + $data["internationalization_programs"]["amount"] + $data["orientation_programs"]["amount"] + $data["commitments_student"]["amount"]))/( $data["international_events"]["budget"] + $data["support_for_outbound_students"]["budget"] + $data["publication"]["budget"] + $data["uniform"]["budget"] + $data["international_travel"]["budget"] + $data["representation"]["budget"] + $data["tokens"]["budget"] + $data["commitments_official"]["budget"] + $data["membership"]["budget"] + $data["internationalization_programs"]["budget"] + $data["orientation_programs"]["budget"] + $data["commitments_student"]["budget"])*100, 2) }}%</b></td>
					</tr>
					<tr>
						<th>Total Operating Expenses</th>
						<td></td>
						<td><b>{{ $data["international_events"]["budget"] + $data["support_for_outbound_students"]["budget"] + $data["supplies"]["budget"] + $data["transportation"]["budget"] + $data["mailing"]["budget"] + $data["meeting_expenses"]["budget"] + $data["workshop"]["budget"] + $data["mimeo"]["budget"] + $data["telephone"]["budget"] + $data["repairs_and_maintenance"]["budget"] + $data["publication"]["budget"] + $data["uniform"]["budget"] + $data["international_travel"]["budget"] + $data["representation"]["budget"] + $data["tokens"]["budget"] + $data["commitments_official"]["budget"] + $data["membership"]["budget"] + $data["internationalization_programs"]["budget"] + $data["orientation_programs"]["budget"] + $data["commitments_student"]["budget"] }}</b></td>
						<td><b>{{ $data["international_events"]["amount"] + $data["support_for_outbound_students"]["amount"] + $data["supplies"]["amount"] + $data["transportation"]["amount"] + $data["mailing"]["amount"] + $data["meeting_expenses"]["amount"] + $data["workshop"]["amount"] + $data["mimeo"]["amount"] + $data["telephone"]["amount"] + $data["repairs_and_maintenance"]["amount"] + $data["publication"]["amount"] + $data["uniform"]["amount"] + $data["international_travel"]["amount"] + $data["representation"]["amount"] + $data["tokens"]["amount"] + $data["commitments_official"]["amount"] + $data["membership"]["amount"] + $data["internationalization_programs"]["amount"] + $data["orientation_programs"]["amount"] + $data["commitments_student"]["amount"] }}</b></td>
						<td><b>{{ ( $data["international_events"]["budget"] + $data["support_for_outbound_students"]["budget"] + $data["supplies"]["budget"] + $data["transportation"]["budget"] + $data["mailing"]["budget"] + $data["meeting_expenses"]["budget"] + $data["workshop"]["budget"] + $data["mimeo"]["budget"] + $data["telephone"]["budget"] + $data["repairs_and_maintenance"]["budget"] + $data["publication"]["budget"] + $data["uniform"]["budget"] + $data["international_travel"]["budget"] + $data["representation"]["budget"] + $data["tokens"]["budget"] + $data["commitments_official"]["budget"] + $data["membership"]["budget"] + $data["internationalization_programs"]["budget"] + $data["orientation_programs"]["budget"] + $data["commitments_student"]["budget"]) - ( $data["international_events"]["amount"] + $data["support_for_outbound_students"]["amount"] + $data["supplies"]["amount"] + $data["transportation"]["amount"] + $data["mailing"]["amount"] + $data["meeting_expenses"]["amount"] + $data["workshop"]["amount"] + $data["mimeo"]["amount"] + $data["telephone"]["amount"] + $data["repairs_and_maintenance"]["amount"] + $data["publication"]["amount"] + $data["uniform"]["amount"] + $data["international_travel"]["amount"] + $data["representation"]["amount"] + $data["tokens"]["amount"] + $data["commitments_official"]["amount"] + $data["membership"]["amount"] + $data["internationalization_programs"]["amount"] + $data["orientation_programs"]["amount"] + $data["commitments_student"]["amount"]) }}</b></td>
						<td><b>{{ number_format((( $data["international_events"]["budget"] + $data["support_for_outbound_students"]["budget"] + $data["supplies"]["budget"] + $data["transportation"]["budget"] + $data["mailing"]["budget"] + $data["meeting_expenses"]["budget"] + $data["workshop"]["budget"] + $data["mimeo"]["budget"] + $data["telephone"]["budget"] + $data["repairs_and_maintenance"]["budget"] + $data["publication"]["budget"] + $data["uniform"]["budget"] + $data["international_travel"]["budget"] + $data["representation"]["budget"] + $data["tokens"]["budget"] + $data["commitments_official"]["budget"] + $data["membership"]["budget"] + $data["internationalization_programs"]["budget"] + $data["orientation_programs"]["budget"] + $data["commitments_student"]["budget"]) - ( $data["international_events"]["amount"] + $data["support_for_outbound_students"]["amount"] + $data["supplies"]["amount"] + $data["transportation"]["amount"] + $data["mailing"]["amount"] + $data["meeting_expenses"]["amount"] + $data["workshop"]["amount"] + $data["mimeo"]["amount"] + $data["telephone"]["amount"] + $data["repairs_and_maintenance"]["amount"] + $data["publication"]["amount"] + $data["uniform"]["amount"] + $data["international_travel"]["amount"] + $data["representation"]["amount"] + $data["tokens"]["amount"] + $data["commitments_official"]["amount"] + $data["membership"]["amount"] + $data["internationalization_programs"]["amount"] + $data["orientation_programs"]["amount"] + $data["commitments_student"]["amount"]))/( $data["international_events"]["budget"] + $data["support_for_outbound_students"]["budget"] + $data["supplies"]["budget"] + $data["transportation"]["budget"] + $data["mailing"]["budget"] + $data["meeting_expenses"]["budget"] + $data["workshop"]["budget"] + $data["mimeo"]["budget"] + $data["telephone"]["budget"] + $data["repairs_and_maintenance"]["budget"] + $data["publication"]["budget"] + $data["uniform"]["budget"] + $data["international_travel"]["budget"] + $data["representation"]["budget"] + $data["tokens"]["budget"] + $data["commitments_official"]["budget"] + $data["membership"]["budget"] + $data["internationalization_programs"]["budget"] + $data["orientation_programs"]["budget"] + $data["commitments_student"]["budget"])*100, 2) }}%</b></td>
					</tr>
					<tr>
						<td id = "budget-variance-report-row-header">Activities/Projects - ABB</td>
						<td>831060</td>
						<td>{{ $data["activities"]["budget"] }}</td>
						<td>{{ $data["activities"]["amount"] }}</td>
						<td>{{ $data["activities"]["budget"] - $data["activities"]["amount"] }}</td>
						<td>{{ number_format((($data["activities"]["budget"] - $data["activities"]["amount"])/$data["activities"]["budget"])*100, 2) }}%</td>
					</tr>
					<!-- Insert List of Activities and their alloted budget (Detailed Report) -->
					<tr>
						<th>Subtotal</th>
						<td></td>
						<td>{{ $data["activities"]["budget"] }}</td>
						<td>{{ $data["activities"]["amount"] }}</td>
						<td>{{ $data["activities"]["budget"] - $data["activities"]["amount"] }}</td>
						<td>{{ number_format((($data["activities"]["budget"] - $data["activities"]["amount"])/$data["activities"]["budget"])*100, 2) }}%</td>
					</tr>
					<tr>
						<th>Grand Total: Operating Expenses and ABB</th>
						<td></td>
						<td><b>{{ $data["activities"]["budget"] + $data["international_events"]["budget"] + $data["support_for_outbound_students"]["budget"] + $data["supplies"]["budget"] + $data["transportation"]["budget"] + $data["mailing"]["budget"] + $data["meeting_expenses"]["budget"] + $data["workshop"]["budget"] + $data["mimeo"]["budget"] + $data["telephone"]["budget"] + $data["repairs_and_maintenance"]["budget"] + $data["publication"]["budget"] + $data["uniform"]["budget"] + $data["international_travel"]["budget"] + $data["representation"]["budget"] + $data["tokens"]["budget"] + $data["commitments_official"]["budget"] + $data["membership"]["budget"] + $data["internationalization_programs"]["budget"] + $data["orientation_programs"]["budget"] + $data["commitments_student"]["budget"] }}</b></td>
						<td><b>{{ $data["activities"]["amount"] + $data["international_events"]["amount"] + $data["support_for_outbound_students"]["amount"] + $data["supplies"]["amount"] + $data["transportation"]["amount"] + $data["mailing"]["amount"] + $data["meeting_expenses"]["amount"] + $data["workshop"]["amount"] + $data["mimeo"]["amount"] + $data["telephone"]["amount"] + $data["repairs_and_maintenance"]["amount"] + $data["publication"]["amount"] + $data["uniform"]["amount"] + $data["international_travel"]["amount"] + $data["representation"]["amount"] + $data["tokens"]["amount"] + $data["commitments_official"]["amount"] + $data["membership"]["amount"] + $data["internationalization_programs"]["amount"] + $data["orientation_programs"]["amount"] + $data["commitments_student"]["amount"] }}</b></td>
						<td><b>{{ ( $data["activities"]["budget"] + $data["international_events"]["budget"] + $data["support_for_outbound_students"]["budget"] + $data["supplies"]["budget"] + $data["transportation"]["budget"] + $data["mailing"]["budget"] + $data["meeting_expenses"]["budget"] + $data["workshop"]["budget"] + $data["mimeo"]["budget"] + $data["telephone"]["budget"] + $data["repairs_and_maintenance"]["budget"] + $data["publication"]["budget"] + $data["uniform"]["budget"] + $data["international_travel"]["budget"] + $data["representation"]["budget"] + $data["tokens"]["budget"] + $data["commitments_official"]["budget"] + $data["membership"]["budget"] + $data["internationalization_programs"]["budget"] + $data["orientation_programs"]["budget"] + $data["commitments_student"]["budget"]) - ( $data["activities"]["amount"] + $data["international_events"]["amount"] + $data["support_for_outbound_students"]["amount"] + $data["supplies"]["amount"] + $data["transportation"]["amount"] + $data["mailing"]["amount"] + $data["meeting_expenses"]["amount"] + $data["workshop"]["amount"] + $data["mimeo"]["amount"] + $data["telephone"]["amount"] + $data["repairs_and_maintenance"]["amount"] + $data["publication"]["amount"] + $data["uniform"]["amount"] + $data["international_travel"]["amount"] + $data["representation"]["amount"] + $data["tokens"]["amount"] + $data["commitments_official"]["amount"] + $data["membership"]["amount"] + $data["internationalization_programs"]["amount"] + $data["orientation_programs"]["amount"] + $data["commitments_student"]["amount"]) }}</b></td>
						<td><b>{{ number_format((( $data["activities"]["budget"] + $data["international_events"]["budget"] + $data["support_for_outbound_students"]["budget"] + $data["supplies"]["budget"] + $data["transportation"]["budget"] + $data["mailing"]["budget"] + $data["meeting_expenses"]["budget"] + $data["workshop"]["budget"] + $data["mimeo"]["budget"] + $data["telephone"]["budget"] + $data["repairs_and_maintenance"]["budget"] + $data["publication"]["budget"] + $data["uniform"]["budget"] + $data["international_travel"]["budget"] + $data["representation"]["budget"] + $data["tokens"]["budget"] + $data["commitments_official"]["budget"] + $data["membership"]["budget"] + $data["internationalization_programs"]["budget"] + $data["orientation_programs"]["budget"] + $data["commitments_student"]["budget"]) - ( $data["activities"]["amount"] + $data["international_events"]["amount"] + $data["support_for_outbound_students"]["amount"] + $data["supplies"]["amount"] + $data["transportation"]["amount"] + $data["mailing"]["amount"] + $data["meeting_expenses"]["amount"] + $data["workshop"]["amount"] + $data["mimeo"]["amount"] + $data["telephone"]["amount"] + $data["repairs_and_maintenance"]["amount"] + $data["publication"]["amount"] + $data["uniform"]["amount"] + $data["international_travel"]["amount"] + $data["representation"]["amount"] + $data["tokens"]["amount"] + $data["commitments_official"]["amount"] + $data["membership"]["amount"] + $data["internationalization_programs"]["amount"] + $data["orientation_programs"]["amount"] + $data["commitments_student"]["amount"]))/( $data["activities"]["budget"] + $data["international_events"]["budget"] + $data["support_for_outbound_students"]["budget"] + $data["supplies"]["budget"] + $data["transportation"]["budget"] + $data["mailing"]["budget"] + $data["meeting_expenses"]["budget"] + $data["workshop"]["budget"] + $data["mimeo"]["budget"] + $data["telephone"]["budget"] + $data["repairs_and_maintenance"]["budget"] + $data["publication"]["budget"] + $data["uniform"]["budget"] + $data["international_travel"]["budget"] + $data["representation"]["budget"] + $data["tokens"]["budget"] + $data["commitments_official"]["budget"] + $data["membership"]["budget"] + $data["internationalization_programs"]["budget"] + $data["orientation_programs"]["budget"] + $data["commitments_student"]["budget"])*100, 2) }}%</b></td>
					</tr>
					<!-- Insert CAPEX? -->
				</table>
			</div>
		</div>
	</body>
</html>