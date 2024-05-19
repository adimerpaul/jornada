<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventoCupo extends Model
{
    use HasFactory;
protected $fillable=[
    'evento_id',
    'cupos_id',
    'estado',
    'fecha_registro',
    'user_id'
];
protected $hidden = [
    'created_at',
    'updated_at'
];
}
