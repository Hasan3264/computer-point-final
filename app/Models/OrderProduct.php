<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    function relation_product(){
        return $this->belongsTo(product::class, 'product_id');
    }
    function relation_customer(){
        return $this->belongsTo(CustomerLogin::class, 'user_id');
    }
    function relation_order(){
        return $this->belongsTo(Order::class, 'order_id');
    }
}
