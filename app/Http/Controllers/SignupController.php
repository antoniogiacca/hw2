<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Http\Request;

    class SignupController extends BaseController{
        
        public function carica(){
            $data=request();
            if(isset($data['username']) && isset($data['password']) && 
            isset($data['name']) && 
            isset($data['surname']) && isset($data['email'])){
                $newUser=User::create([
                'username' => $data['username'],
                'password' => password_hash($data['password'],PASSWORD_BCRYPT),
                'nome' => $data['name'],
                'cognome' => $data['surname'],
                'email' => $data['email'],
                ]);
                if($newUser){
                    Session::put('user_id',$newUser->id);
                    return redirect('home');
                }else{
                    return redirect('signup')->withInput();
                }
            }else{
                return redirect('signup')->withInput();
            }
        }


        public function signup() {
            if(session('user_id')!= null){
                return redirect('home');
            }else{
                return view('signup');
            }
        }


        public function controlloUsername(Request $request){
            $user=$request->username;
            $exist=User::where('username',$user)->exists();
            return ['exists'=>$exist];
        }

    }

    ?>