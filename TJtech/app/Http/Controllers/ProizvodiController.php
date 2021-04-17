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
            $provjeraProizvoda=DB::table('kosaricas')
                    ->where('proizvod_fk','=',$request->proizvod_id)
                    ->count();
            if($provjeraProizvoda>0){
                DB::table('kosaricas')
                    ->where('proizvod_fk','=',$request->proizvod_id)
                    ->increment('Kolicina');
                return redirect()->back();
            }else{
                $cart=new Kosarica;
                $cart->korisnik_fk=$request->session()->get('LogiraniKorisnik');
                $cart->proizvod_fk=$request->proizvod_id;
                $cart->Kolicina=1;
                $cart->save();
                return redirect()->back();
            }
            
            /*$podaciOKorisniku=Korisnik::where('korisnik_id','=',session('LogiraniKorisnik'))->first();
            if($podaciOKorisniku->Uloga=="admin"){
                return redirect('adminIndex.html');
            }elseif($podaciOKorisniku->Uloga=="korisnik"){
               // return redirect('userIndex.html');
               
            }else{
                echo "Oops, dogodila se greska";
            }*/
            
        }else{
            return redirect('login.html');
        }
    }
    static function brojProizvodaUKosari(){
        $idKorisnika=Session::get('LogiraniKorisnik');
        /*$brojRazlicitihProizvoda=DB::table('kosaricas')
                ->where('korisnik_fk',$idKorisnika)
                ->count();*/
        $kolicinaProizvoda=DB::table('kosaricas')
                ->where('korisnik_fk',$idKorisnika)
                ->sum('Kolicina');
        return $kolicinaProizvoda;

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
        /*$ukupnaCijena = DB::table('kosaricas')
            ->join('racunalos','kosaricas.proizvod_fk','=','proizvod_id')
            ->where('kosaricas.korisnik_fk','=',$idKorisnika)
            ->sum('Cijena','*','Kolicina');*/
        $podaci=DB::table('kosaricas')
            ->join('racunalos','kosaricas.proizvod_fk','=','proizvod_id')
            ->where('kosaricas.korisnik_fk','=',$idKorisnika)
            ->get();
        $suma=0;
        foreach($podaci as $var){
            $suma+=($var->Cijena*$var->Kolicina);
        }
        
        return $suma;
        
    }
    
     function izbrisiJedanModel($idProizvoda){
        $idKorisnika=Session::get('LogiraniKorisnik');
        $provjeraKolicineProizvoda=DB::table('kosaricas')
                        ->where('korisnik_fk','=',$idKorisnika)
                        ->where('proizvod_fk','=',$idProizvoda)
                        ->sum('Kolicina');
                        
        if($provjeraKolicineProizvoda>1){
            DB::table('kosaricas')
                ->where('kosaricas.korisnik_fk','=',$idKorisnika)
                ->where('proizvod_fk','=',$idProizvoda)
                ->decrement('Kolicina',1);
                return redirect()->back();
        }else{
            DB::table('kosaricas')
            ->where('kosaricas.korisnik_fk','=',$idKorisnika)
            ->where('proizvod_fk','=',$idProizvoda)
            ->delete();
            return redirect()->back();
        }
        
        //echo $provjeraKolicineProizvoda;
    }
    function dodajJedanModel($id){
        if(Session::has('LogiraniKorisnik')){
            $idKorisnika=Session::get('LogiraniKorisnik');
            DB::table('kosaricas')
                ->where('korisnik_fk','=',$idKorisnika)
                ->where('proizvod_fk','=',$id)
                ->increment('Kolicina',1);
            return redirect()->back();
        }else{
            echo "Ooop, dogodila se pogreska";
        }
    }
}

