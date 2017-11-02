@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <br>
                    <a href="{{ url('/propose_budget') }}"> Propose Budget </a> <!-- revise niyo nalang UI temp lang to-->
                        <br>
                    <a href="{{ url('/add_transaction') }}"> Add Transaction </a> <!-- same -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
