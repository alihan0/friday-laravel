<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Offer;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class MainController extends Controller
{

    protected $type = "warning";
    protected $message = null;
    protected $status = false;

    
    public function dashboard(){
        return view('main.dashboard', [
            'projects' => Project::all(),
            'offers' => Offer::all(),
            'customers' => Customer::all(),
            'tasks' => Task::all()
        ]);
    }

    public function upload(Request $request)
    {
        $url = null;
        $path = null;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            
            // Dosya türü kontrolü
            $allowedTypes = ['jpg', 'jpeg', 'png'];
            $extension = strtolower($file->getClientOriginalExtension());
            if (!in_array($extension, $allowedTypes)) {
                $this->message = 'Sadece PNG ve JPG yükleyebilirsiniz...';
            }

            $filename = time() . '.' . $extension;

            $file->move(public_path('uploads'), $filename);

            $path = 'uploads/' . $filename;
            $url = asset('uploads/' . $filename);

            $this->type = "success";
            $this->message = "Logo başarıyla yüklendi";
            $this->status = true;
            
        }
        return response(["type" => $this->type, 'message' => $this->message, 'status' => $this->status, 'url' => $url, 'path' => $path]);
    }

}
