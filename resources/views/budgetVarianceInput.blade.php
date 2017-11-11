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

		<div class="row" id="main-body">
			<span class="col-md-4"></span>
			<div class="col-md-4 text-center" style="background: white; border-radius: 5px; padding: 20px;">
				<!-- Note: Pwede to gawing modal (tempo view).. pangenter lang ng term -->
				<h3>Choose an academic year and a term to generate a variance report</h3>
				<br>
				<form class="form" action="{{ route('budget_variance_result') }}" method="POST"
					style="padding: 0 150px 10px 150px">
					<div class="form-group-row">
						@if($acad != null)
							<label>Academic Year</label>
							<select class="form-control" name="academic_year">
								@foreach($acad as $a)
									<option value="{{ $a->academic_year }}">{{ $a->academic_year }} - {{ $a->academic_year + 1}}</option>
								@endforeach
							</select>
						@endif
						<br>
							<label>Term</label>
							<select class="form-control" name="term">
								<option value="1">1st Term</option>
								<option value="2">2nd Term</option>
								<option value="3">3rd Term</option>
							</select>
						{{ csrf_field() }}

					</div>
					<button class="btn btn-primary" type="submit" style="margin-top: 15px">Submit</button>
				</form>
			</div>
			<span class="col-md-4"></span>
		</div>

	</body>
</html>