<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kosarica;
use App\Models\Korisnik;
use App\Models\Racunalo;
use Illuminate\Support\Facades\Hash;
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
    /*function indexUrediKorisnika(){
        return view('Admin.adminUrediKorisnika');
    }*/
    public function urediKorisnika($idKorisnika){
        if(session()->has('LogiraniKorisnik')){
            $user=Korisnik::where('korisnik_id','=',session('LogiraniKorisnik'))->first();
            $data=[
                'LogiraniKorisnikPodaci'=>$user
            ];
            $korisnik = DB::table('korisniks')
            ->where('korisnik_id','=',$idKorisnika)
            ->get();
        
            $user=[
                'user'=>$korisnik 
            ];
        }
        
        
        // ['korisnik'=>$korisnik]
        return view('Admin.adminUrediKorisnika',$user,$data);
    }
    function promijeniImeKorisnika(Request $request){
        $this->validate($request,[
            'ime1'=>'required|email'
        ]);
        $korisnik=Korisnik::where('korisnik_id','=',$request->id)->first();
        $korisnik->Email=$request->ime1;
        $korisnik->save();
        return redirect(route('korisniciAdmin'));   
        
    } 
    function promijeniLozinku(Request $request){
        
        $korisnik=Korisnik::where('korisnik_id','=',$request->id2)->first();
        $novaLozinka=$request->ime2;
        $korisnik->Lozinka=Hash::make($novaLozinka);
        $korisnik->save();
        return redirect(route('korisniciAdmin'));   
        
    }
    function ukloniKorisnika(Request $request){
        $id=$request->id3;
        DB::table('korisniks')
            ->where('korisnik_id','=',$id)
            ->delete();
        return redirect(route('korisniciAdmin'));
    
    //    return $request->id3;    
    }
    function promijeniKorisnickoIme(Request $request){
        $korisnik=Korisnik::where('korisnik_id','=',$request->id)->first();
        $korisnik->Ime_prezime=$request->ime1;
        $korisnik->save();
        return redirect(route('korisniciAdmin'));
    }
    
}
