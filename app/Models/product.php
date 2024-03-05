<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{

    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = [
    'thumbnails',
    'Product_preview',
    'category_id',
    'subcategory_id',
    'product_name',
    'product_price',
    'discount',
    'after_discount',
    'short_des',
    'long_des',
    'slug',
    'brands',
    ];
    function to_inventoryes(){
        return $this->hasmany(Inventory::class, 'product_id');
    }

    // function to_brands(){
    //     return $this->belongsTo(Brand::class);
    // }
    public function to_brands()
{
    return $this->belongsTo(Brands::class, 'brands');
}

}
