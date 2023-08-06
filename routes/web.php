<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function (){
//    \RealRashid\SweetAlert\Facades\Alert::success('hello');
//    return view('login');
//});
//Route::get('/' , 'App\Http\Controllers\LoginController@index');

Route::get('/' , 'App\Http\Controllers\LoginController@index');

Route::post('/' , 'App\Http\Controllers\LoginController@authenticated')->name('login.store');

