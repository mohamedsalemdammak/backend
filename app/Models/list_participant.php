<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class list_participant extends Model
{ protected $fillable = [
    'idoffre', 'idcandidat', 'etat'];
    use HasFactory;
}
