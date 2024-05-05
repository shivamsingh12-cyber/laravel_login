<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TaskController;
use App\Http\Middleware\register;

//Open Routes
Route::any('/register',[RegisterController::class,'register']);
Route::any('/',[RegisterController::class,'login']);

// Protected Routes
Route::group([
    "middleware"=>["auth:sanctum"]
],function(){
    Route::any('/dashboard',[RegisterController::class,'home']);
    Route::any('/todo/add',[TaskController::class,'insert']);
    Route::any('/todo/status/{id}',[TaskController::class,'update']);
    Route::any('/logout',[RegisterController::class,'logout']);
});



// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
