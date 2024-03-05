<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillingDetails extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    function relation_district(){
        return $this->belongsTo(Districts::class, 'district_id');
    }
    function relation_upazila(){
        return $this->belongsTo(Upazilas::class, 'upazila_id');
    }
}
