<?php

namespace App\Http\Controllers;

use App\ProposedBudget;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;

class ProposedBudgetController extends Controller
{
    //returns the view of the form 
    public function proposeForm(){
        if(Auth::user() == null) {
            return redirect('/login');
        }

        if(ProposedBudget::all()->count() == 0){
            $year = Carbon::now()->year + 0;
            return view('proposeBudget', ['year' => $year, 'latest' => null]);
        }
        else{
            $year = ProposedBudget::all()->sortByDesc('academic_year')->first()
                    ->academic_year + 1;
            $latest = ProposedBudget::latest()->first(); //previous year's proposed budget
            return view('proposeBudget', ['year' => $year, 'latest' => $latest]);
        }

    }



    public function proposeBudget(Request $request){
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(),[
            'supplies' => 'required',
            'transportation' => 'required',
            'mailing' => 'required',
            'meeting_expenses' => 'required',
            'workshop' => 'required',
            'mimeo' => 'required',
            'telephone' => 'required',
            'repairs_and_maintenance' => 'required',
            'publication' => 'required',
            'uniform' => 'required',
            'international_travel' => 'required',
            'representation' => 'required',
            'tokens' => 'required',
            'commitments_official' => 'required',
            'membership' => 'required',
            'internationalization_programs' => 'required',
            'orientation_programs' => 'required',
            'commitments_student' => 'required',
            'activities' => 'required',
            'capex' => 'required',
            'international_events' => 'required',
            'support_for_outbound_students' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('/propose_budget')
                ->withErrors($validator)
                ->withInput();
        }

    	$proposed = new ProposedBudget();
        if(ProposedBudget::all()->count() == 0)
            $proposed->academic_year = Carbon::now()->year + 0;
        else{
            $proposed->academic_year = ProposedBudget::all()->sortByDesc('academic_year')->first()
                                            ->academic_year + 1;
        }

    	$proposed->supplies = $request->supplies;
    	$proposed->transportation = $request->transportation;
    	$proposed->mailing = $request->mailing;
    	$proposed->meeting_expenses = $request->meeting_expenses;
    	$proposed->workshop = $request->workshop;
    	$proposed->mimeo = $request->mimeo;
    	$proposed->telephone = $request->telephone;
    	$proposed->repairs_and_maintenance = $request->repairs_and_maintenance;
    	$proposed->publication = $request->publication;
    	$proposed->uniform = $request->uniform;
    	$proposed->international_travel = $request->international_travel;
    	$proposed->representation = $request->representation;
    	$proposed->tokens = $request->tokens;
    	$proposed->commitments_official = $request->commitments_official;
    	$proposed->membership = $request->membership;
    	$proposed->internationalization_programs = $request->internationalization_programs;
    	$proposed->orientation_programs = $request->orientation_programs;
    	$proposed->commitments_student = $request->commitments_student;
    	$proposed->activities = $request->activities;
    	$proposed->capex = $request->capex;
    	$proposed->proposing_user = Auth::user()->username;
        $proposed->international_events = $request->international_events;
        $proposed->support_for_outbound_students = $request->support_for_outbound_students;
    	$proposed->save();
    	
    	return redirect(route('home'));
    }

    public function confirmBudgetView(){
        $pending = ProposedBudget::latest()->first();

        return view('confirmBudget', ["pending" => $pending]);
    }

    public function approveBudget(Request $request){
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(),[
            'supplies' => 'required',
            'transportation' => 'required',
            'mailing' => 'required',
            'meeting_expenses' => 'required',
            'workshop' => 'required',
            'mimeo' => 'required',
            'telephone' => 'required',
            'repairs_and_maintenance' => 'required',
            'publication' => 'required',
            'uniform' => 'required',
            'international_travel' => 'required',
            'representation' => 'required',
            'tokens' => 'required',
            'commitments_official' => 'required',
            'membership' => 'required',
            'internationalization_programs' => 'required',
            'orientation_programs' => 'required',
            'commitments_student' => 'required',
            'activities' => 'required',
            'capex' => 'required',
            'international_events' => 'required',
            'support_for_outbound_students' => 'required'
        ]);


        if ($validator->fails()) {
            return redirect('/confirm_budget')
                ->withErrors($validator)
                ->withInput();
        }

        $approved = ProposedBudget::latest()->first();
        $approved->approval_status = true;
        $approved->supplies = $request->supplies;
        $approved->transportation = $request->transportation;
        $approved->mailing = $request->mailing;
        $approved->meeting_expenses = $request->meeting_expenses;
        $approved->workshop = $request->workshop;
        $approved->mimeo = $request->mimeo;
        $approved->telephone = $request->telephone;
        $approved->repairs_and_maintenance = $request->repairs_and_maintenance;
        $approved->publication = $request->publication;
        $approved->uniform = $request->uniform;
        $approved->international_travel = $request->international_travel;
        $approved->representation = $request->representation;
        $approved->tokens = $request->tokens;
        $approved->commitments_official = $request->commitments_official;
        $approved->membership = $request->membership;
        $approved->internationalization_programs = $request->internationalization_programs;
        $approved->orientation_programs = $request->orientation_programs;
        $approved->commitments_student = $request->commitments_student;
        $approved->activities = $request->activities;
        $approved->capex = $request->capex;
        $approved->proposing_user = Auth::user()->username;
        $approved->international_events = $request->international_events;
        $approved->support_for_outbound_students = $request->support_for_outbound_students;
        $approved->save();

        return redirect(route('home'));
    }
}
