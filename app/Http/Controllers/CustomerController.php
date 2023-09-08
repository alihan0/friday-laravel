<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    protected $type = 'warning';
    protected $message = null;
    protected $status = false;

    public function all(){
        return view('customer.all', ['customers' => Customer::orderBy('id','desc')->get()]);
    }

    public function new(){
        return view('customer.new');
    }

    public function save(Request $request){
        if(empty($request->company) || empty($request->name) || empty($request->gsm) || empty($request->email)){
            $this->message = 'Yıldız <b>(*)</b> ile işaretlenen alanlar zorunludur.';
        }else{
            $customer = new Customer();
            $customer->company = trim(ucwords($request->company));
            $customer->name = trim(ucwords($request->name));
            $customer->phone = trim(ucwords($request->phone));
            $customer->gsm = trim($request->gsm);
            $customer->email = trim($request->email);
            $customer->logo = trim($request->logoData);
            $customer->website = trim($request->website);
            $customer->address = trim($request->address);
            $customer->country = trim(ucfirst($request->country));
            $customer->city = trim(ucfirst($request->city));
            $customer->status = 1;

            if($customer->save()){
                $this->type = 'success';
                $this->message = 'Müşteri başarıyla kaydedildi.';
                $this->status = true;
            }else{
                $this->message = 'Müşteri kaydedilemedi.';
            }
        }

        return response(['type' => $this->type, 'message' => $this->message, 'status' => $this->status]);
    }
}
