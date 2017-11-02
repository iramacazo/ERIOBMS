<?php

namespace App\Http\Controllers;

use App\ProposedBudget;
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
            $budgetdata = ProposedBudget::all()->first();
            return view('home', ['budgetdata' => $budgetdata]);
        }
    }
}
