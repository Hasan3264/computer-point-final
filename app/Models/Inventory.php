<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    function relation_product(){
        return $this->belongsTo(product::class, 'product_id');
    }
    function relation_color(){
        return $this->belongsTo(color::class, 'color_id');
    }
    function relation_size(){
        return $this->belongsTo(size::class, 'size_id');
    }
}
