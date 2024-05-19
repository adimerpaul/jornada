<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;
    protected $fillable=[
        'nombre',
        'descripcion',
        'codigo',
        'fecha_inicio',
        'fecha_fin',
        'estado',
        'cupos'
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    public function cupo(){
        return $this->hasMany(EventoCupo::class);
    }
}
