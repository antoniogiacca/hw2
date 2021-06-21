<?php
namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Veicoli;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class VeicoliController extends Controller{

    public function index(){
        $user = User::find(session('user_id'));
        return view('veicoli')->with('csrf_token', csrf_token())->with("user", $user);
    }


    public function veicoliPreferiti(){
        $contents = array();
        if(session('user_id')!=null){
            $contents = Veicoli::join('preferiti', 'veicolis.id', '=', 'preferiti.veicoli')
                             ->select('veicolis.titolo','veicolis.immagine','veicolis.descrizione',
                               'veicolis.prezzo', 'veicolis.id')
                             ->where('preferiti.user',session('user_id'))->get();
        }
        return json_encode($contents);
    }


    public function cont(){
        $contents = array();
        $contents = Veicoli::select('veicolis.titolo','veicolis.immagine','veicolis.descrizione',
        'veicolis.prezzo', 'veicolis.id')->get();

        return json_encode($contents);

    }


    public function ricerca($text){
        $contents = array();
        if(isset($text)){
            $contents = Veicoli::select('veicolis.titolo','veicolis.immagine','veicolis.descrizione',
                                 'veicolis.prezzo', 'veicolis.id')
                             ->where('titolo','like', '%'.$text.'%')->get();
        }
        return json_encode($contents);

    }


    public function aggiungi(){
        $data=request();
        $id=$data['id'];
        if(session('user_id')!=null){
            
            $user=User::find(session('user_id'));
            
            try{
                $user->veicolis()->attach($id);
            }catch(\Illuminate\Database\QueryException $exception){
                return $exception->getMessage();
            }
            return 1;
        }
    }


    public function rimuovi(){
        $data=request();
        $id=$data['id'];
        if(session('user_id')!=null){
            $user=User::find(session('user_id'));

            try{
                $user->veicolis()->detach($id);
            }catch(\Illuminate\Database\QueryException $exception){
                return $exception->getMessage();
            }
            return 1;
        }
    }


public function newC(){
    $data=request();
    if(isset($data['titolo']) && isset($data['prezzo']) &&
    isset($data['descrizione']) &&
    isset($data['immagine'])){
        $newVeicoli=Veicoli::create([
        'titolo' => $data['titolo'],
        'prezzo' => $data['prezzo'],
        'descrizione' => $data['descrizione'],
        'immagine' => $data['immagine'],
        ]);
        if($newVeicoli){
            return redirect('veicoli');
        }
    }
}

public function remC(){
    $data=request();
    if(isset($data['titolo'])){
        $titolo=$data['titolo'];
        $remVeicoli=Veicoli::where('titolo',$titolo)->delete();
        if($remVeicoli){
            return redirect('veicoli');
        }
    }
}

public function news($query){

    $rest_url='https://newsapi.org/v2/everything?';

    $json=Http::get($rest_url,[
        'q' => $query,
        'language' => 'it',
        'apikey' => '3840884f7e17432787ec144bade5c59a'
    ]);

    return $json;
}


}

?>