<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function all(){
        return view('customer.all', ['customers' => Customer::orderBy('id','desc')->get()]);
    }
}
