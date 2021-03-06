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

	<link rel="stylesheet" href="{{asset('css/propose_budget.css')}}">
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

<!-- BODY -->
<div class="container" id="main-body">
	<div class="row">
		<span class="col-md-1"></span>
		<div class="col-md-10" id="budget_form">
            <h1>Confirm Proposed Annual Budget</h1>
			<form action="{{ route('approve_budget') }}" method='POST' class="form">
                <!-- Academic Year -->
                <div class="row">
                    <div class="col-md-6" id="ay">
                        <h4><i>Academic Year: {{$pending->academic_year}} - {{$pending->academic_year + 1}}</i></h4>
                        @if(\App\ProposedBudget::all()->count() != 0)
                            <small style="color: #b4a54f"><i>Warning: The amount for each category should be 
                            	equal to that of what the Approved Budget the Accounting Office provided </i></small>
                        @endif
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6 costs">
                        <h2>Operating Expenses</h2>

                        <!-- Supplies Input -->
                        <div class="form-group{{ $errors->has('supplies') ? ' has-danger' : '' }}">
                            <label for="supplies">Supplies and Stationary</label>
                            @if(old('supplies') != null)
                            <input class="form-control number text-right" name="supplies" value="{{old('supplies')}}"
                                   required>
                            @else
                            <input class="form-control number text-right" name="supplies" value="{{ $pending->supplies }}"
                                   required>
                            @endif
                            @if ($errors->has('supplies'))
                                <div class="form-control-feedback">{{ $errors->first('supplies') }}</div>
                            @endif
                        </div>

                        {{--Transportation Input--}}
                        <div class="form-group{{ $errors->has('transportation') ? ' has-danger' : '' }}">
                            <label for="transportation">Transportation</label>
                            @if(old('transporation') != null)
                            <input class="form-control number text-right" name="transportation"
                                   value="{{old('transportation')}}" required>
                            @else
                            	<input class="form-control number text-right" name="transportation" value="{{ $pending->transportation }}" required>
                            @endif
                            @if ($errors->has('transportation'))
                                <div class="form-control-feedback">{{ $errors->first('transportation') }}</div>
                            @endif
                        </div>

                        {{-- Mailing Input --}}
                        <div class="form-group{{ $errors->has('mailing') ? ' has-danger' : '' }}">
                            <label for="mailing">Mailing</label>
                            @if(old('mailing') != null)
                            <input class="form-control number text-right" name="mailing" value="{{old('mailing')}}"
                                   required>
                            @else
                            <input class="form-control number text-right" name="mailing" value="{{ $pending->mailing }}"
                                   required>
                            @endif
                            @if ($errors->has('mailiag'))
                                <div class="form-control-feedback">{{ $errors->first('mailing') }}</div>
                            @endif
                        </div>

                        {{-- Annual Workshop / Teambuilding Input--}}
                        <div class="form-group{{ $errors->has('workshop') ? ' has-danger' : '' }}">
                            <label for="workshop">Annual Workshop/Teambuilding</label>
                            @if(old('workshop') != null)
                            <input class="form-control number text-right" name="workshop" value="{{old('workshop')}}"
                                   required>
                            @else
                            <input class="form-control number text-right" name="workshop" value="{{ $pending->workshop }}"
                                   required>
                            @endif
                            @if ($errors->has('workshop'))
                                <div class="form-control-feedback">{{ $errors->first('workshop') }}</div>
                            @endif
                        </div>

                        {{-- Mimeo and Reproduction --}}
                        <div class="form-group{{ $errors->has('mimeo') ? ' has-danger' : '' }}">
                            <label for="mimeo">Mimeo</label>
                            @if(old('mimeo') != null)
                            <input class="form-control number text-right" name="mimeo" value="{{old('mimeo')}}"
                                   required>
                            @else
                            <input class="form-control number text-right" name="mimeo" value="{{ $pending->mimeo }}"
                                   required>
                            @endif
                            @if ($errors->has('mimeo'))
                                <div class="form-control-feedback">{{ $errors->first('mimeo') }}</div>
                            @endif
                        </div>

                        {{-- Telephone --}}
                        <div class="form-group{{ $errors->has('telephone') ? ' has-danger' : '' }}">
                            <label for="telephone">Telephone</label>
                            @if(old('telephone') != null)
                            <input class="form-control number text-right" name="telephone" value="{{old('telephone')}}"
                                   required>
                            @else
                            <input class="form-control number text-right" name="telephone" value="{{ $pending->telephone }}"
                                   required>
                            @endif
                            @if ($errors->has('telephone'))
                                <div class="form-control-feedback">{{ $errors->first('telephone') }}</div>
                            @endif
                        </div>

                        {{-- Repairs and Maintenance --}}
                        <div class="form-group{{ $errors->has('repairs_and_maintenance') ? ' has-danger' : '' }}">
                            <label for="repairs_and_maintenance">Repairs and Maintenance</label>
                            @if(old('repairs_and_maintenance') != null)
                            <input class="form-control number text-right" name="repairs_and_maintenance" value="{{old('repairs_and_maintenance')}}"
                                   required>
                            @else
                            <input class="form-control number text-right" name="repairs_and_maintenance" value="{{ $pending->repairs_and_maintenance }}"
                                   required>
                            @endif
                            @if ($errors->has('repairs_and_maintenance'))
                                <div class="form-control-feedback">{{ $errors->first('repairs_and_maintenance') }}</div>
                            @endif
                        </div>

                        {{--  Meeting Expenses  --}}
                        <div class="form-group{{ $errors->has('meeting_expenses') ? ' has-danger' : '' }}">
                            <label for="meeting_expenses">Meeting Expenses</label>
                            @if(old('meeting_expenses') != null)
                            <input class="form-control number text-right" name="meeting_expenses" value="{{old('meeting_expenses')}}"
                                   required>
                            @else
                            <input class="form-control number text-right" name="meeting_expenses" value="{{ $pending->meeting_expenses }}"
                                   required>
                            @endif
                            @if ($errors->has('meeting_expenses'))
                                <div class="form-control-feedback">{{ $errors->first('meeting_expenses') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6 costs">
                        <h2>Other Expenses</h2>

                        {{-- Publication --}}
                        <div class="form-group{{ $errors->has('publication') ? ' has-danger' : '' }}">
                            <label for="publication">Publication</label>
                            @if(old('publication') != null)
                            <input class="form-control number text-right" name="publication" value="{{old('publication')}}"
                                   required>
                            @else
                            <input class="form-control number text-right" name="publication" value="{{ $pending->publication }}"
                                   required>
                            @endif
                            @if ($errors->has('publication'))
                                <div class="form-control-feedback">{{ $errors->first('publication') }}</div>
                            @endif
                        </div>

                        {{-- Uniform --}}
                        <div class="form-group{{ $errors->has('uniform') ? ' has-danger' : '' }}">
                            <label for="uniform">Uniform</label>
                            @if(old('uniform') != null)
                            <input class="form-control number text-right" name="uniform" value="{{old('uniform')}}"
                                   required>
                            @else
                            <input class="form-control number text-right" name="uniform" value="{{ $pending->uniform }}"
                                   required>
                            @endif
                            @if ($errors->has('uniform'))
                                <div class="form-control-feedback">{{ $errors->first('uniform') }}</div>
                            @endif
                        </div>

                        {{-- International Travel --}}
                        <div class="form-group{{ $errors->has('international_travel') ? ' has-danger' : '' }}">
                            <label for="international_travel">International Travel</label>
                            @if(old('international_travel') != null)
                            <input class="form-control number text-right" name="international_travel" value="{{old('international_travel')}}"
                                   required>
                            @else
                            <input class="form-control number text-right" name="international_travel" value="{{ $pending->international_travel }}"
                                   required>
                            @endif
                            @if ($errors->has('international_travel'))
                                <div class="form-control-feedback">{{ $errors->first('international_travel') }}</div>
                            @endif
                        </div>

                        {{-- Representation --}}
                        <div class="form-group{{ $errors->has('representation') ? ' has-danger' : '' }}">
                            <label for="representation">Representation</label>
                            @if(old('representation') != null)
                            <input class="form-control number text-right" name="representation" value="{{old('representation')}}"
                                   required>
                            @else
                            <input class="form-control number text-right" name="representation" value="{{ $pending->representation }}"
                                   required>
                            @endif
                            @if ($errors->has('representation'))
                                <div class="form-control-feedback">{{ $errors->first('representation') }}</div>
                            @endif
                        </div>

                        {{-- Institutional Tokens --}}
                        <div class="form-group{{ $errors->has('tokens') ? ' has-danger' : '' }}">
                            <label for="tokens">Institutional Tokens</label>
                            @if(old('tokens') != null)
                            <input class="form-control number text-right" name="tokens" value="{{old('tokens')}}"
                                   required>
                            @else
                            <input class="form-control number text-right" name="tokens" value="{{ $pending->tokens }}"
                                   required>
                            @endif
                            @if ($errors->has('tokens'))
                                <div class="form-control-feedback">{{ $errors->first('tokens') }}</div>
                            @endif
                        </div>

                        {{-- Commitments Official --}}
                        <div class="form-group{{ $errors->has('commitments_official') ? ' has-danger' : '' }}">
                            <label for="commitments_official">Commitments Official</label>
                            @if(old('commitments_official') != null)
                            <input class="form-control number text-right" name="commitments_official" value="{{old('commitments_official')}}"
                                   required>
                            @else
                            <input class="form-control number text-right" name="commitments_official" value="{{ $pending->commitments_official }}"
                                   required>
                            @endif
                            @if ($errors->has('commitments_official'))
                                <div class="form-control-feedback">{{ $errors->first('commitments_official') }}</div>
                            @endif
                        </div>

                        {{-- International and Local Membership and Hostings--}}
                        <div class="form-group{{ $errors->has('membership') ? ' has-danger' : '' }}">
                            <label for="membership">International and Local Membership and Hostings</label>
                            @if(old('membership') != null)
                            <input class="form-control number text-right" name="membership" value="{{old('membership')}}"
                                   required>
                            @else
                            <input class="form-control number text-right" name="membership" value="{{ $pending->membership }}"
                                   required>
                            @endif
                            @if ($errors->has('membership'))
                                <div class="form-control-feedback">{{ $errors->first('membership') }}</div>
                            @endif
                        </div>

                        {{-- Internationalization Programs --}}
                        <div class="form-group{{ $errors->has('internationalization_programs') ? ' has-danger' : '' }}">
                            <label for="internationalization_programs">Internationalization Programs</label>
                            @if(old('internationalization_programs') != null)
                            <input class="form-control number text-right" name="internationalization_programs" value="{{old('internationalization_programs')}}"
                                   required>
                            @else
                            <input class="form-control number text-right" name="internationalization_programs" value="{{ $pending->internationalization_programs }}"
                                   required>
                            @endif
                            @if ($errors->has('internationalization_programs'))
                                <div class="form-control-feedback">{{ $errors->first('internationalization_programs') }}</div>
                            @endif
                        </div>

                        {{-- Support for Outbound Students --}}
                        <div class="form-group{{ $errors->has('support_for_outbound_students') ? ' has-danger' : '' }}">
                            <label for="support_for_outbound_students">Support for Outbound Students</label>
                            @if(old('support_for_outbound_students') != null)
                            <input class="form-control number text-right" name="support_for_outbound_students" value="{{old('support_for_outbound_students')}}"
                                   required>
                            @else
                            <input class="form-control number text-right" name="support_for_outbound_students" value="{{ $pending->support_for_outbound_students }}"
                                   required>
                            @endif
                            @if ($errors->has('support_for_outbound_students'))
                                <div class="form-control-feedback">{{ $errors->first('support_for_outbound_students') }}</div>
                            @endif
                        </div>

                        {{-- International Events --}}
                        <div class="form-group{{ $errors->has('international_events') ? ' has-danger' : '' }}">
                            <label for="international_events">International Events</label>
                            @if(old('international_events') != null)
                            <input class="form-control number text-right" name="international_events" value="{{old('international_events')}}"
                                   required>
                            @else
                            <input class="form-control number text-right" name="international_events" value="{{ $pending->international_events }}"
                                   required>
                            @endif
                            @if ($errors->has('international_events'))
                                <div class="form-control-feedback">{{ $errors->first('international_events') }}</div>
                            @endif
                        </div>

                        {{-- Orientation Programs --}}
                        <div class="form-group{{ $errors->has('orientation_programs') ? ' has-danger' : '' }}">
                            <label for="orientation_programs">Orientation Programs</label>
                            @if(old('orientation_programs') != null)
                            <input class="form-control number text-right" name="orientation_programs" value="{{old('orientation_programs')}}"
                                   required>
                            @else
                            <input class="form-control number text-right" name="orientation_programs" value="{{ $pending->orientation_programs }}"
                                   required>
                            @endif
                            @if ($errors->has('orientation_programs'))
                                <div class="form-control-feedback">{{ $errors->first('orientation_programs') }}</div>
                            @endif
                        </div>

                        {{-- Commitments Students --}}
                        <div class="form-group{{ $errors->has('commitments_student') ? ' has-danger' : '' }}">
                            <label for="commitments_student">Commitments Students</label>
                            @if(old('commitments_student') != null)
                            <input class="form-control number text-right" name="commitments_student" value="{{old('commitments_student')}}"
                                   required>
                            @else
                            <input class="form-control number text-right" name="commitments_student" value="{{ $pending->commitments_student }}"
                                   required>
                            @endif
                            @if ($errors->has('commitments_student'))
                                <div class="form-control-feedback">{{ $errors->first('commitments_student') }}</div>
                            @endif
                        </div>

                        {{-- Activities/Projects - ABB --}}
                        <div class="form-group{{ $errors->has('activities') ? ' has-danger' : '' }}">
                            <label for="activities">Activities/Projects - ABB</label>
                            @if(old('activities') != null)
                            <input class="form-control number text-right" name="activities" value="{{old('activities')}}"
                                   required>
                            @else
                            <input class="form-control number text-right" name="activities" value="{{ $pending->activities }}"
                                   required>
                            @endif
                            @if ($errors->has('activities'))
                                <div class="form-control-feedback">{{ $errors->first('activities') }}</div>
                            @endif
                        </div>

                        {{-- CAPEX --}}
                        <div class="form-group{{ $errors->has('capex') ? ' has-danger' : '' }}">
                            <label for="capex">CAPEX</label>
                            @if(old('capex') != null)
                            <input class="form-control number text-right" name="capex" value="{{old('capex')}}"
                                   required>
                            @else
                            <input class="form-control number text-right" name="capex" value="{{ $pending->capex }}"
                                   required>
                            @endif
                            @if ($errors->has('capex'))
                                <div class="form-control-feedback">{{ $errors->first('capex') }}</div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Confirm</button>
                    </div>
                </div>
				    {{ csrf_field() }}
			</form>
		</div>
	</div>
</div>
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
</body>
</html>
