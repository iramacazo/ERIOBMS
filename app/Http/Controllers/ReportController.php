<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\ProposedBudget;
use DB;

class ReportController extends Controller
{

	public function getAllTerms(){
		$data = ProposedBudget::orderBy('academic_year', 'asc')->groupBy('academic_year')->get();

		return view('enterBudgetVariance', ['acad' => $data]);
	}

    public function generateBudgetVariance(Request $request){
    	$this->validate($request, [
    		'academic_year' => 'required',
    		'term' => 'required'
    	]);

    	$budget = ProposedBudget::where('academic_year', $request->academic_year)->first();

    	$transactions = Transaction::where('term', $request->term)->where('budget_id', $budget->id)->get();

    	$supplies = 0;
    	$transpo = 0;
    	$mailing = 0;
    	$meeting_expenses = 0;
    	$workshop = 0;
    	$mimeo = 0;
    	$telephone = 0;
    	$repairs = 0;
    	$publication = 0;
    	$uniform = 0;
    	$international_travel = 0;
    	$representation = 0;
    	$tokens = 0;
    	$commitments_official = 0;
    	$membership = 0;
    	$internationalization_programs = 0;
    	$activities = 0;
    	$capex = 0;
    	$orientation_programs = 0;
    	$commitments_student = 0;


    	foreach($transactions as $t){
    		if($t->category == "supplies")
    			$supplies += $t->amount;
    		else if($t->category == "transportation")
    			$transpo += $t->amount;
    		else if($t->category == "mailing")
    			$mailing += $t->amount;
    		else if($t->category == "meeting_expenses")
    			$meeting_expenses += $t->amount;
    		else if($t->category == "workshop")
    			$workshop += $t->amount;
    		else if($t->category == "mimeo")
    			$mimeo += $t->amount;
    		else if($t->category == "telephone")
    			$telephone += $t->amount;
    		else if($t->category == "repairs_and_maintenance")
    			$repairs += $t->amount;
    		else if($t->category == "publication")
    			$publication += $t->amount;
    		else if($t->category == "uniform")
    			$uniform += $t->amount;
    		else if($t->category == "international_travel")
    			$international_travel += $t->amount;
    		else if($t->category == "representation")
    			$representation += $t->amount;
    		else if($t->category == "tokens")
    			$tokens += $t->amount;
    		else if($t->category == "commitments_official")
    			$commitments_official += $t->amount;
    		else if($t->category == "membership")
    			$membership += $t->amount;
    		else if($t->category == "internationalization_programs")
    			$internationalization_programs += $t->amount;
    		else if($t->category == "activities")
    			$activities += $t->amount;
    		else if($t->category == "capex")
    			$capex += $t->amount;
    		else if($t->category == "orientation_programs")
    			$orientation_programs += $t->amount;
    		else if($t->category == "commitments_student")
    			$commitments_student += $t->amount;
    	}

    	$data = collect([
    		"supplies" => collect([
    			"budget" => $budget->supplies, 
    			"amount" => $supplies,
    		]),
    		"transportation" => collect([
    			"budget" => $budget->transportation,
    			"amount" => $transpo
    		]),
    		"mailing" => collect([
    			"budget" => $budget->mailing,
    			"amount" => $mailing
    		]),
    		"meeting_expenses" => collect([
    			"budget" => $budget->meeting_expenses,
    			"amount" => $meeting_expenses
    		]),
    		"workshop" => collect([
    			"budget" => $budget->workshop,
    			"amount" => $workshop
    		]),
    		"mimeo" => collect([
    			"budget" => $budget->mimeo,
    			"amount" => $mimeo
    		]),
    		"telephone" => collect([
    			"budget" => $budget->telephone,
    			"amount" => $telephone
    		]),
    		"repairs_and_maintenance" => collect([
    			"budget" => $budget->repairs_and_maintenance,
    			"amount" => $repairs
    		]),
    		"publication" => collect([
    			"budget" => $budget->publication,
    			"amount" => $publication
    		]), 
    		"uniform" => collect([
    			"budget" => $budget->uniform,
    			"amount" => $uniform
    		]),
    		"international_travel" => collect([
    			"budget" => $budget->international_travel,
    			"amount" => $international_travel
    		]),
    		"representation" => collect([
    			"budget" => $budget->representation,
    			"amount" => $representation
    		]),
    		"tokens" => collect([
    			"budget" => $budget->tokens,
    			"amount" => $tokens
    		]),
    		"commitments_official" => collect([
    			"budget" => $budget->commitments_official,
    			"amount" => $commitments_official
    		]),
    		"membership" => collect([
    			"budget" => $budget->membership,
    			"amount" => $membership
    		]),
    		"internationalization_programs" => collect([
    			"budget" => $budget->internationalization_programs,
    			"amount" => $internationalization_programs
    		]),
    		"activities" => collect([
    			"budget" => $budget->activities,
    			"amount" => $activities
    		]),
    		"capex" => collect([
    			"budget" => $budget->capex,
    			"amount" => $capex
    		]),
    		"orientation_programs" => collect([
    			"budget" => $budget->orientation_programs,
    			"amount" => $orientation_programs
    		]),
    		"commitments_student" => collect([
    			"budget" => $budget->commitments_student,
                "amount" => $commitments_student
    		])
    	]);

    	return view('budgetVarianceReport', ['data' => $data]);
    }

    //todo finish this
    public function viewAllTransactions(){ //all transactions from the beginning of time grouped by category
        $supplies = Transaction::where('category', 'supplies')
            ->orderBy('transaction_date', 'DESC')
            ->get();

        $transportation = Transaction::where('category', 'transportation')
            ->orderBy('transaction_date', 'DESC')
            ->get();

        $mailing = Transaction::where('category', 'mailing')
            ->orderBy('transaction_date', 'DESC')
            ->get();

        $meetings = Transaction::where('category', 'meeting_expenses')
            ->orderBy('transaction_date', 'DESC')
            ->get();

        $workshop = Transaction::where('category', 'workshop')
            ->orderBy('transaction_date', 'DESC')
            ->get();

        $mimeo = Transaction::where('category', 'mimeo')
            ->orderBy('transaction_date', 'DESC')
            ->get();

        $telephone = Transaction::where('category', 'telephone')
            ->orderBy('transaction_date', 'DESC')
            ->get();

        $repairs = Transaction::where('category', 'repairs_and_maintenance')
            ->orderBy('transaction_date', 'DESC')
            ->get();

        $publication = Transaction::where('category', 'publication')
            ->orderBy('transaction_date', 'DESC')
            ->get();

        $uniform = Transaction::where('category', 'uniform')
            ->orderBy('transaction_date', 'DESC')
            ->get();

        $travel = Transaction::where('category', 'international_travel')
            ->orderBy('transaction_date', 'DESC')
            ->get();

        $representation = Transaction::where('category', 'representation')
            ->orderBy('transaction_date', 'DESC')
            ->get();

        $tokens = Transaction::where('category', 'tokens')
            ->orderBy('transaction_date', 'DESC')
            ->get();

        $offcommitments = Transaction::where('category', 'commitments_official')
            ->orderBy('transaction_date', 'DESC')
            ->get();

        $studentcommitments = Transaction::where('category', 'commitments_student')
            ->orderBy('transaction_date', 'DESC')
            ->get();

        $membership = Transaction::where('category', 'membership')
            ->orderBy('transaction_date', 'DESC')
            ->get();

        $internprograms = Transaction::where('category', 'internationalization_programs')
            ->orderBy('transaction_date', 'DESC')
            ->get();

        $activities = Transaction::where('category', 'activities')
            ->orderBy('transaction_date', 'DESC')
            ->get();

        $capex = Transaction::where('category', 'capex')
            ->orderBy('transaction_date', 'DESC')
            ->get();

        $orientprograms = Transaction::where('category', 'orientation_programs')
            ->orderBy('transaction_date', 'DESC')
            ->get();

        return view("reports/view_all_transactions", [
            'supplies' => $supplies, 'transportation' => $transportation,
            'mailing' => $mailing, 'meeting_expenses' => $meetings,
            'workshop' => $workshop, 'mimeo' => $mimeo,
            'telephone' => $telephone, 'repairs_and_maintenance' => $repairs,
            'publication' => $publication, 'uniform' => $uniform,
            'international_travel' => $travel, 'representation' => $representation,
            'tokens' => $tokens, 'commitments_official' => $offcommitments,
            'commitments_student' => $studentcommitments, 'membership' => $membership,
            'internationalization_programs' => $internprograms, 'activities' => $activities,
            'capex' => $capex, 'orientation_programs' => $orientprograms
        ]);
    }

    public function viewTransactionsRange(Request $request){
        //todo running balance ng budget
        $transactions = Transaction::where([
            ['transaction_date', '>=', $request->mindate],
            ['transaction_date', '<=', $request->maxdate],
        ])->orderBy('transaction_date', 'DESC')->get();

        return view("reports/view_transactions_range", [
            'transactions' => $transactions,
            'from' => $request->mindate,
            'to' => $request->maxdate
        ]);
    }

    public function inputDateRange(){
        return view("reports/input_date_range");
    }
}
