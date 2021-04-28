<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kosarica;
use App\Models\Korisnik; 
use App\Models\Racunalo;
use App\Models\Kupovina;
use Artisan;
use Illuminate\Support\Facades\Session;
class ProizvodiController extends Controller
{
    public function index(){
        
        return view('oprema'); 
    }
    public function indexIndex(){
        Artisan::call('cache:clear'); 
        return view('index'); 
    }
    public function oNama(){
        return view('oNama'); 
    }
    public function indexZahvala(){
        return view('User.userZahvala'); 
    }
    /**/
    
    function fetch(Request $request)
    {
        if($request->get('query'))
        {
            $query = $request->get('query');
            $data = DB::table('racunalos')
                ->where('Naziv_proizvoda', 'LIKE', "%{$query}%")
                ->get();
                $output = '<table class="dropdown-menu table-responsive">';/* style="display:block; position:absolute; background-color: #eceaeadc;" */
            foreach($data as $row)
            {
                $output .= '
                <tr><th><a href="#">'.$row->Naziv_proizvoda.' '.$row->proizvod_id.':'.$row->kategorija_fk.'</a></th></tr>';
            }
            $output .= '</table>';
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
        }else{
            return redirect('login.html');
        }
    }
    static function brojProizvodaUKosari(){
        $idKorisnika=Session::get('LogiraniKorisnik');
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
    
    function kupi(Request $request){
        $idKorisnika=Session::get('LogiraniKorisnik');
        if(($request->address != null) && ($request->has('myRadioField'))){
                $proizvodiIzKosare=DB::table('kosaricas')
                ->join('racunalos','kosaricas.proizvod_fk','=','proizvod_id')
                ->where('korisnik_fk','=',$idKorisnika)
                ->get();
            
            foreach($proizvodiIzKosare as $items){
                $buy=new Kupovina;
                $buy->id_proizvoda=$items->proizvod_fk;
                $buy->id_korisnika=$items->korisnik_fk;
                $buy->Adresa=$request->address;
                $buy->Nacin_placanja=$request->myRadioField;
                $buy->Placeni_iznos=($items->Cijena * $items->Kolicina);
                $buy->save();
                DB::table('kosaricas')
                ->where('korisnik_fk','=',$idKorisnika)
                ->delete();
            }
            return redirect(route('zahvala'));
        }else{
            return redirect()->back();
        }
       
    }
    function ukloniProizvod($id){
        DB::table('racunalos')
            ->where('proizvod_id','=',$id)
            ->delete();

        return redirect()->back();
    }
    function dodajProizvod(){
        if(session()->has('LogiraniKorisnik')){
            $user=Korisnik::where('korisnik_id','=',session('LogiraniKorisnik'))->first();
            $data=[
                'LogiraniKorisnikPodaci'=>$user
            ];
        }
        return view('Admin.adminDodajProizvod',$data);
    }
    function dodajOpremu(Request $request){
        $this->validate($request,[
            'slika'=>'required',
            'naziv'=>'required',
            'cijena'=>'required',
            'velikaSlika'=>'required'
        ]);

        $novaOprema=new Racunalo;  
        $novaOprema->Naziv_proizvoda=$request->naziv;
        $novaOprema->Cijena=$request->cijena;
        $novaOprema->Slika=$request->slika;
        $novaOprema->Velika_slika=$request->velikaSlika;
        $novaOprema->kategorija_fk=3;
        $novaOprema->save();
        return redirect()->back();
    }
    function dodajRacunalo(Request $request){
        $this->validate($request,[
            'slikaRac'=>'required',
            'nazivRac'=>'required',
            'cijenaRac'=>'required',
            'velikaSlikaRac'=>'required',
            'cpuRac'=>'required',
            'ramRac'=>'required',
            'memorijaRac'=>'required',
            'grafickaRac'=>'required'
        ]);

        $novoRacunalo=new Racunalo;
        $novoRacunalo->Naziv_proizvoda=$request->nazivRac;
        $novoRacunalo->Cijena=$request->cijenaRac;
        $novoRacunalo->Slika=$request->slikaRac;
        $novoRacunalo->Velika_slika=$request->velikaSlikaRac;
        $novoRacunalo->CPU=$request->cpuRac;
        $novoRacunalo->RAM=$request->ramRac;
        $novoRacunalo->Memorija=$request->memorijaRac;
        $novoRacunalo->Graficka=$request->grafickaRac;
        $novoRacunalo->kategorija_fk=1;
        $novoRacunalo->save();
        return redirect()->back();
    }
    function dodajLaptop(Request $request){
        $this->validate($request,[
            'slikaLaptopa'=>'required',
            'nazivLaptopa'=>'required',
            'cijenaLaptopa'=>'required',
            'uvecanaSlikaLaptopa'=>'required',
            'cpu'=>'required',
            'ram'=>'required',
            'memorija'=>'required',
            'graficka'=>'required'
        ]);
 
        $noviLaptop=new Racunalo;
        $noviLaptop->Naziv_proizvoda=$request->nazivLaptopa;
        $noviLaptop->Cijena=$request->cijenaLaptopa;
        $noviLaptop->Slika=$request->slikaLaptopa;
        $noviLaptop->Velika_slika=$request->uvecanaSlikaLaptopa;
        $noviLaptop->CPU=$request->cpu;
        $noviLaptop->RAM=$request->ram;
        $noviLaptop->Memorija=$request->memorija;
        $noviLaptop->Graficka=$request->graficka;
        $noviLaptop->kategorija_fk=2;
        $noviLaptop->save();
        return redirect()->back();
    }
}

