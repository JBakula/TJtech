<?php
// u ovom kontroleru se provjerava je li se korisnik  ispravno logira
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Korisnik;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
//use Symfony\Component\HttpFoundation\Session\Session;
class LoginController extends Controller
{
    public function index()     // <---- ova metoda ucitava html stranicu login
    {
        return view('login');
    }
    public function check(Request $request){    // ova metoda uzima unesene podatke iz forme i usporedjuje ih 
                                                // s podacima u bazi
        $request->validate([
            'email'=>'required|email',
            'lozinka'=>'required'
        ]);
        $email = $request->email;
        $password=$request->lozinka;
        $podaci=Korisnik::where([['Email','=',$email],['Lozinka','=', $password]])->first(); // sql upit 

        if(!$podaci){
            return back()->withInput(); // ako se korisnik nije dobro logira i nije pronadjen u bazi vraca ga nazad
        }else{
            
            if($request->lozinka==$podaci->Lozinka){ // provjera lozinke
                $request->session()->put('LogiraniKorisnik',$podaci['korisnik_id']); // uspostavljanje sesije i prosljedjivanje imena
                
                if($podaci->Uloga=="korisnik"){
                    return redirect('userIndex.html'); 
                }elseif($podaci->Uloga=="admin"){
                    return redirect('adminIndex.html');
                }else{
                    echo "Ups, dogodila se greska";
                }
                // redirektanje na pocetnu stranicu nakon uspjesne prijave
            }else{
                return back()->withInput(); 
            }
        }
    }
    function profile(){
        if(session()->has('LogiraniKorisnik')){
            $user=Korisnik::where('korisnik_id','=',session('LogiraniKorisnik'))->first();
            $data=[
                'LogiraniKorisnikPodaci'=>$user
            ];
        }
        return view('User.userIndex',$data);
    }
    function profileAdmin(){ 
        if(session()->has('LogiraniKorisnik')){
            $user=Korisnik::where('korisnik_id','=',session('LogiraniKorisnik'))->first();
            $data=[
                'LogiraniKorisnikPodaci'=>$user
            ];
        }
        return view('Admin.adminIndex',$data);
    }
    
    function adminLaptopi(){
        if(session()->has('LogiraniKorisnik')){
            $user=Korisnik::where('korisnik_id','=',session('LogiraniKorisnik'))->first();
            $data=[
                'LogiraniKorisnikPodaci'=>$user
            ]; 
        }
        $dataLaptopiAdmin = DB::table('racunalos')->where('kategorija_fk', '2')->get();
        return view('Admin.adminLaptopi',$data,['dataLaptopiAdmin'=>$dataLaptopiAdmin]);
    }
    function userOnama(){
        if(session()->has('LogiraniKorisnik')){
            $user=Korisnik::where('korisnik_id','=',session('LogiraniKorisnik'))->first();
            $data=[
                'LogiraniKorisnikPodaci'=>$user
            ];
        }
        
        return view('User.userOnama',$data);
    }
    function userKosara(){
        if(session()->has('LogiraniKorisnik')){
            $user=Korisnik::where('korisnik_id','=',session('LogiraniKorisnik'))->first();
            $data=[
                'LogiraniKorisnikPodaci'=>$user
            ];
            $PodaciKosaraUser = DB::table('kosaricas')
            ->join('racunalos','kosaricas.proizvod_fk','=','proizvod_id')
            ->where('kosaricas.korisnik_fk','=',$user->korisnik_id)
            ->select('racunalos.*','kosaricas.*')
            ->distinct()                                    // racunala iz 
            ->get();
            
            $podaciKosaraUser=[
                'PodaciKosaraUser'=>$PodaciKosaraUser
            ];
        /*
            $product_count= DB::table('kosaricas')
                ->select('proizvod_fk', DB::raw('count(proizvod_fk) as proizvod_fk'))
                ->where('kosaricas.korisnik_fk','=',$user->korisnik_id)
                ->groupBy('proizvod_fk')
                ->get();
            $pc=[
                'Product_count'=>$product_count
            ];*/
        } 
        //echo $product_count;
        //$PodaciKosaraUser = DB::table('kosaricas')->where('korisnik_fk',$user->korisnik_id)->get();
       //echo $user;
      
           // echo $product_count;
        //return view('User.userPunaKosarica',$data,['product_count'=>$product_count],['PodaciKosaraUser'=>$PodaciKosaraUser]);
      
        return view('User.userPunaKosarica',$data,$podaciKosaraUser);
    }
    function praznaKosaraUser(){
        if(session()->has('LogiraniKorisnik')){
            $user=Korisnik::where('korisnik_id','=',session('LogiraniKorisnik'))->first();
            $data=[
                'LogiraniKorisnikPodaci'=>$user
            ];
        }
        return view('User.userPraznaKosarica',$data);
    }
    function adminOnama(){
        if(session()->has('LogiraniKorisnik')){
            $user=Korisnik::where('korisnik_id','=',session('LogiraniKorisnik'))->first();
            $data=[
                'LogiraniKorisnikPodaci'=>$user
            ];
        }
        
        return view('Admin.adminOnama',$data);
    }
    
    function adminOprema(){
        if(session()->has('LogiraniKorisnik')){
            $user=Korisnik::where('korisnik_id','=',session('LogiraniKorisnik'))->first();
            $data=[
                'LogiraniKorisnikPodaci'=>$user
            ];
        }
        $PodaciOpremeAdmin = DB::table('racunalos')->where('kategorija_fk', '3')->get(); 
        return view('Admin.adminOprema',$data,['PodaciOpremeAdmin'=>$PodaciOpremeAdmin]);
    }
    
    function adminRacunala(){
        if(session()->has('LogiraniKorisnik')){
            $user=Korisnik::where('korisnik_id','=',session('LogiraniKorisnik'))->first();
            $data=[
                'LogiraniKorisnikPodaci'=>$user
            ];
        }
        $dataRacunalaAdmin = DB::table('racunalos')->where('kategorija_fk', '1')->get();
        return view('Admin.adminRačunala',$data,['dataRacunalaAdmin'=>$dataRacunalaAdmin]); 
    }
    
    function logout(){
        if(session()->has('LogiraniKorisnik')){
            session()->forget('LogiraniKorisnik');
            return redirect('index.html');
        }
    }
}
