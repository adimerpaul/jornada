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
    'user_id',
    'sala_id',
    'intermedio_id'
    ];

    public function cupo()
    {
        return $this->belongsTo(Cupo::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sala()
    {
        return $this->belongsTo(Sala::class);
    }

    public function intermedio()
    {
        return $this->belongsTo(Intermedio::class);
    }

}
