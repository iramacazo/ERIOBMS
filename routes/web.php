<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', function () {
    return view('auth/login');
})->name('login');

Route::get('/test', function () {
    return view('homepage');
})->name('homepage');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/registerUser', 'UserController@register')->name('registerUser');

Route::get('/propose_budget', 'ProposedBudgetController@proposeForm')->name('goto_propose_budget'); //returns view

Route::post('/save_proposed_budget', 'ProposedBudgetController@proposeBudget')->name('proposeBudget');

//transaction routes
Route::get('/add_transaction', 'TransactionController@addTransaction')->name('goto_add_transaction');

Route::post('/save_transaction', [
    'as' => 'submitTransaction',
    'uses' => 'TransactionController@submitTransaction'
]);

//report routes
Route::get('/view_transactions/all', [
   'as' => 'view.all.transactions',
   'uses' => 'ReportController@viewAllTransactions'
]);

Route::get('view_transactions/input_range',[
   'as' => 'input.transaction.range',
   'uses' => 'ReportController@inputDateRange'
]);

Route::post('view_transactions/result', [
    'as' => 'view.transactions.result',
    'uses' => 'ReportController@viewTransactionsRange'
]);
//

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

//Budget Variance Routes
Route::get('/budget_variance', 'ReportController@getAllTerms')->name('budget_variance');

Route::post('/budget_variance_result', 'ReportController@generateBudgetVariance')->name('budget_variance_result');

Route::get('/confirm_budget', 'ProposedBudgetController@confirmBudgetView')->name('confirm_budget');

Route::post('/approve_budget', 'ProposedBudgetController@approveBudget')->name('approve_budget'); 
