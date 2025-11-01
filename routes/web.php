<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use App\Http\Controllers\todoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [authController::class, 'showLogin']);
Route::get('/signup', [authController::class,'showSignup']);
Route::post('/signup', [authController::class,'signup']);
Route::post('/login', [authController::class, 'login']);
Route::get('/todos' , [todoController::class, 'show_all']);
Route::get('/dashbord' , [todoController::class, 'show_dashbord']);