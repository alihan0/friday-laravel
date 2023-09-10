<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Offer extends Model
{
    use HasFactory;

    protected $table = "offers";

    protected $fillable = [
        "customer",
        "title",
        "detail",
        "status"
    ];

    public function Customer(){
        return $this->hasOne(Customer::class, 'id', 'customer');
    }

   

}
