<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Korisnik;
use Illuminate\Support\Facades\Hash;

class SignUpController extends Controller
{
    public function index()   
    {
        return view('signup');
    }

    public function store(Request $request) 
    {
        //
        $this->validate($request,[     // validacija unesenih podataka iz forme
            'ime'=>'required',
            'email'=>'required|email',
            'lozinka'=>'required_with:potvrda',
            'potvrda'=>'required|same:lozinka',
        ]);
        $pass=$request->lozinka;
        $mail=$request->email;
        $provjeraMaila=Korisnik::where('Email','=',$mail)->count();
        $user=new Korisnik;         // kreiranje novog retka u tablici
        $user->Ime_prezime=$request->ime;   // unosenje imena iz forme u Ime u bazi
        $user->Email=$mail;   // unosenje maila iz forme u Email u bazi
        $user->Lozinka = Hash::make($pass);   // unosenje lozinke iz forme u Lozinka u bazi
        $user->Uloga='korisnik';   // unosenje uloge u bazu
        $potvrda=$request->input('potvrda');   // potvrda lozinke
        if($potvrda==$pass && $provjeraMaila==0){  // ako je potvrdjena lozinka jednaka kao i prethodno unesena lozinka, podaci se spremaju u bazu
            $user->save();
            return redirect('login.html');
        }else{
            return back()->withInput(); // ako nije, korisnik ponovo mora upisati lozinku
           
        }   
    }
}
