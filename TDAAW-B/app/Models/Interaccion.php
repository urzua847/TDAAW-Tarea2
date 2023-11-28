<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interaccion extends Model
{
    use HasFactory;

    protected $fillable = [
        'PerroInteresado_id',
        'PerroCandidato_id',
        'preferencia',
    ];

}