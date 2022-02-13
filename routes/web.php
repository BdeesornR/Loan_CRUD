<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
})->name('show-welcome');

Route::get('/main', 'LoanController@showMain')->name('show-main');
Route::get('/create', 'LoanController@showCreate')->name('show-create');
Route::post('/create', 'LoanController@registerNewLoan')->name('create');
Route::get('/details/{id}', 'LoanController@showLoanDetails')->name('show-details');
Route::get('/edit/{id}', 'LoanController@showEdit')->name('show-edit');
Route::post('/edit/{id}', 'LoanController@updateLoan')->name('modify');
Route::delete('/delete/{id}', 'LoanController@deleteLoan')->name('delete');
