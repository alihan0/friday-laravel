<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function logout(Request $request){
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');

    }

    public function change_password(Request $request){
        if(Auth::check()){
            if($request->password){
                $user = User::find(Auth::user()->id);
                if($user){
                    $user->password = Hash::make($request->password);
                    if($user->save()){
                        return true;
                    }
                }
            }
        }
    }
}
