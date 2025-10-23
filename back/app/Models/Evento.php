<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use \OwenIt\Auditing\Auditable as Auditing;
class Evento extends Model implements Auditable
{
    use HasFactory, Auditing;
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
        return $this->hasMany(EventoCupo::class)->with(['user','cupoRegistro']);
    }
}
