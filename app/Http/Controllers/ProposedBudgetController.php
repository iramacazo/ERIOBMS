<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProposedBudget;
use Illuminate\Support\Facades\Auth;

class ProposedBudgetController extends Controller
{
    //returns the view of the form 
    public function proposeForm(){
    	return view('proposeBudget');
    }

    public function proposeBudget(Request $request){
    	$this->validate($request, [
    		'academicyear' => 'required',
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
    		]);

    	$proposed = new ProposedBudget;
    	$proposed->academic_year = $request->academicyear;
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
    	$proposed->save();

    	return redirect()->route('home');
    }
}
