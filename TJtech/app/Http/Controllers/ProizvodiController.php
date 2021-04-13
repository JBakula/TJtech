<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ProizvodiController extends Controller
{
    public function index(){
        return view('oprema'); 
    }
    function prikazOpreme(){
        $data = DB::table('opremas')->get();
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
    /*public function prikaz(){
        return view('index');
    }*/
    /*
    function searchBar(Request $request){
        
        $proizvodi=DB::table("racunalos")
                        ->where("Naziv_proizvoda","LIKE","%{$request->terms}%")
                        /*->orWhere("CPU","LIKE","%{$request->terms}%")
                        ->orWhere("RAM","LIKE","%{$request->terms}%")
                        ->orWhere("Memorija","LIKE","%{$request->terms}%")
                        ->orWhere("Graficka","LIKE","%{$request->terms}%")*/
                       /* ->get();
        return response()->json($proizvodi);
    }*/
    
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
}
