<?php

use App\Http\Controllers\ArtworkController;
use App\Http\Controllers\LoginController;
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

Route::get('login', [LoginController::class,'login'])->name('login')->middleware('guest');
Route::post('login', [LoginController::class,'authenticate'])->name('login.auth');


Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
    Route::get('dashboard', function () {
        return view('dashboard');
    });
    Route::resource('artwork',ArtworkController::class);
});