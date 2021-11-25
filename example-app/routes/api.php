<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('data',[APIController::class,'getData']);
Route::post('add',[APIController::class,'add']);
Route::put('update',[APIController::class,'update']);




//// PASSPORT //////


Route::post('/register',[APIController::class,'register']); 

Route::post('/login',[APIController::class,'login']);

Route::get('/login',[APIController::class,'login'])->name('login');

Route::middleware('auth:api')->get('/details',[APIController::class,'getData'] );
