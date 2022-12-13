<?php

use App\Http\Controllers\ControllerRegister;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\RepliesController;
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



Route::middleware('auth:api')->group( function(){

        Route::get('posts',[PostsController::class,'index']);
        Route::get('posts/{id}',[PostsController::class,'update']);
        Route::post('posts',[PostsController::class,'store']);
        Route::delete('posts/{id}',[PostsController::class,'destroy']);
        Route::put('posts/{id}',[PostsController::class,'update']);
        Route::post('posts/{id}/comment',[Repliescontroller::class,'store']);

});
