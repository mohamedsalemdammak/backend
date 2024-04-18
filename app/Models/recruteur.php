<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recruteur extends Model
{
    protected $fillable = [
       'login',  'telephone','email','password'
     ];
    use HasFactory;
}
