<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kosarica;
use App\Models\Korisnik;
use App\Models\Racunalo;
use Illuminate\Support\Facades\Session;
class ProizvodiController extends Controller
{
    public function index(){
        return view('oprema'); 
    }/*
    function prikazOpreme(){
        $data = DB::table('opremas')->get();
        return view('oprema',['data'=>$data]);
    }*/
    /**/
    
    function fetch(Request $request)
    {
        if($request->get('query'))
        {
            $query = $request->get('query');
            $data = DB::table('racunalos')
                ->where('Naziv_proizvoda', 'LIKE', "%{$query}%")
                ->get();
                $output = '<ul class="dropdown-menu" style="display:block; position:absolute; background-color: #eceaeadc;">';
            foreach($data as $row)
            {
                $output .= '
                <li><a href="#">'.$row->Naziv_proizvoda.' '.$row->proizvod_id.':'.$row->kategorija_fk.'</a></li>
                ';
            }
            $output .= '</ul>';
            echo $output;
        }
       
    } 
    function dodajUKosaru(Request $request){
        if($request->session()->has('LogiraniKorisnik')){
            
            $cart=new Kosarica;
            $cart->korisnik_fk=$request->session()->get('LogiraniKorisnik');
            $cart->proizvod_fk=$request->proizvod_id;
            $cart->save();
            $podaciOKorisniku=Korisnik::where('korisnik_id','=',session('LogiraniKorisnik'))->first();
            if($podaciOKorisniku->Uloga=="admin"){
                return redirect('adminIndex.html');
            }elseif($podaciOKorisniku->Uloga=="korisnik"){
               // return redirect('userIndex.html');
               return redirect()->back();
            }else{
                echo "Oops, dogodila se greska";
            }
            
        }else{
            return redirect('login.html');
        }
    }
    static function brojProizvodaUKosari(){
        $idKorisnika=Session::get('LogiraniKorisnik');
        return Kosarica::where('korisnik_fk',$idKorisnika)->count();
    }
    static function brojPrimjerakaPojedinogProizvoda(){
        $idKorisnika=Session::get('LogiraniKorisnik');
        $brojPrimjeraka=DB::table('kosaricas')
            ->join('racunalos','kosaricas.proizvod_fk','=','proizvod_id')
            ->where('kosaricas.korisnik_fk','=',$idKorisnika)
            ->count();
        return $brojPrimjeraka;
    }
    static function ukupnaCijenaProizvodaUKosarici(){
        $idKorisnika=Session::get('LogiraniKorisnik');
        $ukupnaCijena = DB::table('kosaricas')
            ->join('racunalos','kosaricas.proizvod_fk','=','proizvod_id')
            ->where('kosaricas.korisnik_fk','=',$idKorisnika)
            ->sum('Cijena');
        return $ukupnaCijena;
    }
    static function prebrojiModele(){
        $idKorisnika=Session::get('LogiraniKorisnik');
        $product_count= DB::table('kosaricas')
                ->select('proizvod_fk', DB::raw('count(proizvod_fk) as proizvod_fk'))
                ->where('kosaricas.korisnik_fk','=',$idKorisnika)
                ->groupBy('proizvod_fk')
                ->orderBy('created_at')
                ->get();
            
    
        return $product_count;
    }
   static function dohvatiKosaru(){
        $idKorisnika=Session::get('LogiraniKorisnik');
        $kosara=DB::table('kosaricas')
            ->select('kosarica_id','proizvod_fk')
            ->where('korisnik_fk','=',$idKorisnika)
            ->get();
        //return $kosara; 
        echo $kosara;
    }
     function izbrisiJedanModel($idProizvoda){
        $idKorisnika=Session::get('LogiraniKorisnik');
        DB::table('kosaricas')
            ->where('kosaricas.korisnik_fk','=',$idKorisnika)
            ->where('kosarica_id','=',$idProizvoda)
            ->delete();
        
        //Kosarica::destroy($id);
        return redirect()->back();
    }
    function dodajJedanModel($id){
        if(Session::has('LogiraniKorisnik')){
            $idKorisnika=Session::get('LogiraniKorisnik');
            $cart=new Kosarica;
            $cart->korisnik_fk=$idKorisnika;
            $cart->proizvod_fk=$id;
            $cart->save();
            return redirect()->back();
        }else{
            echo "Ooop, dogodila se pogreska";
        }
        
    }
}

