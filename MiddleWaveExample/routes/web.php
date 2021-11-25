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
});
// Route::view('user','user')->middleware('protectedPage');
Route::view('home','home');
Route::view('user','user')
Route::view('noaccess','noaccess');
Route::group(['middleware'=>['protectedPage']],function(){
    Route::view('user','user');
    Route::get('/', function () {
        return view('welcome');
    });
});