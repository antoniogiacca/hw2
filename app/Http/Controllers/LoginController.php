<?php


namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;
use App\Models\User;



class LoginController extends BaseController{

    public function login(){
        if(session('user_id')!=null){
            return redirect('home');
        }else{
            return view('login')->with('csrf_token', csrf_token());
        }
    }

    public function checkLogin(){
        $data=request();
        if(isset($data['username']) && isset($data['password'])){
            $user=User::where('username',$data['username'])->first();
            if($user!==null){
                if(password_verify($data['password'],$user->password)){
                    Session::put('user_id',$user->id);
                    return redirect('home');
                }else{
                    return redirect("login");
                }
            }else{
                return redirect("login");
            }
        }else{
            return redirect('login');
        }
    }



    public function logout() {
        Session::flush();
        return redirect('login');
    }

}

?>
