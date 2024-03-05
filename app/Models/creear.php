<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class creear extends Model
{
    use HasFactory;
       protected $fillable = ['job_details','designation','salary','last_date','vacancy'];
}
