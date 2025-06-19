<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Skill extends Model
{
    protected $guarded =[];

     public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
}


