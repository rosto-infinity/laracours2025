<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    protected $fillable = [
        "name",
        "icon",
        "description"
    ];
    public static function filter(Request $request)
    {
        $query = self::query();
        // 01-Filtrage par titre le service : name

        if($request->filled('name')){
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

        return $query;
    }

      public function skills(): HasMany
    {
        return $this->hasMany(Skill::class);
    }
}
