<html>
	<head>
		<title>
			Budget Variance Report Form
		</title>
	</head>
	<body>
		<!-- Note: Pwede to gawing modal (tempo view).. pangenter lang ng term -->
		<form action="{{ route('budget_variance_result') }}" method="POST">
			@if($acad != null)
				<select name="academic_year">
					@foreach($acad as $a)
					<option value="{{ $a->academic_year }}">{{ $a->academic_year }} - {{ $a->academic_year + 1}}</option>
					@endforeach
				</select>
			@endif
			<select name="term">
				<option value="1">1st Term</option>
				<option value="2">2nd Term</option>
				<option value="3">3rd Term</option>
			</select>
			{{ csrf_field() }}
			<input type="submit" name="Submit" value="Submit">
		</form>
	</body>
</html>