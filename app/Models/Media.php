<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    /** @use HasFactory<\Database\Factories\MediaFactory> */
    use HasFactory;
    protected $table = 'medias'; // Force l'utilisation de la table 'medias'

    protected $fillable = [
        "link",
        "icon",
    ];
}
