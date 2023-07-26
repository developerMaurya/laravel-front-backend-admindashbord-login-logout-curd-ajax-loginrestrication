<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\stateController;
use App\Http\Controllers\cityController;


Route::get('/',[stateController::class,'login'])->name('login');
Route::post('/login',[stateController::class,'postLogin'])->name('postLogin');
Route::get('/logout',[stateController::class,'logout'])->name('logout');
// >>>>>>>>>>>>>>>>
Route::get('/registration',[stateController::class,'registration']);
Route::post('/registration',[stateController::class,'registrationHangle']);
Route::get('/forget',[stateController::class,'forget']);
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
Route::get('/index', [stateController::class, 'homepage'])->name('homepage');
Route::get('/dashboard',[stateController::class,'dashbord'])->name('dashboard');
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
// crud 
Route::get('/crud',[stateController::class,'index']);
Route::post('/addCity',[cityController::class,'store']);
Route::get('/getCities',[cityController::class,'index']);
Route::post('/getCityById',[cityController::class,'edit']);
Route::post('/updateCity',[cityController::class,'update']);
Route::post('/deleteCityById',[cityController::class,'destroy']);




