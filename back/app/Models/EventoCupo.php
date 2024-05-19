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
    public function evento(){
        return $this->belongsTo(Evento::class);
    }
    public function cupo(){
        return $this->belongsTo(Cupo::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function student(){
        return $this->belongsTo(Student::class);
    }
}
