<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kosarica;
use App\Models\Korisnik;
use App\Models\Racunalo;
use Illuminate\Support\Facades\Session;

class PrikazProizvodaController extends Controller
{
    function prikazOpreme(){  
        $data = DB::table('racunalos')->where('kategorija_fk', '3')->get();;
        return view('oprema',['data'=>$data]);
    }
    function prikazLaptopa(){
        $dataLaptopi = DB::table('racunalos')->where('kategorija_fk', '2')->get();
        return view('laptopi',['dataLaptopi'=>$dataLaptopi]);
    }
    function prikazRacunala(){
        $dataRacunala = DB::table('racunalos')->where('kategorija_fk', '1')->get();
        return view('racunala',['dataRacunala'=>$dataRacunala]);
    }
    function userRacunala(){
        if(session()->has('LogiraniKorisnik')){
            $user=Korisnik::where('korisnik_id','=',session('LogiraniKorisnik'))->first();
            $data=[
                'LogiraniKorisnikPodaci'=>$user
            ];
        }
        $dataRacunalaUser = DB::table('racunalos')->where('kategorija_fk', '1')->get();
        return view('User.userRacunala',$data,['dataRacunalaUser'=>$dataRacunalaUser]);
    }
    function userLaptopi(){
        if(session()->has('LogiraniKorisnik')){
            $user=Korisnik::where('korisnik_id','=',session('LogiraniKorisnik'))->first();
            $data=[
                'LogiraniKorisnikPodaci'=>$user
            ];
        }
        $dataLaptopiUser = DB::table('racunalos')->where('kategorija_fk', '2')->get();
        return view('User.userLaptopi',$data,['dataLaptopiUser'=>$dataLaptopiUser]);
    }
    function userOprema(){
        if(session()->has('LogiraniKorisnik')){
            $user=Korisnik::where('korisnik_id','=',session('LogiraniKorisnik'))->first();
            $data=[
                'LogiraniKorisnikPodaci'=>$user
            ];
        }
        $PodaciOpremeUser = DB::table('racunalos')->where('kategorija_fk', '3')->get();
        return view('User.userOprema',$data,['PodaciOpremeUser'=>$PodaciOpremeUser]);
    }
    function adminUpravljanjeProizvodima(){
        if(session()->has('LogiraniKorisnik')){
            $user=Korisnik::where('korisnik_id','=',session('LogiraniKorisnik'))->first();
            $data=[
                'LogiraniKorisnikPodaci'=>$user
            ];
        }
        if($user->Uloga=="admin"){ 
            $proizvodi=DB::table('racunalos')->get();
            return view('Admin.adminProizvodi',$data,['proizvodi'=>$proizvodi]);
        }
    }
}
