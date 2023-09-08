<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = "customers";
     
    protected $fillable = [
        "name",
        "company",
        "email",
        "phone",
        "gsm",
        "website",
        "address",
        "country",
        "city",
        "status"
    ];

    public function Offer(){
        return $this->hasMany(Offer::class, 'customer', 'id');
    }

    public function Project(){
        return $this->hasMany(Project::class, 'customer','id');
    }

    public function Payment(){
        return $this->hasMany(Payment::class, 'customer', 'id');
    }
}
