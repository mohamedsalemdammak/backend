<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class offre extends Model
{
    protected $fillable = [
     'titre',  'description', 'lieu','interval_salaire','job_description'
    ];
    protected $dates = [
        'deadline'
    ];
    use HasFactory;
}
