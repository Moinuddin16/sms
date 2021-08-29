<?php

use Illuminate\Support\Facades\Auth;
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
Route::get('/',function(){
    return redirect('admin/dashboard');
});


Auth::routes();

Route::group(['prefix' => 'admin' ,'middleware' => 'auth'],function () {
    Route::get('dashboard', 'DashboardController@index');

    // student
    Route::resource('student', 'StudentController');
    Route::post('student/change-status','StudentController@changeStatus');

    // fee
    Route::resource('fees', 'FeesController');
    Route::post('fees/change-status','Feescontroller@changeStatus');

    //fee setup
    Route::resource('fees-setup', 'FeesSetupController');
    Route::post('filter-fess-setup', 'FeesSetupController@filterFessSetup');

    //generate fee book
    Route::resource('generate-fees-book', 'GenerateFeesBookController');
    Route::post('filter-generate-fess-book', 'GenerateFeesBookController@filterGenerateFessBook');
    Route::get('get-payment-category/{id}/{fees}', 'GenerateFeesBookController@getPaymentCategory');
  

    //fees book
    Route::resource('fees-book', 'FeesBookController');
    Route::post('filter-fess-book', 'FeesBookController@filterFessBook');
    Route::Post('get-fees-setups', 'FeesBookController@getPaymentType');
    Route::get('print-fees-book/{id}' , 'FeesBookController@printFeesBook');
});

