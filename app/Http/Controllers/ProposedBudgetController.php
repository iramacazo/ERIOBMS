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

        if(ProposedBudget::all()->count() == 0)
            $year = Carbon::now()->year + 0;
        else{
            $year = ProposedBudget::all()->sortByDesc('academic_year')->first()
                    ->academic_year + 1;
        }
    	return view('proposeBudget', ['year' => $year]);
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
    	$proposed->save();
    	
    	return redirect(route('home'));
    }
}
