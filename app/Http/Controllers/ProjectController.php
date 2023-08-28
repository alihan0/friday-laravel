<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Offer;
use App\Models\Tech;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function showNew(){
        return view('project.new', ["offers" => Offer::all(), 'customers' => Customer::all(), "techs" => Tech::all()]);
    }
}
