<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    // protected $guarded = [];
       protected $fillable = [
        'name',
        'home_image',
        'banner_image',
        'phone',
        'email',
        'address',
        'description',
        'summary',
        'tagline',
        'cv',
    ];
}
