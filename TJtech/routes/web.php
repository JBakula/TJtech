<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignUpController; 
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
    return view('index');
});
Route::get('/index.html', function () {
    return view('index');
});
Route::get('/Laptopi.html', function () {
    return view('laptopi');
});
Route::get('/Onama.html', function () {
    return view('oNama');
});
Route::get('/Oprema.html', function () {
    return view('oprema');
});
Route::get('/Računala.html', function () {
    return view('racunala');
});
/*Route::get('/login.html', function(){
    return view('login');
});*/
Route::get('signup.html', [SignUpController::class,'index']);
Route::get('login.html', [LoginController::class,'index']);
Route::post('login.html',[LoginController::class,'check'])->name('provjera');
Route::post('signup.html', [SignUpController::class,'store'])->name('spremi');