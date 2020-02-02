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

Route::redirect('/', '/dashboard');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard')->middleware('auth','check-for-account');

Route::group(['prefix' => 'account', 'as' => 'account.'], function() {
   Route::get('/', 'AccountController@index')->name('index');
   Route::get('/create', 'AccountController@create')->name('create');
   Route::get('/select', 'AccountController@indexSelect')->name('select.index');
   Route::get('/{account}/select', 'SelectAccountController@select')->name('select');
   Route::post('/', 'AccountController@store')->name('store');
});

Route::group(['prefix' => 'category', 'as' => 'category.'] , function() {
    Route::get('/', 'CategoryController@index')->name('index')->middleware('check-for-account');
    Route::get('/create', 'CategoryController@create')->name('create')->middleware('check-for-account');
    Route::post('/', 'CategoryController@store')->name('store');
});

Route::group(['prefix' => 'transaction', 'as' => 'transaction.'] , function() {
    Route::get('/', 'TransactionController@index')->name('index')->middleware('check-for-account');
    Route::get('/create', 'TransactionController@create')->name('create')->middleware('check-for-account');
    Route::post('/', 'TransactionController@store')->name('store');
});

Route::group(['prefix' => 'saving', 'as' => 'saving.'] , function() {
    Route::get('/', 'SavingController@index')->name('index')->middleware('check-for-account');
});

Route::group(['prefix' => 'goal', 'as' => 'goal.'] , function() {
    Route::get('/create', 'GoalController@create')->name('create')->middleware('check-for-account');
    Route::post('/', 'GoalController@store')->name('store')->middleware('check-for-account');
});
