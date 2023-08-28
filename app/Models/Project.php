<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = "projects";

    protected $fillable = [
        "user",
        "customer",
        "title",
        "detail",
        "start_at",
        "passing_time",
        "dead_line",
        "status",
        "offer",
        "github",
        "tech_stack",
        "price",
        "required_time",
    ];
}
