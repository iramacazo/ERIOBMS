<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    //
    public function addTransaction(){
        return view('addTransaction');
    }
    public function submitTransaction(Request $request){
        $this->validate($request, [
            'owner' => 'required',
            'category' => 'required',
            'transaction_date' => 'required',
            'amount' => 'required',
            'item_name' => 'required',
            'petty' => 'required',
            'submit' => 'required'
        ]);

        $transaction = new Transaction;
        $transaction->owner = $request->owner;
        $transaction->category = $request->category;
        $transaction->transaction_date = $request->transaction_date;
        $transaction->amount = $request->amount;
        $transaction->item_name = $request->item_name;
        if(!empty($request->item_desc))
            $transaction->description = $request->item_desc;
        else
            $transaction->description = "";
        $transaction->paid_in_petty_cash = $request->petty;
        $transaction->budget_id = $transaction->proposedBudget->budget_id; //fix
        $transaction->save();


        echo ("Transaction added.");
        return view(home);
    }
}
