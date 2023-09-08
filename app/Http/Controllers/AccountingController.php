<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AccountingController extends Controller
{
    protected $type = "warning";
    protected $message = null;
    protected $status = false;

    public function add_payment(Request $request){

        if($request->id){
            $project = Project::find($request->id);
            if($project){
                $payment = Payment::create([
                    "user" => Auth::user()->id,
                    "project" => $request->id,
                    "amount" => $request->amount,
                    "detail" => $request->detail
                ]);
                if($payment){
                    $this->type = "success";
                    $this->message = "Ödeme eklendi";
                    $this->status = true;
                }else{
                    $this->type = "error";
                    $this->message = "Ödeme eklerken bir hata oluştu";
                }
            }else{ 
                $this->type = "error";
                $this->message = "Proje Bulunamadı!";
            }
        }

        return response(["type" => $this->type, "message" => $this->message, "status" => $this->status]);
    }

    public function remove_payment(Request $request){   

        if($request->id){
            $payment = Payment::find($request->id);
            if($payment){
                $payment->delete();
                $this->type = "success";
                $this->message = "Ödeme kaldırıldı.";
                $this->status = true;
            }else{
                $this->type = "error";
                $this->message = "Ödeme bulunamadı!";
            }
        }
        return response(["type" => $this->type, "message" => $this->message, "status" => $this->status]);
    }
}
