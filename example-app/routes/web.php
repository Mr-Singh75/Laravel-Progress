<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\KYCController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserConroller;
use App\Http\Controllers\MobileController;

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
})->middleware('rolecheck');
Route::view('register','registration');
Route::post('/user/create',[UserConroller::class,'create']);
Route::view('welcome/{age}','welcome');
Route::view('noaccess','noaccess');
// Route::get('/{id}', function () {
//     return view('welcome');
// });
Route::get('get',[UserConroller::class,'getUsers']);
Route::view('accessor','accessor');
Route::get('/hat', function () {
    echo "Route m a gaye";
    return view('registration');
});
Route::view('reg','registration');
Route::get('addcustomer',[CustomerController::class,'add_customer']);
Route::get('/showmobile/{id}',[CustomerController::class,'show_mobile']);
Route::get('/showcustomer/{id}',[MobileController::class,'show_customer']);
Route::post('/user/loginaction',[UserConroller::class,'loginAction']);
Route::get('user/login', function () {
    if(session()->has('username'))
    {
        return view('home');
    }
    return view('login');
});
Route::get('user/logout',[UserConroller::class,'logout'])->name('logout');
// Route::view('user/home','home')->middleware('rolecheck');
//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::view('user/admindashboard','Dashboard.admindashboard');
Route::view('user/userdashboard','Dashboard.userdashboard');
Route::view('user/guestdashboard','Dashboard.guestdashboard');



//////////KYC Example///////

Route::view('user/home','home')->middleware('kyccheck');
Route::view('user/pending','KYC.pending');
Route::view('user/kycform','KYC.kycform');
Route::post('user/kycaction',[KYCController::class,'kycAction']);