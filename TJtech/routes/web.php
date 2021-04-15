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
Route::get('/nemaproizvoda.html',function(){
    return view('nemaproizvoda');
});
Route::get('/userNemaproizvoda.html',function(){
    return view('userNemaproizvoda');
});
Route::get('/adminNemaproizvoda.html',function(){
    return view('adminNemaproizvoda');
});
/*Route::get('/Računala.html', function () {
    return view('racunala'); 
});*/
  
Route::get('Oprema.html',[ProizvodiController::class,'prikazOpreme'])->name('oprema');
Route::get('Laptopi.html',[ProizvodiController::class,'prikazLaptopa'])->name('laptopi');
Route::get('Računala.html',[ProizvodiController::class,'prikazRacunala'])->name('racunala');
Route::get('signup.html', [SignUpController::class,'index']);
Route::get('login.html', [LoginController::class,'index']);
Route::post('login.html',[LoginController::class,'check'])->name('provjera');
Route::post('signup.html', [SignUpController::class,'store'])->name('spremi');
Route::get('userIndex.html',[LoginController::class,'profile']);
Route::get('adminIndex.html',[LoginController::class,'profileAdmin'])->name('adminProfile');
Route::get('userLaptopi.html',[LoginController::class,'userLaptopi'])->name('laptopiUser');
Route::get('adminLaptopi.html',[LoginController::class,'adminLaptopi'])->name('laptopiAdmin');
Route::get('userOnama.html',[LoginController::class,'userOnama']);
Route::get('adminOnama.html',[LoginController::class,'adminOnama'])->name('OnamaAdmin');
Route::get('userOprema.html',[LoginController::class,'userOprema'])->name('opremaUser');
Route::get('adminOprema.html',[LoginController::class,'adminOprema'])->name('opremaAdmin');
Route::get('userRacunala.html',[LoginController::class,'userRacunala'])->name('racunalaUser');
Route::get('adminRačunala.html',[LoginController::class,'adminRacunala'])->name('racunalaAdmin');
Route::post('/index.html/fetch',[ProizvodiController::class,'fetch'])->name('search.fetch');
//Route::get('/index.html',[ProizvodiController::class,'indexblade'])->name('indexblade');
Route::post('userRacunala.html',[ProizvodiController::class,'dodajUKosaru'])->name('dodajUserRacunalaUKosaru'); 
Route::post('userOprema.html',[ProizvodiController::class,'dodajUKosaru'])->name('dodajUserOpremuUKosaru');
Route::post('userLaptopi.html',[ProizvodiController::class,'dodajUKosaru'])->name('dodajUserLaptopeUKosaru');  
Route::post('adminRacunala.html',[ProizvodiController::class,'dodajUKosaru'])->name('dodajAdminRacunalaUKosaru'); 
Route::post('adminOprema.html',[ProizvodiController::class,'dodajUKosaru'])->name('dodajAdminOpremuUKosaru');
Route::post('adminLaptopi.html',[ProizvodiController::class,'dodajUKosaru'])->name('dodajAdminLaptopeUKosaru');

Route::post('laptopi.html',[ProizvodiController::class,'dodajUKosaru'])->name('dodajLaptopeUKosaru'); 
Route::post('oprema.html',[ProizvodiController::class,'dodajUKosaru'])->name('dodajOpremuUKosaru');
Route::post('racunala.html',[ProizvodiController::class,'dodajUKosaru'])->name('dodajRacunalaUKosaru');

Route::get('userPunaKosarica.html',[LoginController::class,'userKosara'])->name('kosara');
Route::get('userPraznaKosarica.html',[LoginController::class,'praznaKosaraUser'])->name('praznaKosara');

//Route::post('index.html',[ProizvodiController::class,'pretrazivanjePrekoSearchBara']);//->name('searchBarIndex');
Route::get('logout',[LoginController::class,'logout']); 