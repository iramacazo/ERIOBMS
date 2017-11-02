<?php

namespace App\Http\Controllers;

use App\ProposedBudget;
use App\Transaction;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(ProposedBudget::all()->count() == 0)
            return view('home', ['budgetdata' => null]);
        else{
            $term1amount = 0; $term2amount = 0; $term3amount = 0;
            $categorybudget = collect([
               'activities' => collect([
                   'term1' => 0,
                   'term2' => 0,
                   'term3' => 0
               ]) ,
               'workshop' => collect([
                   'term1' => 0,
                   'term2' => 0,
                   'term3' => 0
               ]) ,
               'capex' => collect([
                   'term1' => 0,
                   'term2' => 0,
                   'term3' => 0
               ]) ,
               'commitments_official' => collect([
                   'term1' => 0,
                   'term2' => 0,
                   'term3' => 0
               ]) ,
               'commitments_student' => collect([
                   'term1' => 0,
                   'term2' => 0,
                   'term3' => 0
               ]) ,
               'membership' => collect([
                   'term1' => 0,
                   'term2' => 0,
                   'term3' => 0
               ]) ,
               'tokens' => collect([
                   'term1' => 0,
                   'term2' => 0,
                   'term3' => 0
               ]) ,
               'international_travel' => collect([
                   'term1' => 0,
                   'term2' => 0,
                   'term3' => 0
               ]) ,
               'internationalization_programs' => collect([
                   'term1' => 0,
                   'term2' => 0,
                   'term3' => 0
               ]) ,
               'mailing' => collect([
                   'term1' => 0,
                   'term2' => 0,
                   'term3' => 0
               ]) ,
               'meeting_expenses' => collect([
                   'term1' => 0,
                   'term2' => 0,
                   'term3' => 0
               ]) ,
               'mimeo' => collect([
                   'term1' => 0,
                   'term2' => 0,
                   'term3' => 0
               ]) ,
               'orientation_programs' => collect([
                   'term1' => 0,
                   'term2' => 0,
                   'term3' => 0
               ]) ,
               'publication' => collect([
                   'term1' => 0,
                   'term2' => 0,
                   'term3' => 0
               ]) ,
               'repairs_and_maintenance' => collect([
                   'term1' => 0,
                   'term2' => 0,
                   'term3' => 0
               ]) ,
               'representation' => collect([
                   'term1' => 0,
                   'term2' => 0,
                   'term3' => 0
               ]) ,
               'supplies' => collect([
                   'term1' => 0,
                   'term2' => 0,
                   'term3' => 0
               ]) ,
               'telephone' => collect([
                   'term1' => 0,
                   'term2' => 0,
                   'term3' => 0
               ]) ,
               'transportation' => collect([
                   'term1' => 0,
                   'term2' => 0,
                   'term3' => 0
               ]) ,
               'uniform' => collect([
                   'term1' => 0,
                   'term2' => 0,
                   'term3' => 0
               ]) ,
            ]);
            $budgetdata = ProposedBudget::all()->first();
            $term1 = Transaction::all()->where('term',1)
                                ->where('budget_id', $budgetdata->id);
            $term2 = Transaction::all()->where('term',2)
                                ->where('budget_id', $budgetdata->id);
            $term3 = Transaction::all()->where('term',3)
                                ->where('budget_id', $budgetdata->id);

            foreach($term1 as $amount){
                $term1amount += $amount->amount;
            }
            foreach($term2 as $amount){
                $term2amount += $amount->amount;
            }
            foreach($term3 as $amount){
                $term3amount += $amount->amount;
            }

            foreach($term1 as $category){
                if($category->category == 'supplies')
                    $categorybudget['supplies']['term1'] += $category->amount;
                elseif ($category->category == 'transportation')
                    $categorybudget['transportation']['term1'] += $category->amount;
                elseif ($category->category == 'mailing')
                    $categorybudget['mailing']['term1'] += $category->amount;
                elseif ($category->category == 'meeting_expenses')
                    $categorybudget['meeting_expenses']['term1'] += $category->amount;
                elseif ($category->category == 'workshop')
                    $categorybudget['workshop']['term1'] += $category->amount;
                elseif ($category->category == 'mimeo')
                    $categorybudget['mimeo']['term1'] += $category->amount;
                elseif ($category->category == 'telephone')
                    $categorybudget['telephone']['term1'] += $category->amount;
                elseif ($category->category == 'repairs_and_maintenance')
                    $categorybudget['repairs_and_maintenance']['term1'] += $category->amount;
                elseif ($category->category == 'publication')
                    $categorybudget['publication']['term1'] += $category->amount;
                elseif ($category->category == 'uniform')
                    $categorybudget['uniform']['term1'] += $category->amount;
                elseif ($category->category == 'international_travel')
                    $categorybudget['international_travel']['term1'] += $category->amount;
                elseif ($category->category == 'representation')
                    $categorybudget['representation']['term1'] += $category->amount;
                elseif ($category->category == 'tokens')
                    $categorybudget['tokens']['term1'] += $category->amount;
                elseif ($category->category == 'commitments_student')
                    $categorybudget['commitments_student']['term1'] += $category->amount;
                elseif ($category->category == 'commitments_official')
                    $categorybudget['commitments_official']['term1'] += $category->amount;
                elseif ($category->category == 'membership')
                    $categorybudget['membership']['term1'] += $category->amount;
                elseif ($category->category == 'orientation_programs')
                    $categorybudget['orientation_programs']['term1'] += $category->amount;
                elseif ($category->category == 'internationalization_programs')
                    $categorybudget['internationalization_programs']['term1'] += $category->amount;
                elseif ($category->category == 'activities')
                    $categorybudget['activities']['term1'] += $category->amount;
                elseif ($category->category == 'capex')
                    $categorybudget['capex']['term1'] += $category->amount;
            }

            foreach($term2 as $category){
                if($category->category == 'supplies')
                    $categorybudget['supplies']['term2'] += $category->amount;
                elseif ($category->category == 'transportation')
                    $categorybudget['transportation']['term2'] += $category->amount;
                elseif ($category->category == 'mailing')
                    $categorybudget['mailing']['term2'] += $category->amount;
                elseif ($category->category == 'meeting_expenses')
                    $categorybudget['meeting_expenses']['term2'] += $category->amount;
                elseif ($category->category == 'workshop')
                    $categorybudget['workshop']['term2'] += $category->amount;
                elseif ($category->category == 'mimeo')
                    $categorybudget['mimeo']['term2'] += $category->amount;
                elseif ($category->category == 'telephone')
                    $categorybudget['telephone']['term2'] += $category->amount;
                elseif ($category->category == 'repairs_and_maintenance')
                    $categorybudget['repairs_and_maintenance']['term2'] += $category->amount;
                elseif ($category->category == 'publication')
                    $categorybudget['publication']['term2'] += $category->amount;
                elseif ($category->category == 'uniform')
                    $categorybudget['uniform']['term2'] += $category->amount;
                elseif ($category->category == 'international_travel')
                    $categorybudget['international_travel']['term2'] += $category->amount;
                elseif ($category->category == 'representation')
                    $categorybudget['representation']['term2'] += $category->amount;
                elseif ($category->category == 'tokens')
                    $categorybudget['tokens']['term2'] += $category->amount;
                elseif ($category->category == 'commitments_student')
                    $categorybudget['commitments_student']['term2'] += $category->amount;
                elseif ($category->category == 'commitments_official')
                    $categorybudget['commitments_official']['term2'] += $category->amount;
                elseif ($category->category == 'membership')
                    $categorybudget['membership']['term2'] += $category->amount;
                elseif ($category->category == 'orientation_programs')
                    $categorybudget['orientation_programs']['term2'] += $category->amount;
                elseif ($category->category == 'internationalization_programs')
                    $categorybudget['internationalization_programs']['term2'] += $category->amount;
                elseif ($category->category == 'activities')
                    $categorybudget['activities']['term2'] += $category->amount;
                elseif ($category->category == 'capex')
                    $categorybudget['capex']['term2'] += $category->amount;
            }
            foreach($term3 as $category){
                if($category->category == 'supplies')
                    $categorybudget['supplies']['term3'] += $category->amount;
                elseif ($category->category == 'transportation')
                    $categorybudget['transportation']['term3'] += $category->amount;
                elseif ($category->category == 'mailing')
                    $categorybudget['mailing']['term3'] += $category->amount;
                elseif ($category->category == 'meeting_expenses')
                    $categorybudget['meeting_expenses']['term3'] += $category->amount;
                elseif ($category->category == 'workshop')
                    $categorybudget['workshop']['term3'] += $category->amount;
                elseif ($category->category == 'mimeo')
                    $categorybudget['mimeo']['term3'] += $category->amount;
                elseif ($category->category == 'telephone')
                    $categorybudget['telephone']['term3'] += $category->amount;
                elseif ($category->category == 'repairs_and_maintenance')
                    $categorybudget['repairs_and_maintenance']['term3'] += $category->amount;
                elseif ($category->category == 'publication')
                    $categorybudget['publication']['term3'] += $category->amount;
                elseif ($category->category == 'uniform')
                    $categorybudget['uniform']['term3'] += $category->amount;
                elseif ($category->category == 'international_travel')
                    $categorybudget['international_travel']['term3'] += $category->amount;
                elseif ($category->category == 'representation')
                    $categorybudget['representation']['term3'] += $category->amount;
                elseif ($category->category == 'tokens')
                    $categorybudget['tokens']['term3'] += $category->amount;
                elseif ($category->category == 'commitments_student')
                    $categorybudget['commitments_student']['term3'] += $category->amount;
                elseif ($category->category == 'commitments_official')
                    $categorybudget['commitments_official']['term3'] += $category->amount;
                elseif ($category->category == 'membership')
                    $categorybudget['membership']['term3'] += $category->amount;
                elseif ($category->category == 'orientation_programs')
                    $categorybudget['orientation_programs']['term3'] += $category->amount;
                elseif ($category->category == 'internationalization_programs')
                    $categorybudget['internationalization_programs']['term3'] += $category->amount;
                elseif ($category->category == 'activities')
                    $categorybudget['activities']['term3'] += $category->amount;
                elseif ($category->category == 'capex')
                    $categorybudget['capex']['term3'] += $category->amount;
            }

            $amounts = collect(['term1' => $term1amount, 'term2' => $term2amount,
                                'term3' => $term3amount]);
            return view('home', ['budgetdata' => $budgetdata, 'amounts' => $amounts,
                                        'categorybudget' => $categorybudget]);
        }
    }
}
