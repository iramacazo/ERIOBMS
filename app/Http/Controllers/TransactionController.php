<?php

namespace App\Http\Controllers;

use App\ProposedBudget;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    //
    public function addTransaction(){
        return view('addTransaction');
    }

    public function submitTransaction(Request $request){
        $validator = Validator::make($request->all(), [
            'category' => 'required',
            'transaction_date' => 'required',
            'amount' => 'required',
            'item_name' => 'required',
            'petty' => 'required',
            'term' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/add_transaction')
                ->withErrors($validator)
                ->withInput();
        }

        $transaction = new Transaction;
        $transaction->owner = Auth::user()->username;
        $transaction->category = $request->category;
        $transaction->transaction_date = $request->transaction_date;
        $transaction->amount = $request->amount;
        $transaction->item_name = $request->item_name;
        $transaction->term = $request->term;
        if(!empty($request->item_desc))
            $transaction->description = $request->item_desc;
        else
            $transaction->description = "";
        if($request->petty == "Yes")
            $transaction->paid_in_petty_cash = true;
        else
            $transaction->paid_in_petty_cash = false;
        $transaction->budget_id = ProposedBudget::all()->first()->id; //fix
        $transaction->save();

        echo ("Transaction added.");
        return redirect(route('home'));
    }
}
