<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kosarica;
use App\Models\Korisnik;
use App\Models\Racunalo;
use Illuminate\Support\Facades\Session;
class KorisniciController extends Controller
{
    function korisniciAdmin(){
        if(session()->has('LogiraniKorisnik')){
            $user=Korisnik::where('korisnik_id','=',session('LogiraniKorisnik'))->first();
            $data=[
                'LogiraniKorisnikPodaci'=>$user
            ];
        }
        if($user->Uloga=="admin"){ 
            $korisnici=DB::table('korisniks')->get();
            return view('Admin.adminKorisnici',$data,['korisnici'=>$korisnici]);
        }
    }
}
