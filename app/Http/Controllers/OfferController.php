<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Offer;
use App\Models\Tech;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    protected $type = "warning";
    protected $message = null;
    protected $status = false;

    public function new(){
        return view('offer.new', ['customers' => Customer::where('status', 1)->orderBy('id','desc')->get(),"techs" => Tech::all()]);
    }

    public function save(Request $request){
        $id = null;

        if(
            empty($request->customer) ||
            empty($request->title) ||
            empty($request->detail) ||
            empty($request->panels) ||
            empty($request->validity) ||
            empty($request->project_time) ||
            empty($request->delivery_date) ||
            empty($request->project_amount) ||
            empty($request->first_amount) ||
            empty($request->delivery_amount)
        ){
            $this->message = "Tüm alanları doldurmak zorundasınız!";
        }else{
            $offer = new Offer;
            $offer->customer = $request->customer;
            $offer->title = $request->title;
            $offer->detail = $request->detail;
            $offer->panels = $request->panels;
            $offer->validity_time = $request->validity;
            $offer->project_time = $request->project_time;
            $offer->delivery_date = $request->delivery_date;
            $offer->project_amount = $request->project_amount;
            $offer->first_amount = $request->first_amount;
            $offer->delivery_amount = $request->delivery_amount;
            $offer->status = 1;
            $offer->backend = $request->backend;
            $offer->frontend = $request->frontend;
            $offer->db = $request->db;
            $offer->security = $request->security;

            if($offer->save()){
                $this->type = "success";
                $this->message = "Teklif oluşturuldu.";
                $this->status = true;
                $id = $offer->id;
            }
        }

        return response(['type' => $this->type, 'message' => $this->message, 'status' => $this->status, 'id' => $id]);
    }
}
