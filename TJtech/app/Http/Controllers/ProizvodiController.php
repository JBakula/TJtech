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
            <li><a href="#">'.$row->Naziv_proizvoda.'</a></li>
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
                return redirect('userIndex.html');
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
    /*
    function pretrazivanjePrekoSearchBara(){
        if(isset($_POST['btn'])){
            
            $trazeniProizvod=$_POST['Naziv_proizvoda'];

            if($trazeniProizvod=="" || $trazeniProizvod==null){
                return redirect('nemaproizvoda.html');
            }else{
                $proizvod=Racunalo::where('Naziv_proizvoda','like',$trazeniProizvod)->get();
            if($proizvod->kategorija_fk==1){ 
                return redirect('racunala.html');
            }elseif($proizvod->kategorija_fk==2){
                return redirect("{{route('laptopi')}}#$proizvod->proizvod_id");
            }elseif($proizvod->kategorija_fk==3){
                return redirect("{{route('oprema')}}#$proizvod->proizvod_id");
            }else{
                echo "Oops, dogodila se greska";
            }
            }
            
        }
    }
    */
}
