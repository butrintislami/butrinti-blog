<?php

use App\Http\Controllers\ControllerRegister;
use App\Http\Controllers\PostsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('register',[ControllerRegister::class,'register'])->name('register');
Route::post('login',[ControllerRegister::class,'login'])->name('login');

Route::get('posts',[PostsController::class,'index']);
Route::get('posts/{id}',[PostsController::class,'update']);
