<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Careeraplication extends Model
{
    use HasFactory;
    protected $fillable = ['cv'];
    function relation_carer(){
        return $this->belongsTo(creear::class, 'id');
    }
}
