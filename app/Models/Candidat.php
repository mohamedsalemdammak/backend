<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidat extends Model
{
    
    protected $fillable = [
         'login','password','description','adresse','telephone','email','nom_prenom','cv'
     ];
     protected $dates = [
        'date_naissance',
    ];
    use HasFactory;
}
