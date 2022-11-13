<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refrigerio extends Model
{
    use HasFactory;
    protected $fillable=[
    'fecha',
    'hora',
    'turno',
    'cupo_id',
    ];
}
