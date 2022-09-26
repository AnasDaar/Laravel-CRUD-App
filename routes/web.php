<?php

use App\Http\Controllers\schoolcontroller;
use App\Models\school;
use Illuminate\Support\Facades\Route;

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
    return view('');
});

Route::group(['middleware'=>'auth'],function(){
Route::get('/addstudent',[schoolController::class,'info']);
Route::post('/savestudent',[schoolController::class,'savestudent']);
Route::get('/showstudent',[schoolController::class,'showstudent']);
Route::get('/logout',[schoolController::class,'logout']);
Route::get('/delete/{id}',[schoolController::class,'delete']);
Route::match(['get','post'],'/edit{id}',[schoolController::class,'edit']);

//pdf route
Route::get('/downloadPDF',[schoolcontroller::class,'downloadPDF']);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
