<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected $type = "warning";
    protected $message = null;
    protected $status = false;


    public function showLogin(){
        return view('auth.login');
    }

    public function login(Request $request){
        if(empty($request->email) || empty($request->password)){
            $this->message = "E-posta ve şifrenizi girin.";
        }else{
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                $this->type = "success";
                $this->message = "Oturum açıldı";
                $this->status = true;
            }else{
                $this->message = "E-posta ya da şifre hatalı!";
            }
        }

        return response(["type" => $this->type, "message" => $this->message, "status" => $this->status]);
    }
}
