<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Offer;
use App\Models\Project;
use App\Models\Tech;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{

    protected $type = "warning";
    protected $message = null;
    protected $status = false;

    public function showNew(){
        return view('project.new', ["offers" => Offer::all(), 'customers' => Customer::all(), "techs" => Tech::all()]);
    }

    public function save(Request $request){
        $id = null;
        if(empty($request->customer) || empty($request->title) || empty($request->detail) || empty($request->offer) || empty($request->price) || empty($request->techstack) || empty($request->start_date) || empty($request->dead_line) || empty($request->github)){
            $this->message =  "Lütfen tüm alanları doldurunuz.";
        }else{
           
            $startAt = Carbon::parse($request->start_date);
            $deadLine = Carbon::parse($request->dead_line);

            // Tarihleri saniyeye çevirip zaman farkını hesaplayalım
            $differenceInSeconds = $deadLine->diffInSeconds($startAt);

            $project = Project::create([
                "user" => Auth::user()->id,
                "customer" => $request->customer,
                "title" => $request->title,
                "detail" => $request->detail,
                "offer" => $request->offer,
                "price" => $request->price,
                "tech_stack" => $request->techstack,
                "start_at" => $request->start_date,
                "dead_line" => $request->dead_line,
                "passing_time" => 0,
                "required_time" => $differenceInSeconds,
                "status" => 1,
            ]);

            if($project){
                $this->type = "success";
                $this->message = "Proje başarıyla oluşturuldu.";
                $this->status = true;
                $id = $project->id;
            }
        }

        return response(["type" => $this->type, "message" => $this->message, "status" => $this->status, "id" => $id]);
    }

    public function detail($id){
        return view('project.detail', ["project" => Project::find($id)]);
    }

    public function all(){
        return view('project.all', ["projects" => Project::all()]);
    }
}
