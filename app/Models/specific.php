<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class specific extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    function relation_specCat(){
        return $this->belongsTo(specificscategory::class, 'catid');
    }
}
