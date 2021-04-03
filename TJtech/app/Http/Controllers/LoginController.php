<?php
// u ovom kontroleru se provjerava je li se korisnik  ispravno logira
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Korisnik;
use Illuminate\Support\Facades\Hash;

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
                $request->session()->put('Ime',$podaci['Ime_prezime']); // uspostavljanje sesije i prosljedjivanje imena
                return redirect('index.html'); // redirektanje na pocetnu stranicu nakon uspjesne prijave
            }else{
                return back()->withInput();
            }
        }
    }
}
