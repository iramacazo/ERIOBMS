<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;

class ReportController extends Controller
{
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
