<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

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
}
