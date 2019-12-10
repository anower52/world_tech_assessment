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

Route::get('/', function () {
    return view('welcome');
})->name('problem_1');

Route::get('/problem-2', function () {
    return view('problem_2');
})->name('problem_2');
Route::post('/order/store','OrderController@orderStore')->name('order.store');
Route::post('/problem-2/operation','OrderController@problem2Operation')->name('problem2Operation');
