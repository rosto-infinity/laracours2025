<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = 'educations'; // Force l'utilisation de la table 'medias'
    protected $guarded =[];
}
