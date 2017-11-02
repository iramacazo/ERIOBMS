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

//

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
