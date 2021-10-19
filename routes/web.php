<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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
});

Route::get('/main', 'LoanController@index');
Route::get('/create', 'LoanController@create');
Route::post('/create', 'LoanController@store');
Route::get('/details/{id}', 'LoanController@show');
Route::get('/edit/{id}', 'LoanController@edit');
Route::post('/edit/{id}', 'LoanController@modify');
Route::delete('/del/{id}', 'LoanController@destroy')->name('loan.destroy');