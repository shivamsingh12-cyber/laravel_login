<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TaskController;
use App\Http\Middleware\register;

Route::any('/register',[RegisterController::class,'register']);
Route::any('/',[RegisterController::class,'login']);
Route::any('/dashboard',[RegisterController::class,'home'])->middleware(register::class);
Route::any('/todo/add',[TaskController::class,'insert'])->middleware(register::class);
Route::any('/logout',[RegisterController::class,'logout']);
