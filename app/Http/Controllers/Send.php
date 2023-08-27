<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class Send extends Controller
{
    public static function notification(Request $request){
        return Notification::create([
            "user" => $request->user,
            "title" => $request->title,
            "message" => $request->message,
            "status" => 1
        ]);
    }
}
