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

    	$categories = Transaction::orderBy('category', 'asc')->groupBy('category')->get();

    	$budget = ProposedBudget::where('academic_year', $request->academic_year)->first();

    	$transactions = Transaction::where('term', $request->term)->where('budget_id', $budget->id)->get();

    	//actual
    	$num = 0;
    	foreach($transactions as $t){
    		if($t->category == "supplies")
    			$num += $t->amount;
    	}
    	$actual = collect(["supplies" => collect(["category" => "supplies", "amount" => $num])]);

    	//budget
    	//budget - actual
    	//budget - actual / budget

    	return view('budgetVarianceReport', ['transac' => $transactions, 'actual' => $actual]);
    }
}
