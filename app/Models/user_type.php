<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_type extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'branch_id',
        'user_img'
        // Add more attributes as needed
    ];
    protected $guarded = ['id'];
    function relation_user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    function relation_branch()
    {
        return $this->belongsTo(branchdetails::class, 'branch_id');
    }

}
