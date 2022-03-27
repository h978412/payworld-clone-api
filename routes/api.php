<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\userRegisterController;
use App\Http\Controllers\ProfileController;
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
//this route take a request in order to register a user 
//or for forgot password
Route::controller(userRegisterController::class)->group(function(){

    Route::post('/register', [userRegisterController::class,'store']);
    Route::post('/forgetpassword',[userRegisterController::class,'update']);

});


Route::controller(dashboardController::class)->group(function(){

    Route::get('/dashboard/{id}',[dashboardController::class,'show']);
    Route::get('dashboard',[dashboardController::class,'index']);

});



//this route takes retailer id as parameter
//and return the details assosiated with user

Route::controller(ProfileController::class)->group(function(){
    Route::get('/profile/{id}',[ProfileController::class,'index']);
    Route::put('/profile/{id}',[ProfileController::class,'update_all']);
});



Route::get('index', function () {
    return 'this is simple text';
});




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
