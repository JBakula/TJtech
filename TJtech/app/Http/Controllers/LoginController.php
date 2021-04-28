<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Korisnik;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
class LoginController extends Controller
{
    public function index()     
    {
        return view('login');
    }
    public function check(Request $request){    
        $request->validate([
            'email'=>'required|email',
            'lozinka'=>'required'
        ]);
        $email = $request->email;
        $password=$request->lozinka;
        $podaci=Korisnik::where('Email','=',$email/*,['Lozinka','=', $password]]*/)->first();  
        
        if(!$podaci){
            return back()->withInput(); 
        }else{
            if(Hash::check($password, $podaci->Lozinka)){ 
                $request->session()->put('LogiraniKorisnik',$podaci['korisnik_id']); 
                
                if($podaci->Uloga=="korisnik"){
                    return redirect('userIndex.html'); 
                }elseif($podaci->Uloga=="admin"){
                    return redirect('adminIndex.html');
                }else{
                    echo "Ups, dogodila se greska";
                }
                
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
            ->distinct()                                     
            ->get();
            
            $podaciKosaraUser=[
                'PodaciKosaraUser'=>$PodaciKosaraUser
            ];
        
        } 
      
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
