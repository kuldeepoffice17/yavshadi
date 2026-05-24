<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $fillable = [
        'user_id',
        'gender',
        'looking_for',
        'age',
        'religion',
        'city',
        'education',
        'occupation',
        'annual_income',
        'about_me',
        'marital_status',
        'height',
        'mother_tongue',
        'diet',  // Add this field
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}