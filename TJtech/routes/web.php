<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignUpController; 
use App\Http\Controllers\ProizvodiController;  
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

Route::get('/Onama.html', function () {
    return view('oNama');
});

/*Route::get('/Računala.html', function () {
    return view('racunala');
});*/
  
Route::get('Oprema.html',[ProizvodiController::class,'prikazOpreme']);
Route::get('Laptopi.html',[ProizvodiController::class,'prikazLaptopa']);
Route::get('Računala.html',[ProizvodiController::class,'prikazRacunala']);
Route::get('signup.html', [SignUpController::class,'index']);
Route::get('login.html', [LoginController::class,'index']);
Route::post('login.html',[LoginController::class,'check'])->name('provjera');
Route::post('signup.html', [SignUpController::class,'store'])->name('spremi');
Route::get('userIndex.html',[LoginController::class,'profile']);
Route::get('userLaptopi.html',[LoginController::class,'userLaptopi']);
Route::get('userOnama.html',[LoginController::class,'userOnama']);
Route::get('userOprema.html',[LoginController::class,'userOprema']);
Route::get('userRacunala.html',[LoginController::class,'userRacunala']);
Route::get('logout',[LoginController::class,'logout']);