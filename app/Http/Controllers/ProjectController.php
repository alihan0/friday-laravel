<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Offer;
use App\Models\Payment;
use App\Models\Project;
use App\Models\Task;
use App\Models\Tech;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{

    protected $type = "warning";
    protected $message = null;
    protected $status = false;

    protected $icon = null;

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
        return view('project.detail', ["project" => Project::find($id), 'payments' => Payment::where('project', $id)->orderBy('id', 'desc')->get(), 'tasks' => Task::where('project', $id)->orderBy('id','desc')->get()]);
    }

    public function all(){
        return view('project.all', ["projects" => Project::all()]);
    }

    public function proccess_save(Request $request){
        $time = $request->passedTime;
        $project = Project::find($request->project);

        $passing_time = $project->passing_time;
        $new_time = $passing_time + $time;

        $project->passing_time = $new_time;
        
        if($project->save()){
            return response(["status" => true]);
        }



    }

    public function delete(Request $request){
        if($request->id){
            $p = Project::find($request->id);
            if($p){
                if($p->delete()){
                    $this->icon = "success";
                    $this->message = "Proje verileri başarıyla silindi.";
                    $this->status = true;
                }else{
                    $this->icon = "error";
                    $this->message = "Proje verileri silinemedi.";
                }
            }else{
                $this->icon = "error";
                $this->message = "Proje verisi bulunamadı.";
            }
        }
        return response(["status" => $this->status, "message" => $this->message, "icon" => $this->icon]);
    }

    public function add_work_time(Request $request){
        if($request->id && $request->time){
            $project = Project::find($request->id);
            if($project){
                $time = $project->passing_time;
                $new_time = $time + $request->time;
                $project->passing_time = $new_time;
                if($project->save()){
                    $this->type = "success";
                    $this->message = "Çalışma süresi başarıyla eklendi";
                    $this->status = true;
                }else{
                    $this->type = "error";
                    $this->message = "Çalışma süresi eklenirken bir hata oluştu";
                }
            }else{
                $this->type = "error";
                $this->message = "Proje verilerine ulaşılamadı!";
            }
        }

        return response(["type" => $this->type, "message" => $this->message, "status" => $this->status]);
    }

    public function add_task(Request $request){

        if($request->id){
            if(empty($request->task)){
                $this->message = "Görev girin!";
            }else{
                $task = Task::create([
                    "user" => Auth::user()->id,
                    "project" => $request->id,
                    "task" => $request->task,
                    "status" => 1
                ]);

                if($task){
                    $this->type = "success";
                    $this->message = "Görev oluşturuldu";
                    $this->status = true;
                }else{
                    $this->message = "Görev oluşturulurken bir hata oluştu";
                }
            }
        }

        return response(["type" => $this->type, "message" => $this->message, "status" => $this->status]);
    }

    public function check_task(Request $request){
        if($request->id){
            $task = Task::find($request->id);
            if($task){
                $task->status = 2;
                if($task->save()){
                    $this->status = true;
                }else{
                    $this->message = "Görev onaylanamadı!";
                }
            }else{
                $this->message = "Görev bulunamadı!";
            }
        }
        return response(["status" => $this->status, "message" => $this->message, "type" => $this->type]);
    }
    public function cancel_task(Request $request){
        if($request->id){
            $task = Task::find($request->id);
            if($task){
                $task->status = 0;
                if($task->save()){
                    $this->status = true;
                }else{
                    $this->message = "Görev onaylanamadı!";
                }
            }else{
                $this->message = "Görev bulunamadı!";
            }
        }
        return response(["status" => $this->status, "message" => $this->message, "type" => $this->type]);
    }
}
