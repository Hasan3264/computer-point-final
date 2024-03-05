<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class categoryadd extends Model
{
    use HasFactory;
    use SoftDeletes;
    //  protected $fillable = ['user_id','category_name'];
      protected $guarded = ['id'];
    function relation_user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
