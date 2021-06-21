<?php

    namespace App\Http\Controllers;
    
    use Illuminate\Routing\Controller as BaseController;
    use App\Models\User;
    use Illuminate\Support\Facades\Http;

    class HomeController extends BaseController{

        public function home(){
            $session_id=session('user_id');
            $user=User::find($session_id);
            return view('home')->with("user", $user);
        }


        public function maps(){
            $apikey_maps = 'AIzaSyDVZgZR-PCxaGJaIUzAp3eZ3XoE6AJUFzQ';
            $endpoint_maps = 'https://maps.googleapis.com/maps/api/geocode/json?';
            $address = 'Catania ss192, km 185';

            return Http::get($endpoint_maps, [
                "address" => $address,
                "key" => $apikey_maps
            ]);
        }
    }


?>