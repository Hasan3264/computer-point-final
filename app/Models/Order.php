<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = [
        'position',
        'subtotal',
        'delivary_charge',
        'total',
        ];
    function relation_billing(){
        return $this->belongsTo(BillingDetails::class, 'id');
    }
}
