<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\login;
use App\Http\Controllers\documentcontroller;

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

Route::get('/login',[login::class,'halamanlogin']);
Route::post('/postlogin',[login::class,'postlogin']);

Route::get('/logout',[login::class,'logout']);

Route::get('/dashboard',[documentcontroller::class,'Dashboard']);

Route::get('/document',[documentcontroller::class,'index']);
Route::post('/document/store',[documentcontroller::class,'store']);

Route::get('/approved/{id}',[documentcontroller::class,'approved']);
Route::get('/rejected/{id}',[documentcontroller::class,'reject']);