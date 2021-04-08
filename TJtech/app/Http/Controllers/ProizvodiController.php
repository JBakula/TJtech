<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ProizvodiController extends Controller
{
    public function index(){
        return view('oprema'); 
    }
    function prikazOpreme(){
        $data = DB::table('opremas')->get();
        return view('oprema',['data'=>$data]);
    }
    function prikazLaptopa(){
        $dataLaptopi = DB::table('racunalos')->where('kategorija_fk', '2')->get();
        return view('laptopi',['dataLaptopi'=>$dataLaptopi]);
    }
    function prikazRacunala(){
        $dataRacunala = DB::table('racunalos')->where('kategorija_fk', '1')->get();
        return view('racunala',['dataRacunala'=>$dataRacunala]);
    }/*
    function searchBar(){
        $trazeniPojam=$_GET['pretraga'];
        $proizvodi=DB::table('racunalos')->where('Naziv_proizvoda','LIKE','%'.$trazeniPojam.'%')->get();
    }*/
}
