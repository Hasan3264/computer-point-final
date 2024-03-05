<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class spacvalue extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    function relation_spec(){
        return $this->belongsTo(specific::class, 'spac');
    }
}
