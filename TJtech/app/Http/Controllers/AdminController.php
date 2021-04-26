<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /*if(session()->has('LogiraniKorisnik')){
        $user=Korisnik::where('korisnik_id','=',session('LogiraniKorisnik'))->first();
        $data=[
            'LogiraniKorisnikPodaci'=>$user
        ];
    }
    return view('Admin.adminIndex',$data);*/
}
